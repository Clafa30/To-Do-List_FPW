<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TugasController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardAdminController;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', function () {
    return view('welcome'); 
})->name('welcome');

// ✅ Auth
Route::get('/login', [AuthController::class, 'showLogin'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');

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

// ✅ Dashboard User
Route::get('/user/dashboard', function () {
    return view('user.dashboard');
})->middleware('auth')->name('user.dashboard');

// ✅ Dashboard Admin
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware('auth')->name('admin.dashboard');

// User Pass Parameter from dashboard
Route::get('/user/dashboard', [DashboardController::class, 'index'])->name('user.dashboard')->middleware('auth');

// Tugas Handle route
Route::middleware('auth')->group(function () {
    Route::get('/tugas/create', [TugasController::class, 'create'])->name('tugas.create');
    Route::post('/tugas', [TugasController::class, 'store'])->name('tugas.store');
    Route::get('/tugas/{id}/edit', [TugasController::class, 'edit'])->name('tugas.edit');
    Route::put('/tugas/{id}', [TugasController::class, 'update'])->name('tugas.update');
    Route::delete('/tugas/{id}', [TugasController::class, 'destroy'])->name('tugas.destroy');
    Route::get('/tugas/{id}/complete', [TugasController::class, 'markComplete'])->name('tugas.complete');
});
