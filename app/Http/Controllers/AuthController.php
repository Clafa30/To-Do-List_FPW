<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // ✅ Tampilkan halaman login
    public function showLogin()
    {
    return view('auth.login', ['activeForm' => 'login']);
    }

    // ✅ Proses login
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard'); // ganti sesuai halaman setelah login
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    // ✅ Tampilkan halaman register
    public function showRegister()
    {
    return view('auth.login', ['activeForm' => 'register']);
        
    }

    // ✅ Proses register
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect('/dashboard'); // arahkan setelah register
    }

    // ✅ Proses logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }

    // ⬅️ Tampilkan halaman login
    public function showLogin()
    {
        return view('auth.login'); // resources/views/auth/login.blade.php
    }

    // ⬅️ Proses login
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (auth()->attempt($request->only('email', 'password'))) {
            return redirect()->intended('/dashboard');
        }

        return back()->withErrors(['email' => 'Email atau password salah']);
    }

    // ⬅️ Tampilkan halaman register
    public function showRegister()
    {
        return view('auth.register');
    }

    // ⬅️ Proses register
    public function register(Request $request)
    {
        $request->validate([
            'name'     => 'required',
            'email'    => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login.form')->with('success', 'Registrasi berhasil! Silakan login.');
    }

}
