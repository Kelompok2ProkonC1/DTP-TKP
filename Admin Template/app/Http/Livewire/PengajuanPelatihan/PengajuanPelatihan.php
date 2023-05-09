<?php

namespace App\Http\Livewire\PengajuanPelatihan;

use Illuminate\Http\Request;
use Livewire\Component;
use App\Models\User;
use App\Models\Pengajuan;
use App\Models\Pelatihan;
use App\Models\Category;
use App\Models\Divisi;

class PengajuanPelatihan extends Component
{
    public $judul_pelatihan = '';
    public $id_kategori = 0;
    public $deskripsi_pelatihan = '';
    public $tanggal_dimulai = '';
    public $tanggal_berakhir = '';
    public $biaya_pelatihan;
    public $tempat_pelatihan = '';
    public $bersetifikat = '';
    public $scope_pelatihan = '';


    protected $rules = [
        'judul_pelatihan' => 'required',
        'id_kategori' => 'required',
        'deskripsi_pelatihan' => 'required',
        'tanggal_dimulai' => 'required',
        'tanggal_berakhir' => 'required',
        'biaya_pelatihan' => 'required',
        'tempat_pelatihan' => 'required',
        'bersetifikat' => 'required',
        'scope_pelatihan' => 'required',
    ];

    public function add_pengajuan_pelatihan()
    {
        // Validate the rules above.
        $this->validate();
        // Save into the database.
        Pelatihan::create([
            'judul_pelatihan' => $this->judul_pelatihan,
            'id_kategori' => $this->id_kategori,
            'deskripsi_pelatihan' => $this->deskripsi_pelatihan,
            'tanggal_dimulai' => $this->tanggal_dimulai,
            'tanggal_berakhir' => $this->tanggal_berakhir,
            'biaya_pelatihan' => $this->biaya_pelatihan,
            'tempat_pelatihan' => $this->tempat_pelatihan,
            'bersetifikat' => $this->bersetifikat,
            'scope_pelatihan' => $this->scope_pelatihan,
            'gambar_pelatihan' => "X",
        ]);

        $pelatihan = Pelatihan::latest()->first();

        Pengajuan::create([
            'tanggal_pengajuan' => now(),
            'id_pelatihan' => $pelatihan->id,
            'id_user' => auth()->user()->id,
            'status_pengajuan' => "Belum",
            'dokumen_pengajuan' => "X",
        ]);

        session()->flash('status', 'Pelatihan berhasil diajukan!');

        // Reset value input.
        $this->reset();
    }

    public function render(Request $request)
    {
        $pengajuan = Pengajuan::find(3);
        $user = User::find(auth()->user()->id);
        $divisi = Divisi::find($user->id_divisi);
        $pelatihan = Pelatihan::find($pengajuan->id_pelatihan);
        $kategori = Category::all();

        return view('livewire.pengajuan-pelatihan.pengajuan-pelatihan', compact('divisi', 'user', 'pengajuan', 'pelatihan', 'kategori'));
    }
}
