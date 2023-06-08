<?php

namespace App\Http\Livewire\PengajuanPelatihan;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads;
use Livewire\Component;
use App\Models\User;
use App\Models\Pengajuan;
use App\Models\Pelatihan;
use App\Models\Category;
use App\Models\Divisi;

class PengajuanPelatihan extends Component
{
    use WithFileUploads;

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
        'gambar_pelatihan' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ];

    public function add_pengajuan_pelatihan(Request $request)
    {
        // Validate the rules above.
        // $this->validate();

        // Generate unique file name
        $fileName = time() . '.' . $request->file('gambar_pelatihan')->getClientOriginalExtension();

        // Move file
        $request->file('gambar_pelatihan')->move(public_path('images'), $fileName);
        // $request->file('gambar_pelatihan')->storeAs('public/images', $fileName);

        // Save into the database.
        Pelatihan::create([
            'judul_pelatihan' => $request->input('judul_pelatihan'),
            'id_kategori' => $request->input('id_kategori'),
            'deskripsi_pelatihan' => $request->input('deskripsi_pelatihan'),
            'tanggal_dimulai' => $request->input('tanggal_dimulai'),
            'tanggal_berakhir' => $request->input('tanggal_berakhir'),
            'biaya_pelatihan' => $request->input('biaya_pelatihan'),
            'tempat_pelatihan' => $request->input('tempat_pelatihan'),
            'bersetifikat' => $request->input('bersetifikat'),
            'scope_pelatihan' => $request->input('scope_pelatihan'),
            'gambar_pelatihan' => $fileName,
        ]);

        $pelatihan = Pelatihan::latest()->first();

        Pengajuan::create([
            'tanggal_pengajuan' => now(),
            'id_pelatihan' => $pelatihan->id,
            'id_user' => auth()->user()->id,
            'status_pengajuan' => "Belum",
        ]);

        session()->flash('status', 'Pelatihan berhasil diajukan!');

        return redirect()->route('history');
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
