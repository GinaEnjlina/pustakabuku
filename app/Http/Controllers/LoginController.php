<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class LoginController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            // Jika pengguna sudah masuk, redirect ke halaman index produk
            return redirect('index_product');
        } else {
            
            return view('index_product');
        }
    }

    /**
     * Menangani proses login pengguna.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function actionlogin(Request $request)
    {
        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];
        if (Auth::attempt($data)) {
            // Jika proses login berhasil, redirect ke halaman index produk
            return redirect('index_product');
        } else {
            // Jika proses login gagal, tampilkan pesan kesalahan dan redirect kembali ke halaman login
            Session::flash('error', 'Email atau Password Salah');
            return redirect('/');
        }
    }

    /**
     * Menangani proses logout pengguna.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function actionlogout()
    {
        // Melakukan logout pengguna dan redirect kembali ke halaman utama
        Auth::logout();
        return redirect('/');
    }
}