<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class AdminController extends Controller
{
    //

    public function index()
    {
        return view('auth.admin');
    }

    public function loginAdmin(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|min:5',
            'password' => 'required:min:4'
        ]);

        if (Auth::attempt($data)) {
            $request->session()->regenerate();
            return redirect()->intended('admin/dashboard');
        } else {
            return back()->with('error', 'Email atau password salah');
        }
    }

    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/');
    }
}
