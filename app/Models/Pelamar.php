<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelamar extends Model
{
    use HasFactory;

    protected $table = 'pelamar';
    protected $fillable = [
        'lowongan_id',
        'users_id',
        'surat_lamaran',
        'cv',
        'dokumen_lainnya',
        'status'
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke Lowongan
    public function lowongan()
    {
        return $this->belongsTo(Lowongan::class);
    }
}
