<?php

namespace App\Http\Livewire\LaravelExamples;

use App\Models\User;
use App\Models\Divisi;
use Illuminate\Http\Request;
use Livewire\Component;

class UserProfile extends Component
{

    public function update_profile(Request $request)
    {
        $user = User::find(auth()->user()->id);
        if (auth()->user()->email == $user->email) {
                // Update the user's data
                $user->nama_user = $request->input('nama_user');
                $user->email = $request->input('email');
                $user->nik_user = $request->input('nik_user');
                $user->id_divisi = $request->input('id_divisi');

                $user->save();
                return back()->with('status', "Profile Anda berhasil disimpan!");
            }

        return back()->with('status', "Profile Anda berhasil disimpan!");
    }
    public function render()
    {
        $divisi = Divisi::all();
        
        return view('livewire.laravel-examples.user-profile', compact('divisi'));
    }
}
