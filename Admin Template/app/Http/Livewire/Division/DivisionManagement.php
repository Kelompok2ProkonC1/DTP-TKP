<?php

namespace App\Http\Livewire\Division;

use Illuminate\Http\Request;
use Livewire\Component;
use App\Models\Divisi;

class DivisionManagement extends Component
{
    // Delete specific division
    public function delete_division(Request $request)
    {
        // delete data with the specified ID Division
        Divisi::where('id_divisi', $request->input('id'))->delete();

        // redirect to page division management
        return redirect()->route('division-management');
    }

    // Render page
    public function render()
    {
        // Get all categories
        $divisions = Divisi::all();

        return view('livewire.division.division-management', compact('divisions'));
    }
}
?>
