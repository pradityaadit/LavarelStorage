<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\UserProfileController;



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

// Route Untuk login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login');

// Route Untuk registration
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register.form');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

// Route Untuk logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa.index');

Route::resource('mahasiswa', MahasiswaController::class);

Route::post('/mahasiswa/{nim}/toggle-visibility', [MahasiswaController::class, 'toggleVisibility'])->name('mahasiswa.toggleVisibility');

Route::get('/profile', [UserProfileController::class, 'show'])->name('profile.show')->middleware('auth');

//Route Untuk Profile
Route::get('/profile/edit', [UserProfileController::class, 'edit'])->name('profile.edit')->middleware('auth');
Route::post('/profile/update', [UserProfileController::class, 'update'])->name('profile.update')->middleware('auth');

//Route Untuk delate
Route::delete('/mahasiswa/{nim}', [MahasiswaController::class, 'destroy'])->name('mahasiswa.destroy');
