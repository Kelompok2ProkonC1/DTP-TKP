<?php

namespace App\Http\Livewire\Category;

use Illuminate\Http\Request;
use Livewire\Component;
use App\Models\Category;

class CategoryManagement extends Component
{
    // Delete specific user
    public function delete_category(Request $request)
    {
        // delete data with the specified ID
        $nama_kategori = Category::where('id', $request->input('id'))->value('nama_kategori');
        Category::where('id', $request->input('id'))->delete();

        session()->flash('status', 'Kategori ' . $nama_kategori . ' berhasil dihapus!');

        // redirect to page category management
        return redirect()->route('category-management');
    }

    // Render page
    public function render(Request $request)
    {
        // Get all categories
        $categories = Category::all();

        if($request->has('range'))
        {
            $range = $request->input('range');
        }
        else
        {
            $range = 1;
        }

        return view('livewire.category.category-management', compact('categories', 'range'));
    }
}
?>
