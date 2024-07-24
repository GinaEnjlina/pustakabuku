<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Memeriksa apakah pengguna sedang login dan merupakan admin
        if (!Auth::check() || Auth::user()->is_admin == false) {
            // Jika tidak, redirect ke halaman index produk
            return Redirect::route('index_product');
        }

        // Jika iya, lanjutkan ke middleware atau controller berikutnya
        return $next($request);
    }
}
