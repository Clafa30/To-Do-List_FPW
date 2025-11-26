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

        .btn-light {
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
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="page-title">
                <i class="bi bi-plus-circle"></i>
                Tambah Tugas
            </h2>

            <a href="{{ route('tugas.index') }}" class="btn btn-light">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </div>

        {{-- Error alert --}}
        @if ($errors->any())
            <div class="alert alert-danger rounded-3">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Modern Form Card --}}
        <div class="form-wrapper">
            <form method="POST" action="{{ route('tugas.store') }}">
                @csrf

                {{-- Judul --}}
                <div class="mb-3">
                    <label class="form-label">Judul <span class="text-danger">*</span></label>
                    <input type="text" name="judul" value="{{ old('judul') }}" class="form-control" required>
                </div>

                {{-- Deskripsi --}}
                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" rows="3">{{ old('deskripsi') }}</textarea>
                </div>

                {{-- Deadline --}}
                <div class="mb-3">
                    <label class="form-label">Deadline <span class="text-danger">*</span></label>
                    <input type="date" name="deadline" value="{{ old('deadline') }}" class="form-control" required>
                </div>

                {{-- Prioritas --}}
                <div class="mb-3">
                    <label class="form-label">Prioritas</label>
                    <select name="prioritas" class="form-select">
                        <option value="rendah" {{ old('prioritas') == 'rendah' ? 'selected' : '' }}>Rendah</option>
                        <option value="sedang" {{ old('prioritas', 'sedang') == 'sedang' ? 'selected' : '' }}>Sedang</option>
                        <option value="tinggi" {{ old('prioritas') == 'tinggi' ? 'selected' : '' }}>Tinggi</option>
                    </select>
                </div>

                {{-- Buttons --}}
                <div class="d-flex justify-content-end mt-4">
                    <button type="reset" class="btn btn-light me-2">Reset</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection