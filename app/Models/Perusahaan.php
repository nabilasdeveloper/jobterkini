<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Perusahaan extends Authenticatable
{
    use HasFactory;

    protected $table = 'perusahaan';
    
    protected $fillable = [
        'nama_perusahaan',
        'email_perusahaan',
        'contact_perusahaan',
        'password',
        'deskripsi_perusahaan',
        'alamat_perusahaan',
        'jenis_industri_perusahaan',
        'ukuran_perusahaan',
        'website_perusahaan',
        'img_perusahaan',
        'file_verifikasi',
        'status_verifikasi', // 'pending' atau 'approved'
    ];
    

    public function lowongan()
    {
        return $this->hasMany(Lowongan::class, 'perusahaan_id', 'id');
    }
}
