<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Otp;

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

            if ($user->role === 'admin' || $user->role === 'superadmin') {
                return redirect()->route('admin.dashboard');
            }
            return redirect()->route('tugas.index');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->withInput();
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
            $rules['otp'] = 'required|string|size:6';
        }

        $request->validate($rules);

        // Validasi OTP
        $validOtp = Otp::where('code', $request->otp)
                    ->where('status', 'unused')
                    ->first();

        if ($request->has('is_admin') && !$validOtp) {
            return back()->with('error', 'OTP Admin salah atau sudah digunakan!')
                        ->withInput();
        }

        // Buat user baru
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->has('is_admin') ? 'admin' : 'user',
        ]);

        // Tandai OTP jadi used + simpan user_id
        if ($request->has('is_admin') && $validOtp) {
            $validOtp->update([
                'status'  => 'used',
                'used_by' => $user->id, // <-- ini kunci supaya dashboard bisa tampil email
            ]);
        }

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
