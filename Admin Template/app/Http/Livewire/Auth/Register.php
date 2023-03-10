<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class Register extends Component
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

    public function register()
    {
        $this->validate();
        $this->password = Str::random(6);
        $user = User::create([
            'name' => $this->nama,
            'email' => $this->email,
            'nik' => $this->nik,
            'divisi' => $this->divisi,
            'password' => Hash::make($this->password),
            'about' => $this->password
        ]);

        auth()->login($user);

        return redirect('/dashboard');
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}

// class Register extends Component
// {
//     public $name = '';
//     public $email = '';
//     public $password = '';

//     protected $rules = [
//         'name' => 'required|min:3',
//         'email' => 'required|email:rfc,dns|unique:users',
//         'password' => 'required|min:6'
//     ];

//     public function register()
//     {
//         $this->validate();
//         $user = User::create([
//             'name' => $this->name,
//             'email' => $this->email,
//             'password' => Hash::make($this->password)
//         ]);

//         auth()->login($user);

//         return redirect('/dashboard');
//     }

//     public function render()
//     {
//         return view('livewire.auth.register');
//     }
// }
