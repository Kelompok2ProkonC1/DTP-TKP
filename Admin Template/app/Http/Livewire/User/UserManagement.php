<?php

namespace App\Http\Livewire\User;

use Illuminate\Http\Request;
use Livewire\Component;
use App\Models\User;
use App\Models\Divisi;

class UserManagement extends Component
{
    // Delete specific user
    public function delete_user(Request $request)
    {
        // delete data with the specified ID
        $nama_user = User::where('id', $request->input('id'))->value('nama_user');
        User::where('id', $request->input('id'))->delete();

        session()->flash('status', 'User ' . $nama_user . ' berhasil dihapus!');

        // redirect back to the previous page
        return redirect()->route('user-management');
    }

    public function render(Request $request)
    {
        $users = User::all();
        $divisi = Divisi::all();

        if($request->has('range'))
        {
            $range = $request->input('range');
        }
        else
        {
            $range = 1;
        }

        return view('livewire.user.user-management', compact('users', 'divisi', 'range'));
    }

    
}
?>