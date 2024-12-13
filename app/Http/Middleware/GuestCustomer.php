<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuestCustomer
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
        // Memeriksa apakah pengguna sudah login dengan guard 'customer'
        if (Auth::guard('customer')->check()) {
            // Jika sudah login, redirect ke halaman yang diinginkan (misalnya dashboard)
            return redirect()->route('customer-dashboard');
        }

        return $next($request);
    }
}
