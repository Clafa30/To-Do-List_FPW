@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/user.css') }}?v={{ time() }}">
@endpush

@section('content')
<div class="container">

    {{-- Pengumuman terbaru --}}
    @if($pengumuman)
        <div class="alert alert-info d-flex align-items-center mb-4 shadow-sm">
            <i class="bi bi-megaphone-fill me-2"></i>
            <div>
                <strong>{{ $pengumuman->judul }}</strong><br>
                <small>{{ Str::limit($pengumuman->konten, 100) }}</small>
            </div>
            <span class="ms-auto text-muted small">
                {{ $pengumuman->created_at }}
            </span>
        </div>
    @endif

    {{-- Alert sukses --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Tugas List --}}
    @if($tasks->isEmpty())
        <p class="text-muted">Belum ada tugas.</p>
    @else
        <div class="row g-4">
            @foreach($tasks as $tugas)
            <div class="col-md-4 mb-4">
                <div class="card h-100 d-flex flex-column shadow-sm">
                    <div class="card-body d-flex flex-column">
                        {{-- Judul --}}
                        <h5 class="card-title fw-bold text-primary">{{ $tugas->judul }}</h5>

                        {{-- Deskripsi --}}
                        <p class="card-text deskripsi flex-grow-1">{{ $tugas->deskripsi }}</p>

                        {{-- Bagian bawah --}}
                        <div class="mt-auto">
                            <p class="mb-1"><i class="bi bi-calendar"></i> <strong>Deadline:</strong> 
                                {{ $tugas->deadline ? \Carbon\Carbon::parse($tugas->deadline)->format('d M Y') : '-' }}
                            </p>
                            <p class="mb-1">
                                <i class="bi bi-flag"></i> <strong>Prioritas:</strong> 
                                <span class="badge 
                                    @if($tugas->prioritas == 'rendah') bg-secondary
                                    @elseif($tugas->prioritas == 'sedang') bg-warning text-dark
                                    @elseif($tugas->prioritas == 'tinggi') bg-danger
                                    @else bg-light text-dark
                                    @endif">
                                    {{ ucfirst($tugas->prioritas) }}
                                </span>
                            </p>
                            <p class="mb-3"><i class="bi bi-check2-circle"></i> <strong>Status:</strong> 
                                <span class="badge {{ $tugas->status == 'pending' ? 'bg-warning text-dark' : 'bg-success' }}">
                                    {{ ucfirst($tugas->status) }}
                                </span>
                            </p>

                            <div class="d-flex gap-2">
                                {{-- Mark complete --}}
                                @if($tugas->status == 'pending')
                                    <form action="{{ route('tugas.complete', $tugas->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-sm btn-info">
                                            <i class="bi bi-check2"></i> Selesai
                                        </button>
                                    </form>
                                @endif

                                {{-- Edit --}}
                                <a href="{{ route('tugas.edit', $tugas->id) }}" class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>

                                {{-- Delete --}}
                                <form action="{{ route('tugas.destroy', $tugas->id) }}" method="POST" onsubmit="return confirm('Yakin hapus tugas ini?')">
                                    @csrf 
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
