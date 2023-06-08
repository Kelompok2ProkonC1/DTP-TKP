<?php

namespace App\Http\Livewire\Auth;

use Illuminate\Http\Request;
use Livewire\Component;
use App\Models\User;
use App\Models\Pengajuan;
use App\Models\Pelatihan;
use App\Models\Category;
use App\Models\Surat;
use App\Models\Divisi;

class QRInfo extends Component
{
    // public $qrId;

    // public function mount($id)
    // {
    //     $this->qrId = $id;
    // }

    public function render($id)
    {
        // $surat = Surat::find($this->qrId);
        // // return view('livewire.auth.login');
        // return view('livewire.auth.qr-info', compact('surat'));

        $pengajuan = Pengajuan::find($id);
        // $pengajuan = Pengajuan::find($this->qrId);
        $karyawan = User::find($pengajuan->id_user);
        $admin = User::find($pengajuan->id_admin);
        $div_karyawan = Divisi::find($karyawan->id_divisi);
        $div_admin = Divisi::find($admin->id_divisi);
        $surat = Surat::find($pengajuan->id_surat);
        $pelatihan = Pelatihan::find($pengajuan->id_pelatihan);
        $kategori = Category::find($pelatihan->id_kategori);

        return view('livewire.auth.qr-info', compact('div_admin', 'div_karyawan', 'pengajuan', 'karyawan', 'admin', 'karyawan', 'surat', 'pelatihan', 'kategori'));
    }
}
