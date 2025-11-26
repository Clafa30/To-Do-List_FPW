@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/user.css') }}?v={{ time() }}">
    <style>
        /* ===== Modern Card for Form ===== */
        .form-wrapper {
            background: rgba(255, 255, 255, 0.45);
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
            padding: 2rem;
            border-radius: 18px;
            border: 1px solid rgba(255, 255, 255, 0.3);
            box-shadow: 0 6px 25px rgba(0, 0, 0, 0.07);
            animation: fadeIn 0.6s ease;
        }

        /* ==== Modern Header ==== */
        .page-title {
            font-size: 1.8rem;
            font-weight: 600;
            color: #0f2b46;
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 1.5rem;
        }

        /* ==== Inputs ==== */
        .form-control,
        .form-select {
            border-radius: 12px;
            padding: 0.75rem;
            border: 1px solid #dfe6ee;
            transition: 0.25s ease;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #4ECDC4;
            box-shadow: 0 0 0 4px rgba(78, 205, 196, 0.25);
        }

        /* ==== Buttons ==== */
        .btn-primary {
            background: #4ECDC4;
            border-radius: 12px;
            padding: 0.7rem 1.4rem;
            border: none;
            transition: 0.25s ease;
        }

        .btn-primary:hover {
            background: #41ada6;
        }

        .btn-secondary {
            border-radius: 12px;
        }

        /* ==== Fade animation ==== */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(12px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
@endpush

@section('content')
    <div class="container">

        {{-- Header --}}
        <h2 class="page-title">
            <i class="bi bi-pencil-square"></i> Edit Tugas
        </h2>

        {{-- Modern Form Card --}}
        <div class="form-wrapper">
            <form method="POST" action="{{ route('tugas.update', $tugas->id) }}">
                @csrf
                @method('PUT')

                {{-- Judul --}}
                <div class="mb-3">
                    <label class="form-label">Judul</label>
                    <input type="text" name="judul" class="form-control" value="{{ old('judul', $tugas->judul) }}" required>
                </div>

                {{-- Deskripsi --}}
                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control"
                        rows="3">{{ old('deskripsi', $tugas->deskripsi) }}</textarea>
                </div>

                {{-- Deadline --}}
                <div class="mb-3">
                    <label class="form-label">Deadline</label>
                    <input type="date" name="deadline" class="form-control"
                        value="{{ old('deadline', \Carbon\Carbon::parse($tugas->deadline)->format('Y-m-d')) }}" required>
                </div>

                {{-- Prioritas --}}
                <div class="mb-3">
                    <label class="form-label">Prioritas</label>
                    <select name="prioritas" class="form-select">
                        <option value="rendah" {{ $tugas->prioritas == 'rendah' ? 'selected' : '' }}>Rendah</option>
                        <option value="sedang" {{ $tugas->prioritas == 'sedang' ? 'selected' : '' }}>Sedang</option>
                        <option value="tinggi" {{ $tugas->prioritas == 'tinggi' ? 'selected' : '' }}>Tinggi</option>
                    </select>
                </div>

                {{-- Status --}}
                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select">
                        <option value="pending" {{ $tugas->status == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="selesai" {{ $tugas->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                    </select>
                </div>

                {{-- Buttons --}}
                <div class="d-flex justify-content-end mt-4 gap-2">
                    <a href="{{ route('tugas.index') }}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save"></i> Simpan
                    </button>
                </div>

            </form>
        </div>
    </div>
@endsection