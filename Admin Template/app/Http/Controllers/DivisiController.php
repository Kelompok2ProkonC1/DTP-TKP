<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DivisiController extends Controller
{
    public function index()
    {
        // ngambil data dari tabel divisi
        $divisi = DB::table('divisi')->get();

        // manggil view, lalu mengirim data ke view petugas
        return view('divisi', ['divisi' => $divisi]);

    }
}
