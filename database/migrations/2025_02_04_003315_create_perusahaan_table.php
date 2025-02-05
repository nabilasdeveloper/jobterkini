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
        Schema::create('perusahaan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_perusahaan');
            $table->string('email_perusahaan')->unique();
            $table->string('contact_perusahaan')->nullable();
            $table->string('password');
            $table->text('deskripsi_perusahaan')->nullable();
            $table->text('alamat_perusahaan')->nullable();
            $table->text('jenis_industri_perusahaan')->nullable();
            $table->text('ukuran_perusahaan')->nullable();
            $table->text('website_perusahaan')->nullable();
            $table->text('img_perusahaan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perusahaan');
    }
};
