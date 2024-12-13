<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Customer;
use App\Models\Payment;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $jumlahMobil = Car::count();
        $tr_berhasil = Payment::where('status', 'paid')->count();
        $tr_pending = Payment::where('status', 'pending')->count();



        return view('backend.dashboard', [
            'jumlahMobil' => $jumlahMobil,
            'tr_berhasil' => $tr_berhasil,
            'tr_pending' => $tr_pending
        ]);
    }

    public function dataCustomer()
    {
        $customer = Customer::all();
        return view('backend.customer.index', [
            'customer' => $customer
        ]);
    }
}
