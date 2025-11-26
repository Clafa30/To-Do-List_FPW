<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Otp;

class OtpController extends Controller
{
    public function index() {
        $otps = Otp::with('user')->get();
        return view('admin.otp', compact('otps'));
    }

    public function store(Request $request) {
        $code = strtoupper(substr(bin2hex(random_bytes(3)), 0, 6)); // 6 karakter
        Otp::create(['code' => $code]);
        return redirect()->back()->with('success', 'OTP baru berhasil dibuat: ' . $code);
    }

    public function destroy($id) {
        Otp::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'OTP berhasil dihapus');
    }
}
