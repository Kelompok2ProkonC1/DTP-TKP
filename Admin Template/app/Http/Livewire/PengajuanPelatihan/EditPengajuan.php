<?php

namespace App\Http\Livewire\PengajuanPelatihan;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;
use Livewire\Component;
use App\Models\User;
use App\Models\Pengajuan;
use App\Models\Pelatihan;
use App\Models\Category;
use App\Models\Divisi;
use Error;

class EditPengajuan extends Component
{
    use WithFileUploads;

    public $flag = false;
    public $id_pengajuan = 0;
    public $id_pelatihan = 0;
    public $judul_pelatihan = '';
    public $id_kategori;
    public $deskripsi_pelatihan = '';
    public $tanggal_dimulai = '';
    public $tanggal_berakhir = '';
    public $biaya_pelatihan;
    public $tempat_pelatihan = '';
    public $bersetifikat = '';
    public $scope_pelatihan = '';
    public $gambar_pelatihan;
    public $gambar_pelatihan_before;

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
        'gambar_pelatihan' => 'nullable|mimes:jpeg,png,jpg,gif|max:2048',
    ];

    public function edit_pengajuan_pelatihan(Request $request)
    {
        // Validate the rules above.
        // $this->validate();
        
        if($request->file('gambar_pelatihan') != null)
        {
            Storage::delete('public/images/' . $this->gambar_pelatihan_before);

            // Generate unique file name
            $fileName = time() . '.' . $request->file('judul_pelatihan')->getClientOriginalExtension();
            
            // Move file
            $request->file('gambar_pelatihan')->move(public_path('images'), $fileName);
        }

        // Find specific row.
        $pelatihan = Pelatihan::find($this->id_pelatihan);
        $pengajuan = Pengajuan::find($this->id_pengajuan);

        // Set all data in row pelatihan's table
        $pelatihan->judul_pelatihan = $request->input('judul_pelatihan');
        $pelatihan->id_kategori = $request->input('id_kategori');
        $pelatihan->deskripsi_pelatihan = $request->input('deskripsi_pelatihan');
        $pelatihan->tanggal_dimulai = $request->input('tanggal_dimulai');
        $pelatihan->tanggal_berakhir = $request->input('tanggal_berakhir');
        $pelatihan->biaya_pelatihan = $request->input('biaya_pelatihan');
        $pelatihan->tempat_pelatihan = $request->input('tempat_pelatihan');
        $pelatihan->bersetifikat = $request->input('bersertifikat');
        $pelatihan->scope_pelatihan = $request->input('scope_pelatihan');
        if($request->file('gambar_pelatihan') != null)
        {
            $pelatihan->gambar_pelatihan = $fileName;
        }

        
        $pengajuan->tanggal_pengajuan = now();
        $pengajuan->status_pengajuan = "Belum";
        
        // Save the update data.
        $pelatihan->save();
        $pengajuan->save();

        session()->flash('status', 'Pelatihan berhasil direvisi dan diajukan kembali!');

        // Reset value input.
        return redirect()->route('history');
    }

    public function render(Request $request)
    {
        if($this->id_pengajuan == null)
        {
            $this->id_pengajuan = $request->input('id');
        }
        $pengajuan = Pengajuan::find($this->id_pengajuan);
        $user = User::find($pengajuan->id_user);
        $divisi = Divisi::find($user->id_divisi);
        $pelatihan = Pelatihan::find($pengajuan->id_pelatihan);
        $kategori = Category::all();

        if($this->flag == false)
        {
            $this->id_pelatihan = $pelatihan->id;
            $this->judul_pelatihan = $pelatihan->judul_pelatihan;
            $this->id_kategori = $pelatihan->id_kategori;
            $this->deskripsi_pelatihan = $pelatihan->deskripsi_pelatihan;
            $this->tanggal_berakhir = $pelatihan->tanggal_berakhir;
            $this->tanggal_dimulai = $pelatihan->tanggal_dimulai;
            $this->biaya_pelatihan = $pelatihan->biaya_pelatihan;
            $this->tempat_pelatihan = $pelatihan->tempat_pelatihan;
            $this->bersetifikat = $pelatihan->bersetifikat;
            $this->scope_pelatihan = $pelatihan->scope_pelatihan;
            $this->gambar_pelatihan_before = $pelatihan->gambar_pelatihan;
            $this->flag = true;
        }

        return view('livewire.pengajuan-pelatihan.edit-pengajuan', compact('divisi', 'user', 'pengajuan', 'pelatihan', 'kategori'));
    }  
}
