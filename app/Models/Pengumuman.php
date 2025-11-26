<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    protected $table = 'pengumuman';
    protected $primaryKey = 'id_pengumuman';
    public $timestamps = false; // karena tabel hanya punya created_at

    protected $fillable = [
        'judul',
        'konten',
        'created_at'
    ];
}