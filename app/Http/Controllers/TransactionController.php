<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Payment;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Storage;

class TransactionController extends Controller
{
    //

    public function create($carId)
    {
        $mobil = Car::findOrFail($carId);
        return view('frontend.transaksi', [
            'mobil' => $mobil
        ]);
    }

    public function store(Request $request, $carId)
    {
        $request->validate([
            'tanggal_mulai' => 'required|date|after_or_equal:today',
            'tanggal_akhir' => 'required|date|after:tanggal_mulai',
        ]);

        // Menghitung total harga
        $car = Car::findOrFail($carId);
        $totalPembayaran = $car->harga_satuan * (strtotime($request->tanggal_akhir) - strtotime($request->tanggal_mulai)) / (60 * 60 * 24);

        // Membuat transaksi
        $transaction = Transaction::create([
            'customer_id' => Auth::guard('customer')->user()->id,
            'car_id' => $carId,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_akhir' => $request->tanggal_akhir,
            'total_harga' => $totalPembayaran,
            'status' => 'pending',
        ]);

        return redirect()->route('transaksi.show', $transaction->id);
    }

    // Menampilkan detail transaksi
    public function show($id)
    {
        $transaction = Transaction::with('car', 'payments', 'customer')->findOrFail($id);
        return view('frontend.detailTransaksi', [
            'transaction' => $transaction
        ]);
    }

    //Hapus atau batal transaksi -> Role Customer
    public function destroy($id)
    {
        $data = Transaction::findOrfail($id);
        $data->delete();

        return redirect()->route('customer-dashboard')->with('success', 'Transaksi Berhasil dibatalkan !');
    }


    public function pay(Request $request, $id)
    {
        $transaction = Transaction::findOrFail($id);
        $request->validate([
            'bukti_pembayaran' => 'required|image|file|max:1024'
        ]);

        if ($request->file('bukti_pembayaran')) {
            $file = $request->file('bukti_pembayaran');
            $fileName = time() . '-' . $file->getClientOriginalName();
            $filePath = $file->storeAs('uploads/bukti_bayar', $fileName, 'public');
        }



        //membuat pembayaran
        $payment = Payment::create([
            'transaction_id' => $transaction->id,
            'jumlah_bayar' => $transaction->total_harga,
            'bukti_pembayaran' => $filePath,
            'status' => 'pending'
        ]);


        return redirect()->route('customer-dashboard')->with('success', 'Transaksi Berhasil dibuat !');
    }


    // Konfirmasi pembayaran
    public function confirmPayment($id)
    {
        $payment = Payment::findOrFail($id);
        $payment->update(['status' => 'paid']);

        // Mengubah status transaksi
        $payment->transaction->update(['status' => 'confirmed']);

        return redirect()->route('pembayaran')->with('success', 'Pembayaran berhasil dikonfirmasi.');
    }

    public function showTransaction_admin()
    {
        $transaksi = Transaction::with('customer', 'car')->get();
        return view('backend.transaksi.index', [
            'transaksi' => $transaksi
        ]);
    }
}
