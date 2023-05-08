<?php

namespace App\Http\Livewire\Category;

use Illuminate\Http\Request;
use Livewire\Component;
use App\Models\Category;

class UpdateCategory extends Component
{
    public function update_category(Request $request)
    {
        // Validate the rules above.
        // $validatedData = $request->validate([
        //     'nama' => 'required|min:3',
        //     'email' => 'required|email:rfc,dns',
        //     'nik' => 'required|min:16',
        //     'divisi' => 'required',
        // ]);

        // Find specific user.
        $category = Category::find($request->input('id'));
        $nama_kategori = Category::where('id', $request->input('id'))->value('nama_kategori');

        // Update the user's data
        $category->nama_kategori = $request->input('nama_kategori');
        $category->deskripsi_kategori = $request->input('deskripsi_kategori');

        // Save the changes to the database
        $category->save();

        session()->flash('status', 'Kategori ' . $nama_kategori . ' berhasil diupdate!');
        return redirect()->route('category-management');
    }

    public function render(Request $request)
    {
        $category = Category::find($request->input('id'));
        return view('livewire.category.update-category', compact('category'));
    }
}
