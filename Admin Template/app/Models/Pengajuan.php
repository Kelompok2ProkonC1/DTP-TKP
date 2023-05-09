<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'pengajuan';

    // Set primary key (default => 'id')
    // protected $primaryKey = 'id_divisi';

    protected $fillable = [
        'tanggal_pengajuan',
        'id_pelatihan',
        'id_user',
        'status_pengajuan',
        'dokumen_pengajuan',
    ];
}
