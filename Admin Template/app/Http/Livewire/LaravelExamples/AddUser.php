<?php

namespace App\Http\Livewire\LaravelExamples;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AddUser extends Component
{
    public $nama = '';
    public $email = '';
    public $nik = '';
    public $divisi = '';
    public $password;

    protected $rules = [
        'nama' => 'required|min:3',
        'email' => 'required|email:rfc,dns|unique:users',
        'nik' => 'required|min:16',
        'divisi' => 'required'
    ];

    public function add_user()
    {
        // Validate the rules above.
        $this->validate();
        // Generate password automatically.
        $this->password = Str::random(6);
        // Save into the database.
        $user = User::create([
            'name' => $this->nama,
            'email' => $this->email,
            'nik' => $this->nik,
            'divisi' => $this->divisi,
            'password' => Hash::make($this->password),
            'about' => $this->password
        ]);
        auth()->login($user);

        // if (env('IS_DEMO') && auth()->user()->id == 1) {
        //     $this->user->save();
        //     return back()->with('status', "User berhasil ditambahkan!");
        // }
        session()->flash('status', 'User berhasil ditambahkan!');
        
        // Reset value input.
        $this->reset();

        // Return the same view.
        return view('livewire.laravel-examples.add-user');
    }

    public function render()
    {
        return view('livewire.laravel-examples.add-user');
    }
}
