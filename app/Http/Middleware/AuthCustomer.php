<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthCustomer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        // Memeriksa apakah pengguna belum login dengan guard 'customer'
        if (!Auth::guard('customer')->check()) {
            // Jika belum login menggunakan guard 'customer', simpan URL yang dituju
            session(['url.intended' => $request->url()]);

            // Jika belum login, redirect ke halaman login customer
            return redirect()->route('login_customer');
        }
        return $next($request);
    }
}
