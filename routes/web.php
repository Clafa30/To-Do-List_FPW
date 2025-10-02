<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TugasController;
use App\Http\Controllers\OtpController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardAdminController;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Http\Controllers\TwitterController;
use App\Http\Controllers\GoogleController;

Route::get('/', function () {
    return view('welcome'); 
})->name('welcome');

// ✅ Auth
Route::get('/login', [AuthController::class, 'showLogin'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();      // hapus session
    request()->session()->regenerateToken(); // refresh CSRF token

    return redirect('/login'); // redirect ke halaman login
})->name('logout');

// Tugas Handle route
Route::middleware('auth')->group(function () {
    Route::get('/tugas', [TugasController::class, 'index'])->name('tugas.index');
    Route::get('/tugas/create', [TugasController::class, 'create'])->name('tugas.create');
    Route::post('/tugas', [TugasController::class, 'store'])->name('tugas.store');
    Route::get('/tugas/{id}/edit', [TugasController::class, 'edit'])->name('tugas.edit');
    Route::put('/tugas/{id}', [TugasController::class, 'update'])->name('tugas.update');
    Route::delete('/tugas/{id}', [TugasController::class, 'destroy'])->name('tugas.destroy');
    Route::patch('/tugas/{id}/complete', [TugasController::class, 'markComplete'])->name('tugas.complete');

});

// ✅ Dashboard Admin
Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', [DashboardAdminController::class, 'index'])
        ->name('admin.dashboard');

    Route::get('/admin/{admin}/edit', [DashboardAdminController::class, 'edit'])->name('admin.edit');
    Route::put('/admin/{admin}', [DashboardAdminController::class, 'update'])->name('admin.update');
    Route::delete('/admin/{admin}', [DashboardAdminController::class, 'destroy'])->name('admin.destroy');

    Route::post('/pengumuman/store', [DashboardAdminController::class, 'store'])->name('pengumuman.store');
});

// Handle otp admin for superadmin
Route::middleware('auth')->group(function() {
    Route::post('/admin/otp', [DashboardAdminController::class, 'storeOtp'])->name('admin.otp.store');
    Route::delete('/admin/otp/{id}', [DashboardAdminController::class, 'destroyOtp'])->name('admin.otp.destroy');
});

// Auth Using 3th Party
// Twitter
Route::get('login/twitter', [TwitterController::class, 'redirectToTwitter']);
Route::get('login/twitter/callback', [TwitterController::class, 'handleTwitterCallback']);

// Google
Route::get('login/google', [App\Http\Controllers\GoogleController::class, 'redirectToGoogle']);
Route::get('login/google/callback', [App\Http\Controllers\GoogleController::class, 'handleGoogleCallback']);
