<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardAdminController;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

// Landing page (welcome)
Route::get('/', function () {
    return view('welcome'); // ini otomatis ambil resources/views/welcome.blade.php
})->name('welcome');

// Login
Route::get('/login', [AuthController::class, 'showLogin'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');

// Register
Route::get('/register', [AuthController::class, 'showRegister'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');

// Dashboard (setelah login)
Route::get('/dashboard', function () {
    return view('dashboard'); // nanti kamu bikin resources/views/dashboard.blade.php
})->middleware('auth')->name('dashboard');

Route::get('/admin/dashboard', [DashboardAdminController::class, 'index']) -> name('dashboard');

// CRUD Admin (gunakan resource dengan only)
Route::get('/admin/{admin}/edit', [DashboardAdminController::class, 'edit'])->name('admin.edit');
Route::put('/admin/{admin}', [DashboardAdminController::class, 'update'])->name('admin.update');
Route::delete('/admin/{admin}', [DashboardAdminController::class, 'destroy'])->name('admin.destroy');

Route::post('/pengumuman/store', [DashboardAdminController::class, 'store'])->name('pengumuman.store');

Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();      // hapus session
    request()->session()->regenerateToken(); // refresh CSRF token

    return redirect('/login'); // redirect ke halaman login
})->name('logout');