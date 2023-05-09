<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class Pelatihan extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'pelatihan';

    // Set primary key (default => 'id')
    // protected $primaryKey = 'id_divisi';

    protected $fillable = [
        'judul_pelatihan',
        'id_kategori',
        'deskripsi_pelatihan',
        'tanggal_dimulai',
        'tanggal_berakhir',
        'biaya_pelatihan',
        'tempat_pelatihan',
        'bersetifikat',
        'scope_pelatihan',
        'gambar_pelatihan',
    ];
}
