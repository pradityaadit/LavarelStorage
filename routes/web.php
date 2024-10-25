<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\MahasiswaController;

// Redirect the root URL to the login page
Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('welcome'); // Redirect ke halaman welcome jika sudah login
    }
    return redirect()->route('login.form'); // Jika belum login, redirect ke login form
});



// Route for the welcome page (only accessible if logged in)
Route::get('/welcome', function () {
    return view('welcome'); // Only accessible if logged in
})->name('welcome')->middleware('auth'); // Middleware auth protects this page

// Route for login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login');

// Route for registration
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register.form');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

// Route for logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa.index');

Route::resource('mahasiswa', MahasiswaController::class);