<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengumuman;
use App\Models\User;
use App\Models\Otp; // jangan lupa import model Otp

class DashboardAdminController extends Controller
{
    public function index()
    {
        // Ambil 5 pengumuman terbaru
        $pengumuman = Pengumuman::orderBy('created_at', 'desc')
                        ->limit(5)
                        ->get();

        // Ambil semua user dengan role admin
        $admins = User::where('role', 'admin')->get();

        // Ambil semua OTP beserta user yang pakai
        $otps = Otp::with('user')->orderBy('created_at', 'desc')->get();

        // kirim ke view
        return view('admin.dashboard', compact('pengumuman', 'admins', 'otps'));
    }

    public function edit(User $admin)
    {
        return view('admin.edit', compact('admin'));
    }

    public function update(Request $request, User $admin)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email',
        ]);

        $admin->update($request->only(['name','email']));
        return redirect()->route('admin.dashboard')->with('success', 'Data admin berhasil diperbarui');
    }

    public function destroy(User $admin)
    {
        $admin->delete();
        return redirect()->route('admin.dashboard')->with('warning', 'Data admin berhasil dihapus');
    }

    public function store(Request $request)
    {
        // Validasi input pengumuman
        $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
        ]);

        // Simpan ke database
        Pengumuman::create([
            'judul' => $request->judul,
            'konten' => $request->konten,
            'created_at' => now(),
        ]);

        // Redirect balik dengan pesan sukses
        return redirect()->back()->with('success', 'Pengumuman berhasil ditambahkan!');
    }

    // Tambahkan fungsi untuk OTP
    public function storeOtp(Request $request)
    {
        // cek role dulu
        if (auth()->user()->role !== 'superadmin') {
            abort(403, 'Unauthorized: hanya superadmin yang boleh membuat OTP');
        }

        $code = strtoupper(substr(bin2hex(random_bytes(3)), 0, 6)); // generate 6 karakter
        Otp::create(['code' => $code]);

        return redirect()->back()->with('success', 'OTP baru berhasil dibuat: '.$code);
    }

    public function destroyOtp($id)
    {
        // cek role dulu
        if (auth()->user()->role !== 'superadmin') {
            abort(403, 'Unauthorized: hanya superadmin yang boleh menghapus OTP');
        }

        Otp::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'OTP berhasil dihapus');
    }

}
