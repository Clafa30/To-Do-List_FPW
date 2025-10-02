<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TugasKuliah;
use App\Models\Pengumuman;

class TugasController extends Controller
{
    /**
     * List semua tugas dengan filter dan sorting.
     */
    public function index(Request $request)
    {
        $status   = $request->get('status');
        $priority = $request->get('priority');
        $deadline = $request->get('deadline'); // filter berdasarkan deadline
        $sort     = $request->get('sort', 'deadline_asc');

        $allowedSort = [
            'deadline_asc'  => ['deadline', 'asc'],   // terdekat ke jauh
            'deadline_desc' => ['deadline', 'desc'],  // jauh ke dekat
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

        if ($deadline) {
            $query->whereDate('deadline', '<=', $deadline); // semua tugas sampai tanggal tertentu
        }

        [$field, $direction] = $allowedSort[$sort];
        $tasks = $query->orderBy($field, $direction)->get();

        $pengumuman = Pengumuman::latest()->first();

        return view('tugas.index', compact('tasks', 'status', 'priority', 'deadline', 'sort', 'pengumuman'));
    }

    /**
     * Tampilkan form untuk menambah tugas baru.
     */
    public function create()
    {
        return view('tugas.create');
    }

    /**
     * Simpan tugas baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul'     => 'required|string|max:100',
            'deskripsi' => 'nullable|string',
            'deadline'  => 'required|date',
            'prioritas' => 'nullable|in:rendah,sedang,tinggi',
        ]);

        TugasKuliah::create([
            'judul'     => $request->judul,
            'deskripsi' => $request->deskripsi,
            'deadline'  => $request->deadline,
            'prioritas' => $request->prioritas ?? 'sedang',
            'status'    => 'pending',
            'user_id'   => auth()->id(),
        ]);

        return redirect()->route('tugas.index')->with('success', 'Tugas berhasil ditambahkan!');
    }

    /**
     * Tampilkan form edit tugas.
     */
    public function edit($id)
    {
        $tugas = TugasKuliah::findOrFail($id);
        return view('tugas.edit', compact('tugas'));
    }

    /**
     * Update tugas.
     */
    public function update(Request $request, $id)
    {
        $tugas = TugasKuliah::findOrFail($id);

        $request->validate([
            'judul'     => 'required|string|max:100',
            'deskripsi' => 'nullable|string',
            'deadline'  => 'required|date',
            'prioritas' => 'nullable|in:rendah,sedang,tinggi',
            'status'    => 'nullable|in:pending,selesai',
        ]);

        $tugas->update($request->only(['judul', 'deskripsi', 'deadline', 'prioritas', 'status']));

        return redirect()->route('tugas.index')->with('success', 'Tugas berhasil diupdate!');
    }

    /**
     * Tandai tugas selesai.
     */
    public function markComplete($id)
    {
        $tugas = TugasKuliah::findOrFail($id);
        $tugas->update(['status' => 'selesai']);

        return redirect()->route('tugas.index')->with('success', 'Tugas ditandai selesai!');
    }

    /**
     * Hapus tugas.
     */
    public function destroy($id)
    {
        $tugas = TugasKuliah::findOrFail($id);
        $tugas->delete();

        return redirect()->route('tugas.index')->with('success', 'Tugas berhasil dihapus!');
    }
}
