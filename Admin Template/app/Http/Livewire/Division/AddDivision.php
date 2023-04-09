<?php

namespace App\Http\Livewire\Division;

use App\Models\Divisi;
use Livewire\Component;

class AddDivision extends Component
{
    public $nama_divisi = '';
    public $deskripsi_divisi = '';

    protected $rules = [
        'nama_divisi' => 'required|min:3',
        'deskripsi_divisi' => 'required|min:3|max:256',
    ];

    public function add_division()
    {
        // Validate the rules above.
        $this->validate();
        // Save into the database.
        Divisi::create([
            'nama_divisi' => $this->nama_divisi,
            'deskripsi_divisi' => $this->deskripsi_divisi,
        ]);

        session()->flash('status', 'Divisi berhasil ditambahkan!');

        // Reset value input.
        $this->reset();

        // Return the same view.
        return view('livewire.division.add-division');
    }

    public function render()
    {
        return view('livewire.division.add-division');
    }
}
