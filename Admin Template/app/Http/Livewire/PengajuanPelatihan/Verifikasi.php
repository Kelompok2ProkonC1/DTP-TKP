<?php

namespace App\Http\Livewire\PengajuanPelatihan;

use Illuminate\Http\Request;
use Livewire\Component;
use App\Models\User;
use App\Models\Pengajuan;
use App\Models\Pelatihan;
use App\Models\Category;
use App\Models\Divisi;
use App\Models\Surat;

class Verifikasi extends Component
{
    // Approve specific pengajuan pelatihan
    public function aprrove_pengajuan(Request $request)
    {
        Surat::create([
            'id_pengajuan' => $request->input('id'),
        ]);

        // Get Latest record of surat's table
        $surat = Surat::latest()->first();

        $pengajuan = Pengajuan::find($request->input('id'));
        $pengajuan->status_pengajuan = 'Diterima';
        $pengajuan->id_admin = auth()->user()->id;
        $pengajuan->tanggal_verifikasi = now();
        $pengajuan->id_surat = $surat->id;
        $pengajuan->save();

        session()->flash('status', 'Pengajuan pelatihan berhasil diterima!');

        // redirect back to the previous page
        return redirect()->route('verifikasi');
    }

    public function render(Request $request)
    {
        $users = User::all();
        $pengajuan = Pengajuan::where('status_pengajuan', '=', 'Belum')->get();
        $pelatihan = Pelatihan::all();
        $kategori = Category::all();
        $divisi = Divisi::all();

        if ($request->has('range')) {
            $range = $request->input('range');
        } else {
            $range = 1;
        }

        return view('livewire.pengajuan-pelatihan.verifikasi', compact('divisi', 'users', 'pengajuan', 'pelatihan', 'kategori', 'range'));
    }
}
