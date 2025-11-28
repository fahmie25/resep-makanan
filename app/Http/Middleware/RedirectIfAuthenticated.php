<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    public function handle(Request $request, Closure $next)
    {
        // Jika user sudah login → jangan boleh masuk ke login/register
        if (Auth::check()) {

            // Jika user adalah admin → arahkan ke dashboard admin
            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin.dashboard');
            }

            // Selain admin → redirect ke home
            return redirect()->route('home');
        }

        return $next($request);
    }
}
