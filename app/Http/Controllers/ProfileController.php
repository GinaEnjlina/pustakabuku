<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function __construct()
    {
        // Menambahkan middleware 'auth' agar hanya pengguna yang terautentikasi yang dapat mengakses fungsi-fungsi dalam kontroler ini
        $this->middleware('auth');
    }

    // Fungsi untuk menampilkan profil pengguna
    public function show_profile()
    {
        $user = Auth::user();
        return view('show_profile', compact('user'));
    }

    // Fungsi untuk mengedit profil pengguna
    public function edit_profile(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'password' => 'required|min:8|confirmed' // Konfirmasi password harus sesuai
        ]);

        $user = Auth::user();
        
        // Update nama dan password pengguna
        $user->update([
            'name' => $request->name,
            'password' => Hash::make($request->password) // Enkripsi password baru
        ]);

        return Redirect::back();
    }
}
