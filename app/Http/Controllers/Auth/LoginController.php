<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa; // Pastikan model Mahasiswa di-import
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    // Menampilkan form login
    public function showLoginForm()
    {
        return view('auth.login'); // Pastikan view login ini ada
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    // Memproses login
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'nim' => 'required|string',
            'password' => 'required|string',
        ]);

        // Cek apakah NIM ada di database
        $mahasiswa = Mahasiswa::where('nim', $request->nim)->first();

        // Cek jika mahasiswa ditemukan dan password cocok
        if ($mahasiswa && Hash::check($request->password, $mahasiswa->password)) {
            // Set user yang sedang login
            Auth::login($mahasiswa);

            return redirect()->route('welcome'); // Redirect ke halaman welcome
        }

        // Jika gagal login
        return redirect()->back()->withErrors(['nim' => 'Nim Atau Password anda salah']);
    }

    // Mengelola logout
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login')->with('success', 'You have been logged out.');
    }
}
