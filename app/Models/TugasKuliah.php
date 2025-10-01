<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TugasKuliah extends Model
{
    use HasFactory;

    protected $table = 'tugas_kuliah';

    protected $fillable = [
        'mata_kuliah',
        'deskripsi',
        'tenggat_waktu',
        'prioritas',
        'status',
    ];

    // Kalau pakai created_at & updated_at dari tabel → biarkan default
    // Kalau mau tanpa timestamps, uncomment ini:
    // public $timestamps = false;

    // user relasi
        public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
