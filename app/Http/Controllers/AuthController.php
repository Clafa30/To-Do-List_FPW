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
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();

            return $user->role === 'admin'
                ? redirect()->route('admin.dashboard')
                : redirect()->route('user.dashboard');
        }

        return back()->with('error', 'Email atau password salah.')
                     ->withInput($request->only('email'));
    }

    // ✅ Tampilkan halaman register
    public function showRegister()
    {
        return view('auth.login', ['activeForm' => 'register']);
    }

    // ✅ Proses register
    public function register(Request $request)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ];

        if ($request->has('is_admin')) {
            $rules['otp'] = 'required|digits:6';
        }

        $request->validate($rules);

        // ✅ OTP validasi (sementara hardcode 123456)
        if ($request->has('is_admin') && $request->otp !== "123456") {
            return back()->with('error', 'OTP Admin salah!')
                         ->withInput();
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->has('is_admin') ? 'admin' : 'user',
        ]);

        // ✅ Setelah register → redirect ke Sign In
        return redirect()->route('login.form')
                         ->with('success', 'Registrasi berhasil, silakan login.');
    }

    // ✅ Proses logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login.form');
    }
}
