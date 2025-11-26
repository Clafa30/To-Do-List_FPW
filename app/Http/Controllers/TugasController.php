<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TugasKuliah;
use App\Models\Pengumuman;
use Barryvdh\DomPDF\Facade\Pdf;

class TugasController extends Controller
{
    /**
     * List semua tugas dengan filter dan sorting.
     */
    public function index(Request $request)
    {
        $marquee = Pengumuman::orderBy('created_at', 'desc')->first();

        $status = $request->get('status');
        $priority = $request->get('priority');
        $deadline = $request->get('deadline');
        $sort = $request->get('sort', 'deadline_asc');
        $search = $request->get('search');

        $allowedSort = [
            'deadline_asc' => ['deadline', 'asc'],
            'deadline_desc' => ['deadline', 'desc'],
            'priority_desc' => ['prioritas', 'desc'],
            'created_desc' => ['created_at', 'desc'],
        ];

        if (!array_key_exists($sort, $allowedSort)) {
            $sort = 'deadline_asc';
        }

        $query = TugasKuliah::query();

        $query->where('user_id', auth()->id());

        // FILTER
        if ($status) {
            $query->where('status', $status);
        }

        if ($priority) {
            $query->where('prioritas', $priority);
        }

        if ($deadline) {
            $query->whereDate('deadline', '<=', $deadline);
        }

        // 🔎 SEARCH FUNCTION
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('judul', 'like', "%{$search}%")
                    ->orWhere('deskripsi', 'like', "%{$search}%");
            });
        }

        // SORTING
        [$field, $direction] = $allowedSort[$sort];

        // ⭐ PAGINATION (ganti get() menjadi paginate)
        $tasks = $query->orderBy($field, $direction)->paginate(3);

        // Agar query tetap terpanggil saat pindah halaman
        $tasks->appends($request->all());

        $pengumuman = Pengumuman::latest()->first();

        return view('tugas.index', compact(
            'tasks',
            'status',
            'priority',
            'deadline',
            'sort',
            'search',
            'pengumuman',
            'marquee'
        ));
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
            'judul' => 'required|string|max:100',
            'deskripsi' => 'nullable|string',
            'deadline' => 'required|date',
            'prioritas' => 'nullable|in:rendah,sedang,tinggi',
        ]);

        TugasKuliah::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'deadline' => $request->deadline,
            'prioritas' => $request->prioritas ?? 'sedang',
            'status' => 'pending',
            'user_id' => auth()->id(),
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
            'judul' => 'required|string|max:100',
            'deskripsi' => 'nullable|string',
            'deadline' => 'required|date',
            'prioritas' => 'nullable|in:rendah,sedang,tinggi',
            'status' => 'nullable|in:pending,selesai',
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

    public function exportPDF(Request $request)
    {
        $status = $request->get('status');
        $priority = $request->get('priority');
        $search = $request->get('search');

        $query = TugasKuliah::where('user_id', auth()->id());

        if ($status) {
            $query->where('status', $status);
        }

        if ($priority) {
            $query->where('prioritas', $priority);
        }

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('judul', 'like', "%{$search}%")
                    ->orWhere('deskripsi', 'like', "%{$search}%");
            });
        }

        $tasks = $query->orderBy('deadline', 'asc')->get();

        $pdf = Pdf::loadView('tugas.export-pdf', compact('tasks'));

        return $pdf->download('tugas_list.pdf');
    }
}
