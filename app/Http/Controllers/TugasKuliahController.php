<?php

namespace App\Http\Controllers;

use App\Models\TugasKuliah;
use Illuminate\Http\Request;

class TugasKuliahController extends Controller
{
    // Menampilkan semua tugas
    public function index()
    {
        $tugas = TugasKuliah::all();
        return view('tugas.index', compact('tugas'));
    }

    // Form tambah tugas
    public function create()
    {
        return view('tugas.create');
    }

    // Insert (simpan tugas baru)
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'deadline' => 'nullable|date',
        ]);

        TugasKuliah::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'deadline' => $request->deadline,
            'status' => 'pending',
            'user_id' => auth()->id(), // kalau ada login user
        ]);

        return redirect()->route('tugas.index')->with('success', 'Tugas berhasil ditambahkan!');
    }

    // Update tugas
    public function update(Request $request, $id)
    {
        $tugas = TugasKuliah::findOrFail($id);

        $tugas->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'deadline' => $request->deadline,
        ]);

        return redirect()->route('tugas.index')->with('success', 'Tugas berhasil diupdate!');
    }

    // Delete tugas
    public function destroy($id)
    {
        $tugas = TugasKuliah::findOrFail($id);
        $tugas->delete();

        return redirect()->route('tugas.index')->with('success', 'Tugas berhasil dihapus!');
    }

    // Mark complete (ubah status jadi selesai)
    public function markComplete($id)
    {
        $tugas = TugasKuliah::findOrFail($id);
        $tugas->update(['status' => 'selesai']);

        return redirect()->route('tugas.index')->with('success', 'Tugas ditandai selesai!');
    }
}
