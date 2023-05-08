<?php

namespace App\Http\Livewire\PengajuanPelatihan;

use Illuminate\Http\Request;
use Livewire\Component;
use App\Models\User;
use App\Models\Pengajuan;
use App\Models\Pelatihan;
use App\Models\Category;
use App\Models\Divisi;

class InfoPengajuan extends Component
{
    public function render(Request $request)
    {
        $pengajuan = Pengajuan::find($request->input('id'));
        $user = User::find($pengajuan->id_user);
        $divisi = Divisi::find($user->id_divisi);
        $pelatihan = Pelatihan::find($pengajuan->id_pelatihan);
        $kategori = Category::find($pelatihan->id_kategori);

        return view('livewire.pengajuan-pelatihan.info-pengajuan', compact('divisi', 'user', 'pengajuan', 'pelatihan', 'kategori'));
    }  
}
?>