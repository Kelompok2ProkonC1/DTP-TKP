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
        $nama_divisi = Divisi::where('id', $request->input('id'))->value('nama_divisi');
        Divisi::where('id', $request->input('id'))->delete();

        // redirect to page division management
        session()->flash('status', 'Divisi ' . $nama_divisi . ' berhasil dihapus!');
        return redirect()->route('division-management');
    }

    // Render page
    public function render(Request $request)
    {
        // Get all categories
        $divisions = Divisi::all();
        if($request->has('range'))
        {
            $range = $request->input('range');
        }
        else
        {
            $range = 1;
        }

        return view('livewire.division.division-management', compact('divisions', 'range'));
    }
}
?>
