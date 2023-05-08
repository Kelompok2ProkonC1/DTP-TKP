<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    // Set tabel
    protected $table = 'kategori';

    // Set primary key (default => 'id')
    // protected $primaryKey = 'id_kategori';

    protected $fillable = [
        'nama_kategori',
        'deskripsi_kategori',
    ];
}
