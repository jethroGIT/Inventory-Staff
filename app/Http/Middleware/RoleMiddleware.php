<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, $role)
    {
        // Pastikan pengguna terautentikasi
        if (!Auth::check()) {
            return redirect('login');
        }

        // Periksa apakah role_id pengguna cocok
        if (Auth::user()->role_id != $role) {
            abort(403, 'You are not authorized to access this resource.');
        }

        return $next($request);
    }
}

