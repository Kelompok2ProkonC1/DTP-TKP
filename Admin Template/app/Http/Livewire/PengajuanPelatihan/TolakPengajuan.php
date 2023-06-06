<?php

namespace App\Http\Livewire\PengajuanPelatihan;

use Illuminate\Http\Request;
use App\Models\Pengajuan;
use Livewire\Component;

class TolakPengajuan extends Component
{
    public $id_pengajuan = 0;
    public $deskripsi_revisi = '';

    protected $rules = [
        'nama_kategori' => 'required|min:3',
        'deskripsi_kategori' => 'required|min:3|max:256',
    ];

    public function tolak_pengajuan()
    {
        $pengajuan = Pengajuan::find($this->id_pengajuan);
        $pengajuan->status_pengajuan = 'Ditolak';
        $pengajuan->tanggal_verifikasi = now();
        $pengajuan->deskripsi_revisi = $this->deskripsi_revisi;
        $pengajuan->save();

        session()->flash('status', 'Pengajuan pelatihan berhasil ditolak!');

        // redirect back to the previous page
        return redirect()->route('verifikasi');
    }

    public function render(Request $request)
    {
        if($this->id_pengajuan == null)
        {

            $this->id_pengajuan = $request->input('id');
        }

        return view('livewire.pengajuan-pelatihan.tolak-pengajuan');
    }
}
