<?php

namespace App\Http\Livewire\Division;

use Illuminate\Http\Request;
use Livewire\Component;
use App\Models\Divisi;

class UpdateDivision extends Component
{
    public function update_division(Request $request)
    {
        // Validate the rules above.
        // $validatedData = $request->validate([
        //     'nama' => 'required|min:3',
        //     'email' => 'required|email:rfc,dns',
        //     'nik' => 'required|min:16',
        //     'divisi' => 'required',
        // ]);

        // Find specific user.
        $division = Divisi::find($request->input('id'));
        $nama_divisi = Divisi::where('id', $request->input('id'))->value('nama_divisi');

        // Update the user's data
        $division->nama_divisi = $request->input('nama_divisi');
        $division->deskripsi_divisi = $request->input('deskripsi_divisi');

        // Save the changes to the database
        $division->save();

        session()->flash('status', 'Divisi ' . $nama_divisi . ' berhasil diupdate!');
        return redirect()->route('division-management');
    }

    public function render(Request $request)
    {
        $division = Divisi::find($request->input('id'));
        return view('livewire.division.update-division', compact('division'));
    }
}
