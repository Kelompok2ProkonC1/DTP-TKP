<?php

namespace App\Http\Livewire\User;

use Illuminate\Http\Request;
use Livewire\Component;
use App\Models\User;
use App\Models\Divisi;

class UpdateUser extends Component
{
    public function update_user(Request $request)
    {
        // Validate the rules above.
        // $validatedData = $request->validate([
        //     'nama' => 'required|min:3',
        //     'email' => 'required|email:rfc,dns',
        //     'nik' => 'required|min:16',
        //     'divisi' => 'required',
        // ]);

        // Find specific user.
        $user = User::find($request->input('id'));

        // Update the user's data
        $user->name = $request->input('nama');
        $user->email = $request->input('email');
        $user->nik = $request->input('nik');
        $user->divisi = $request->input('divisi');

        // Save the changes to the database
        $user->save();

        session()->flash('status', 'User berhasil diupdate!');

        return redirect()->route('user-management');
    }

    public function render(Request $request)
    {
        $divisions = Divisi::all();
        $user = User::find($request->input('id'));
        return view('livewire.user.update-user', compact('user', 'divisions'));
    }
}
