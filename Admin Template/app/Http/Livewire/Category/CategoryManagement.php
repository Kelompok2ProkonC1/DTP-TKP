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
        Category::where('id_kategori', $request->input('id'))->delete();

        // redirect to page category management
        return redirect()->route('category-management');
    }

    // Render page
    public function render()
    {
        // Get all categories
        $categories = Category::all();

        return view('livewire.category.category-management', compact('categories'));
    }
}
?>
