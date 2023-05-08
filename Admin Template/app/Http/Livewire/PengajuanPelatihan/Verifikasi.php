<?php

namespace App\Http\Livewire\PengajuanPelatihan;

use Illuminate\Http\Request;
use Livewire\Component;
use App\Models\User;
use App\Models\Pengajuan;
use App\Models\Pelatihan;
use App\Models\Category;
use App\Models\Divisi;

class Verifikasi extends Component
{
    // Approve specific pengajuan pelatihan
    public function aprrove_pengajuan(Request $request)
    {
        $pengajuan = Pengajuan::find($request->input('id'));
        $pengajuan->status_pengajuan = 'Diterima';
        $pengajuan->tanggal_acc = now();
        $pengajuan->save();

        session()->flash('status', 'Pengajuan pelatihan berhasil diterima!');

        // redirect back to the previous page
        return redirect()->route('verifikasi');
    }

    // Disapprove specific pengajuan pelatihan
    public function disaprrove_pengajuan(Request $request)
    {
        // delete data with the specified ID
        $pengajuan = Pengajuan::find($request->input('id'));
        $pengajuan->status_pengajuan = 'Ditolak';
        // $pengajuan->tanggal_acc = now();
        $pengajuan->save();

        session()->flash('status', 'Pengajuan pelatihan berhasil ditolak!');

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

        if($request->has('range'))
        {
            $range = $request->input('range');
        }
        else
        {
            $range = 1;
        }

        return view('livewire.pengajuan-pelatihan.verifikasi', compact('divisi', 'users', 'pengajuan', 'pelatihan', 'kategori', 'range'));
    }  
}
?>