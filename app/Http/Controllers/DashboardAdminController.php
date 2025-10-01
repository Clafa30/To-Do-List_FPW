<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengumuman;
use App\Models\User;

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

        // kirim dua-duanya ke view
        return view('Admin.dashboard', compact('pengumuman', 'admins'));
        }

            public function edit(User $admin)
        {
            return view('Admin.edit', compact('admin'));
        }

        public function update(Request $request, User $admin)
        {
            $request->validate([
                'name'  => 'required|string|max:255',
                'email' => 'required|email',
            ]);

            $admin->update($request->only(['name','email']));
            return redirect()->route('dashboard')->with('success', 'Data admin berhasil diperbarui');
        }

        public function destroy(User $admin)
        {
            $admin->delete();
            return redirect()->route('dashboard')->with('warning', 'Data admin berhasil dihapus');
        }

    public function store(Request $request)
    {
        // Validasi input
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
}