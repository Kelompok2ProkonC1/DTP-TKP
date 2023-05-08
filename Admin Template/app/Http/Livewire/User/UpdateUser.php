<?php

namespace App\Http\Livewire\User;

use Illuminate\Http\Request;
use Livewire\Component;
use App\Models\Divisi;
use App\Models\User;

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
        $nama_user = User::where('id', $request->input('id'))->value('nama_user');

        // Update the user's data
        $user->nama_user = $request->input('nama');
        $user->email = $request->input('email');
        $user->nik_user = $request->input('nik');
        $user->id_divisi = $request->input('divisi');
        $user->role_user = $request->input('role');

        // Save the changes to the database
        $user->save();

        session()->flash('status', 'User ' . $nama_user . ' berhasil diupdate!');

        return redirect()->route('user-management');
    }

    public function render(Request $request)
    {
        $divisions = Divisi::all();
        $user = User::find($request->input('id'));
        return view('livewire.user.update-user', compact('user', 'divisions'));
    }
}
