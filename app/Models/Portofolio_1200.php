<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portofolio_1200 extends Model
{
    protected $table = 'portofolio_1200';

    protected $fillable = [
        'nama_lengkap', 'email', 'telepon', 'alamat', 'tentang_saya',
        'foto_profil', 'nama_proyek', 'deskripsi_proyek', 'teknologi', 'tautan_proyek'
    ];
}
