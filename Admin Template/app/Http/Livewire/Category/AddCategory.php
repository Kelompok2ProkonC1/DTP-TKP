<?php

namespace App\Http\Livewire\Category;

use App\Models\Category;
use Livewire\Component;

class AddCategory extends Component
{
    public $nama_kategori = '';
    public $deskripsi_kategori = '';

    protected $rules = [
        'nama_kategori' => 'required|min:3',
        'deskripsi_kategori' => 'required|min:3|max:256',
    ];

    public function add_category()
    {
        // Validate the rules above.
        $this->validate();
        // Save into the database.
        Category::create([
            'nama_kategori' => $this->nama_kategori,
            'deskripsi_kategori' => $this->deskripsi_kategori,
        ]);

        session()->flash('status', 'Kategori berhasil ditambahkan!');

        // Reset value input.
        $this->reset();

        // Return the same view.
        return view('livewire.category.add-category');
    }

    public function render()
    {
        return view('livewire.category.add-category');
    }
}
