<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jurusan = [
            ['nama_jurusan' => 'Teknik Informatika'],
            ['nama_jurusan' => 'Sistem Informasi'],
            ['nama_jurusan' => 'Teknik Komputer'],
            ['nama_jurusan' => 'Manajemen Informatika'],
            ['nama_jurusan' => 'Ilmu Komputer'],
            ['nama_jurusan' => 'Rekayasa Perangkat Lunak'],
            ['nama_jurusan' => 'Desain Komunikasi Visual'],
            ['nama_jurusan' => 'Multimedia'],
            ['nama_jurusan' => 'Teknik Elektro'],
            ['nama_jurusan' => 'Teknik Mesin'],
            ['nama_jurusan' => 'Teknik Sipil'],
            ['nama_jurusan' => 'Teknik Kimia'],
            ['nama_jurusan' => 'Teknik Industri'],
            ['nama_jurusan' => 'Teknik Lingkungan'],
            ['nama_jurusan' => 'Teknik Geologi'],
            ['nama_jurusan' => 'Teknik Perkapalan'],
            ['nama_jurusan' => 'Teknik Telekomunikasi'],
            ['nama_jurusan' => 'Kedokteran'],
            ['nama_jurusan' => 'Keperawatan'],
            ['nama_jurusan' => 'Farmasi'],
            ['nama_jurusan' => 'Gizi'],
            ['nama_jurusan' => 'Kesehatan Masyarakat'],
            ['nama_jurusan' => 'Bioteknologi'],
            ['nama_jurusan' => 'Akuntansi'],
            ['nama_jurusan' => 'Manajemen'],
            ['nama_jurusan' => 'Ekonomi'],
            ['nama_jurusan' => 'Administrasi Bisnis'],
            ['nama_jurusan' => 'Ilmu Komunikasi'],
            ['nama_jurusan' => 'Hubungan Internasional'],
            ['nama_jurusan' => 'Psikologi'],
            ['nama_jurusan' => 'Sastra Inggris'],
            ['nama_jurusan' => 'Sastra Jepang'],
            ['nama_jurusan' => 'Sastra Indonesia'],
            ['nama_jurusan' => 'Pendidikan Guru SD'],
            ['nama_jurusan' => 'Pendidikan Matematika'],
            ['nama_jurusan' => 'Pendidikan Biologi'],
            ['nama_jurusan' => 'Pendidikan Kimia'],
            ['nama_jurusan' => 'Pendidikan Fisika'],
            ['nama_jurusan' => 'Pendidikan Bahasa Inggris'],
            ['nama_jurusan' => 'Pendidikan Bahasa Indonesia'],
            ['nama_jurusan' => 'Pendidikan Sejarah'],
            ['nama_jurusan' => 'Pendidikan Geografi'],
            ['nama_jurusan' => 'Pendidikan Seni Rupa'],
            ['nama_jurusan' => 'Pendidikan Olahraga'],
            ['nama_jurusan' => 'Agribisnis'],
            ['nama_jurusan' => 'Agroteknologi'],
            ['nama_jurusan' => 'Peternakan'],
            ['nama_jurusan' => 'Kehutanan'],
            ['nama_jurusan' => 'Perikanan'],
            ['nama_jurusan' => 'Kelautan'],
            ['nama_jurusan' => 'Astronomi'],
            ['nama_jurusan' => 'Statistika'],
            ['nama_jurusan' => 'Matematika'],
            ['nama_jurusan' => 'Fisika'],
            ['nama_jurusan' => 'Kimia'],
            ['nama_jurusan' => 'Biologi'],
            ['nama_jurusan' => 'Geografi'],
            ['nama_jurusan' => 'Sejarah'],
            ['nama_jurusan' => 'Sosiologi'],
            ['nama_jurusan' => 'Antropologi'],
            ['nama_jurusan' => 'Filsafat'],
            ['nama_jurusan' => 'Hukum'],
            ['nama_jurusan' => 'Kriminologi'],
            ['nama_jurusan' => 'Ilmu Politik'],
            ['nama_jurusan' => 'Administrasi Publik'],
            ['nama_jurusan' => 'Ilmu Perpustakaan'],
            ['nama_jurusan' => 'Jurnalistik'],
            ['nama_jurusan' => 'Arsitektur'],
            ['nama_jurusan' => 'Desain Interior'],
            ['nama_jurusan' => 'Desain Produk'],
            ['nama_jurusan' => 'Seni Musik'],
            ['nama_jurusan' => 'Seni Tari'],
            ['nama_jurusan' => 'Seni Teater'],
            ['nama_jurusan' => 'Seni Rupa'],
            ['nama_jurusan' => 'Fotografi'],
            ['nama_jurusan' => 'Broadcasting'],
            ['nama_jurusan' => 'Perhotelan'],
            ['nama_jurusan' => 'Pariwisata'],
            ['nama_jurusan' => 'Bisnis Digital'],
            ['nama_jurusan' => 'Manajemen Transportasi'],
            ['nama_jurusan' => 'Teknik Penerbangan'],
            ['nama_jurusan' => 'Manajemen Informatika'],
            ['nama_jurusan' => 'Teknologi Pangan'],
            ['nama_jurusan' => 'Teknik Biomedis'],
            ['nama_jurusan' => 'Teknologi Pertanian'],
            ['nama_jurusan' => 'Teknik Nuklir'],
            ['nama_jurusan' => 'Teknik Robotika'],
        ];

        // Masukkan data ke dalam tabel
        DB::table('jurusan')->insert($jurusan);
    }
}
