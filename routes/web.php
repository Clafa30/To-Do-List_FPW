<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardAdminController;

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