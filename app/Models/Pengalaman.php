<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengalaman extends Model
{
    use HasFactory;

    protected $table = 'pengalaman';

    protected $fillable = [
        'user_id',
        'perusahaan',
        'deskripsi_pekerjaan',
        'bidang',
        'tahun_mulai',
        'tahun_selesai',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
