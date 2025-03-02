<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('lowongan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('perusahaan_id');
            $table->string('nama_lowongan');
            $table->string('jenjang_pendidikan_lowongan');
            $table->string('jurusan_pendidikan_lowongan');
            $table->text('persyaratan_lowongan');
            $table->date('penutupan_lowongan');
            $table->text('rincian_lowongan');
            $table->text('kategori_lowongan');
            $table->text('waktu_bekerja');
            $table->text('gaji_perbulan');
            $table->text('status_lowongan');
            $table->timestamps();
            $table->foreign('perusahaan_id')->references('id')->on('perusahaan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lowongan');
    }
};
