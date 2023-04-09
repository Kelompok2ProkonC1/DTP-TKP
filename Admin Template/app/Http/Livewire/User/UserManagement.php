<?php

namespace App\Http\Livewire\User;

use Illuminate\Http\Request;
use Livewire\Component;
use App\Models\User;

class UserManagement extends Component
{
    // Delete specific user
    public function delete_user(Request $request)
    {
        // delete data with the specified ID
        User::where('id', $request->input('id'))->delete();

        // redirect back to the previous page
        return redirect()->route('user-management');
    }

    public function render()
    {
        $users = User::all();

        return view('livewire.user.user-management', compact('users'));
    }

    
}
?>