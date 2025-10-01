<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TugasKuliah;

class TugasController extends Controller
{
    // List semua tugas
    public function index(Request $request)
    {
        $status   = $request->get('status');
        $priority = $request->get('priority');
        $sort     = $request->get('sort', 'deadline_asc');

        $allowedSort = [
            'deadline_asc'  => ['deadline', 'asc'],
            'deadline_desc' => ['deadline', 'desc'],
            'priority_desc' => ['prioritas', 'desc'],
            'created_desc'  => ['created_at', 'desc'],
        ];

        if (!array_key_exists($sort, $allowedSort)) {
            $sort = 'deadline_asc';
        }

        $query = TugasKuliah::query();

        if ($status) {
            $query->where('status', $status);
        }

        if ($priority) {
            $query->where('prioritas', $priority);
        }

        [$field, $direction] = $allowedSort[$sort];
        $tasks = $query->orderBy($field, $direction)->get();

        return view('tugas.index', compact('tasks', 'status', 'priority', 'sort'));
    }

    // Form tambah tugas
    public function create()
    {
        return view('tugas.create');
    }

    // Simpan tugas baru
    public function store(Request $request)
    {
        $request->validate([
            'mata_kuliah' => 'required|string|max:100',
            'deskripsi'   => 'nullable|string',
            'deadline'    => 'required|date',
            'prioritas'   => 'nullable|in:rendah,sedang,tinggi',
        ]);

        TugasKuliah::create([
            'mata_kuliah' => $request->mata_kuliah,
            'deskripsi'   => $request->deskripsi,
            'deadline'    => $request->deadline,
            'prioritas'   => $request->prioritas ?? 'sedang',
            'status'      => 'belum_selesai',
        ]);

        return redirect()->route('tugas.index')->with('success', 'Tugas berhasil ditambahkan!');
    }

    // Update tugas
    public function update(Request $request, $id)
    {
        $tugas = TugasKuliah::findOrFail($id);

        $request->validate([
            'mata_kuliah' => 'required|string|max:100',
            'deskripsi'   => 'nullable|string',
            'deadline'    => 'required|date',
            'prioritas'   => 'nullable|in:rendah,sedang,tinggi',
            'status'      => 'nullable|in:belum_selesai,selesai',
        ]);

        $tugas->update($request->only([
            'mata_kuliah', 'deskripsi', 'deadline', 'prioritas', 'status'
        ]));

        return redirect()->route('tugas.index')->with('success', 'Tugas berhasil diupdate!');
    }

    // Hapus tugas
    public function destroy($id)
    {
        $tugas = TugasKuliah::findOrFail($id);
        $tugas->delete();

        return redirect()->route('tugas.index')->with('success', 'Tugas berhasil dihapus!');
    }

    // Tandai selesai
    public function markComplete($id)
    {
        $tugas = TugasKuliah::findOrFail($id);
        $tugas->update(['status' => 'selesai']);

        return redirect()->route('tugas.index')->with('success', 'Tugas ditandai selesai!');
    }
}
