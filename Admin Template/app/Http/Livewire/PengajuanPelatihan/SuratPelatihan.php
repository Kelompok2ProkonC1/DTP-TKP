<?php

namespace App\Http\Livewire\PengajuanPelatihan;

use Illuminate\Http\Request;
use Livewire\Component;
use App\Models\User;
use App\Models\Pengajuan;
use App\Models\Pelatihan;
use App\Models\Category;
use App\Models\Surat;
use App\Models\Divisi;
use PDF;

class SuratPelatihan extends Component
{
   
     public function render(Request $request)
    {
       
       
        $pengajuan = Pengajuan::find($request->input('id'));
        $karyawan = User::find($pengajuan->id_user);
        $admin = User::find($pengajuan->id_admin);
        $div_karyawan = Divisi::find($karyawan->id_divisi);
        $div_admin = Divisi::find($admin->id_divisi);
        $surat = Surat::find($pengajuan->id_surat);
        $pelatihan = Pelatihan::find($pengajuan->id_pelatihan);
        $kategori = Category::find($pelatihan->id_kategori);
    
        return view('livewire.pengajuan-pelatihan.surat-pelatihan', compact('div_admin','div_karyawan','pengajuan','karyawan','admin', 'karyawan','surat', 'pelatihan', 'kategori'));
       
    }

     public function downloadPDF(Request $request)
    {
        $path = public_path(). '/logo_divisi.png';
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $image = 'data:image/'.$type.';base64,'.base64_encode($data);

        
        $pengajuan = Pengajuan::find($request->input('id'));
        $karyawan = User::find($pengajuan->id_user);
        $admin = User::find($pengajuan->id_admin);
        $div_karyawan = Divisi::find($karyawan->id_divisi);
        $div_admin = Divisi::find($admin->id_divisi);
        $surat = Surat::find($pengajuan->id_surat);
        $pelatihan = Pelatihan::find($pengajuan->id_pelatihan);
        $kategori = Category::find($pelatihan->id_kategori);
    
        $pdf = PDF::loadView('livewire.pengajuan-pelatihan.download-pdf', compact('image', 'div_admin', 'div_karyawan','pengajuan','karyawan','admin', 'karyawan','surat', 'pelatihan', 'kategori'))
                    ->setPaper('a4');
     
        return $pdf->download('Surat Persetujuan Pelatihan.pdf');
    }

}

?>