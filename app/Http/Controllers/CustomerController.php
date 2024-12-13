<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Customer;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    //
    public function index()
    {
        return view('auth.customer');
    }

    public function register()
    {
        return view('frontend.register');
    }

    public function register_customer(Request $request)
    {
        $data = $request->validate([
            'nama_lengkap' => 'required|min:4',
            'nik' => 'required|max:16|string|unique:customers,nik',
            'jenis_kelamin' => 'required',
            'email' => 'required|email|unique:customers,email',
            'password' => 'required|min:4',
            'password_confirmation' => 'required|same:password',
            'no_hp' => 'required|numeric',
            'alamat' => 'required|max:255'
        ]);

        Customer::create([
            'nama_lengkap' => $request->nama_lengkap,
            'nik' => $request->nik,
            'jenis_kelamin' => $request->jenis_kelamin,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat
        ]);

        return redirect()->route('customer.register')->with('success', 'Registrasi berhasil!');
    }


    public function login_customer(Request $request)
    {
        $data =  $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::guard('customer')->attempt($data)) {
            $request->session()->regenerate();
            return redirect()->intended('/customer/dashboard');
        }

        return back()->with('error', 'Email atau Password Salah');
    }


    public function dashboard()
    {
        $userLogin = Auth::guard('customer')->user()->id;
        $transaction = Transaction::with('customer', 'car')->where('customer_id', $userLogin)->get();

        return view('customers.dashboard', [
            'transaction' => $transaction
        ]);
    }

    public function sewa($id)
    {
        $mobil = Car::findOrfail($id);
        return view('customers.sewa', [
            'mobil' => $mobil
        ]);
    }

    public function logout()
    {
        Auth::guard('customer')->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/');
    }
}
