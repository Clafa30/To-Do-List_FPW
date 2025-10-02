@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/user.css') }}?v={{ time() }}">
@endpush

@section('content')
<div class="container">
    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2><i class="bi bi-plus-circle"></i> Tambah Tugas</h2>
        <a href="{{ route('tugas.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
    </div>

    {{-- Alert error --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form --}}
    <form method="POST" action="{{ route('tugas.store') }}">
        @csrf

        {{-- Mata Kuliah --}}
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
                <option value="sedang" {{ old('prioritas','sedang') == 'sedang' ? 'selected' : '' }}>Sedang</option>
                <option value="tinggi" {{ old('prioritas') == 'tinggi' ? 'selected' : '' }}>Tinggi</option>
            </select>
        </div>

        {{-- Tombol --}}
        <div class="d-flex justify-content-end">
            <button type="reset" class="btn btn-light me-2">Reset</button>
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-save"></i> Simpan
            </button>
        </div>
    </form>
</div>
@endsection
