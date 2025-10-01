@extends('layouts.app')

@section('content')
<div class="container">
    <header class="d-flex justify-content-between align-items-center mb-4">
        <h1><i class="bi bi-journal-check"></i> TugasKu</h1>
        <div>
            <a href="{{ route('tugas.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Tugas Baru
            </a>
            <button id="filterToggleBtn" class="btn btn-secondary">
                <i class="bi bi-funnel-fill"></i> Filter
            </button>
            <button id="profileToggleBtn" class="btn btn-outline-dark">
                <i class="bi bi-person-circle"></i> {{ $user->username }}
            </button>
        </div>
    </header>

    {{-- Filter Overlay --}}
    <div id="filterOverlay" class="filter-overlay hidden">
        <div class="filter-content">
            <button id="closeFilterBtn" class="btn btn-danger btn-sm">Tutup</button>

            <form method="GET" action="{{ route('user.dashboard') }}">
                <div class="mb-2">
                    <label>Status:</label>
                    <select name="status" class="form-control" onchange="this.form.submit()">
                        <option value="">Semua</option>
                        <option value="belum_selesai" {{ $status == 'belum_selesai' ? 'selected' : '' }}>Belum Selesai</option>
                        <option value="selesai" {{ $status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                    </select>
                </div>

                <div class="mb-2">
                    <label>Prioritas:</label>
                    <select name="priority" class="form-control" onchange="this.form.submit()">
                        <option value="">Semua</option>
                        <option value="rendah" {{ $priority == 'rendah' ? 'selected' : '' }}>Rendah</option>
                        <option value="sedang" {{ $priority == 'sedang' ? 'selected' : '' }}>Sedang</option>
                        <option value="tinggi" {{ $priority == 'tinggi' ? 'selected' : '' }}>Tinggi</option>
                    </select>
                </div>

                <div class="mb-2">
                    <label>Urutkan:</label>
                    <select name="sort" class="form-control" onchange="this.form.submit()">
                        <option value="tenggat_waktu ASC" {{ $sort == 'tenggat_waktu ASC' ? 'selected' : '' }}>Terdekat</option>
                        <option value="tenggat_waktu DESC" {{ $sort == 'tenggat_waktu DESC' ? 'selected' : '' }}>Terjauh</option>
                        <option value="prioritas DESC" {{ $sort == 'prioritas DESC' ? 'selected' : '' }}>Prioritas</option>
                        <option value="created_at DESC" {{ $sort == 'created_at DESC' ? 'selected' : '' }}>Terbaru</option>
                    </select>
                </div>
            </form>
        </div>
    </div>

    {{-- Daftar Tugas --}}
    <div class="task-list">
        @forelse ($tasks as $task)
            <div class="task-card mb-3 p-3 border rounded shadow-sm">
                <div class="d-flex justify-content-between">
                    <h5>{{ $task->mata_kuliah }}</h5>
                    <span class="badge bg-{{ $task->prioritas == 'tinggi' ? 'danger' : ($task->prioritas == 'sedang' ? 'warning' : 'secondary') }}">
                        {{ ucfirst($task->prioritas) }}
                    </span>
                </div>

                <p>{{ $task->deskripsi }}</p>

                <div class="d-flex justify-content-between align-items-center">
                    <small><i class="bi bi-clock"></i> {{ \Carbon\Carbon::parse($task->tenggat_waktu)->format('d M Y H:i') }}</small>
                    <small>
                        @if($task->status == 'selesai')
                            <span class="badge bg-success">Selesai</span>
                        @else
                            <span class="badge bg-warning text-dark">Belum Selesai</span>
                        @endif
                    </small>

                    @if ($task->shared_by_user_id)
                        <small class="badge bg-info">Dishare oleh {{ $task->shared_by_username }}</small>
                    @endif
                </div>

                <div class="mt-2">
                    <a href="{{ route('tugas.edit', $task->id) }}" class="btn btn-sm btn-warning">
                        <i class="bi bi-pencil"></i>
                    </a>
                    <form action="{{ route('tugas.destroy', $task->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus tugas ini?')">
                            <i class="bi bi-trash"></i>
                        </button>
                    </form>
                    @if($task->status == 'belum_selesai')
                        <a href="{{ route('tugas.complete', $task->id) }}" class="btn btn-sm btn-success">
                            <i class="bi bi-check-circle"></i>
                        </a>
                    @endif
                </div>
            </div>
        @empty
            <p class="text-center">Tidak ada tugas ditemukan.</p>
        @endforelse
    </div>
</div>
@endsection
