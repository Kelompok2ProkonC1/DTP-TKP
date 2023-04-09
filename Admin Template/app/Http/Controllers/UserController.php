<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Divisi;
use App\Http\Livewire\LaravelExamples\UserManagement;

class UserController extends Controller
{
    // Delete specific user
    public function deleteUser($id)
    {
        // delete data with the specified ID
        User::where('id', $id)->delete();

        // redirect back to the previous page
        return redirect()->route('user-management');
    }

    // Get the specific user to update
    public function showUpdateUser($id)
    {
        $user = User::find($id);
        $divisions = Divisi::all();
        return view('livewire.laravel-examples.update-user', ['user' => $user, 'divisions' => $divisions]);
    }

    // Update data of specific user
    public function updateUser(Request $request)
    {
        // Validate the input data
        $validatedData = $request->validate([
            'nama' => 'required|min:3',
            'email' => 'required|email:rfc,dns',
            'nik' => 'required|min:16',
            'divisi' => 'required',
        ]);

        // Find the user with the given ID
        $user = User::findOrFail($request->input('id'));

        // Update the user's data
        $user->name = $validatedData['nama'];
        $user->email = $validatedData['email'];
        $user->nik = $validatedData['nik'];
        $user->divisi = $validatedData['divisi'];

        // Save the changes to the database
        $user->save();

        $users = User::all();
        
        // Redirect the user to the user's details page
        // return view('livewire.laravel-examples.user-management', compact('users'));
        // return view('livewire.laravel-examples.user-management');
    }
}
