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
        Schema::create('pelamar', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('lowongan_id');
            $table->unsignedBigInteger('users_id');
            $table->string('surat_lamaran');
            $table->string('cv');
            $table->string('dokumen_lainnya')->nullable();
            $table->enum('status', ['Dikirim', 'Diproses', 'Diterima', 'Ditolak'])->default('Dikirim');
            $table->timestamps();
            $table->foreign('lowongan_id')->references('id')->on('lowongan')->onDelete('cascade');
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelamar');
    }
};
