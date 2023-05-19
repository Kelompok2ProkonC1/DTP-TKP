<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'surat';

    // Set primary key (default => 'id')
    // protected $primaryKey = 'id_divisi';

    protected $fillable = [
        'nomer_surat',
        'id_pengajuan',
        
    ];
}
