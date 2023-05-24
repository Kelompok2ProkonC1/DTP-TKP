<?php

namespace App\Http\Livewire\PengajuanPelatihan;

use Illuminate\Http\Request;
use Livewire\Component;
use App\Models\User;
use App\Models\Pengajuan;
use App\Models\Pelatihan;
use App\Models\Category;
use App\Models\Divisi;

class History extends Component
{
    public function render(Request $request)
    {
        $users = User::all();
        if(auth()->user()->role_user === 'Admin' || auth()->user()->role_user === 'Super Admin')
        {
            $pengajuan = Pengajuan::where('status_pengajuan', '!=', 'Belum')->get();
        }
        else if(auth()->user()->role_user === 'Karyawan')
        {
            $pengajuan = Pengajuan::where('id_user', auth()->user()->id)->get();
        }
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

        return view('livewire.pengajuan-pelatihan.history', compact('divisi', 'users', 'pengajuan', 'pelatihan', 'kategori', 'range'));
    }  
}
?>