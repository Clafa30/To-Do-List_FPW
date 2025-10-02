@extends('layouts.app')

@section('content')
<div class="container">
    <h2><i class="bi bi-pencil-square"></i> Edit Tugas</h2>

    <form method="POST" action="{{ route('tugas.update', $tugas->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Judul</label>
            <input type="text" name="judul" class="form-control" value="{{ old('judul', $tugas->judul) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea name="deskripsi" class="form-control">{{ old('deskripsi', $tugas->deskripsi) }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Deadline</label>
            <input type="date" name="deadline" class="form-control" 
                   value="{{ old('deadline', \Carbon\Carbon::parse($tugas->deadline)->format('Y-m-d')) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Prioritas</label>
            <select name="prioritas" class="form-select">
                <option value="rendah" {{ $tugas->prioritas == 'rendah' ? 'selected' : '' }}>Rendah</option>
                <option value="sedang" {{ $tugas->prioritas == 'sedang' ? 'selected' : '' }}>Sedang</option>
                <option value="tinggi" {{ $tugas->prioritas == 'tinggi' ? 'selected' : '' }}>Tinggi</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-select">
                <option value="pending" {{ $tugas->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="selesai" {{ $tugas->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Simpan</button>
        <a href="{{ route('tugas.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
