<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('portofolio_1200', function (Blueprint $table) {
            $table->id();
            // Data Pribadi untuk CV
            $table->string('nama_lengkap');
            $table->string('email');
            $table->string('telepon');
            $table->string('alamat');
            $table->text('tentang_saya');
            $table->string('foto_profil')->nullable();

            // Data Portofolio Proyek
            $table->string('nama_proyek');
            $table->text('deskripsi_proyek');
            $table->string('teknologi');
            $table->string('tautan_proyek')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('portofolio_1200');
    }
};
