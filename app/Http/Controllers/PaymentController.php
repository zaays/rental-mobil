<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    //
    public function index()
    {
        $pembayaran = Payment::with('transaction.customer')->get();
        return view('backend.pembayaran.index', [
            'pembayaran' => $pembayaran
        ]);
    }
}
