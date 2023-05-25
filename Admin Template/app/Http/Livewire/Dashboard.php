<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Pengajuan;
use App\Models\Pelatihan;
use App\Models\Category;
use App\Models\Divisi;

class Dashboard extends Component
{
    public function render()
    {
        if(auth()->user()->role_user == 'Admin' || auth()->user()->role_user == 'Super Admin')
        {
            $belum = Pengajuan::where('status_pengajuan', '=', 'Belum')->count();
            $diterima = Pengajuan::where('status_pengajuan', '=', 'Diterima')->count();
            $ditolak = Pengajuan::where('status_pengajuan', '=', 'Ditolak')->count();
        }
        else
        {
            $belum = Pengajuan::where('status_pengajuan', '=', 'Belum')->where('id_user', '=', auth()->user()->id)->count();
            $diterima = Pengajuan::where('status_pengajuan', '=', 'Diterima')->where('id_user', '=', auth()->user()->id)->count();
            $ditolak = Pengajuan::where('status_pengajuan', '=', 'Ditolak')->where('id_user', '=', auth()->user()->id)->count();
        }

        $user = User::count();
        $divisi = Divisi::count();
        $category = Category::count();

        return view('livewire.dashboard', compact('belum', 'diterima', 'ditolak', 'user', 'divisi', 'category'));
    }
}
