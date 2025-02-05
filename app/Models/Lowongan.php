<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lowongan extends Model
{
    use HasFactory;

    protected $table = 'lowongan';
    protected $fillable = [
        'perusahaan_id',
        'nama_lowongan',
        'jenjang_pendidikan_lowongan',
        'jurusan_pendidikan_lowongan',
        'persyaratan_lowongan',
        'penutupan_lowongan',
        'rincian_lowongan',
        'kategori_lowongan',
        'waktu_bekerja',
        'gaji_perbulan',
        'status_lowongan',
    ];

    public function perusahaan()
    {
        return $this->belongsTo(Perusahaan::class, 'perusahaan_id', 'id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'pelamar', 'lowongan_id', 'users_id')
            ->withTimestamps();
    }

    public function pelamar()
    {
        return $this->hasMany(Pelamar::class, 'lowongan_id', 'id');
    }
}
