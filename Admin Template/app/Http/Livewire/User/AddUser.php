<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use App\Models\Divisi;
use App\Mail\ContactFormMail;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class AddUser extends Component
{
    public $nama = '';
    public $email = '';
    public $nik = '';
    public $divisi = '';
    public $password;
    public $role = '';

    protected $rules = [
        'nama' => 'required|min:3',
        'email' => 'required|email:rfc,dns|unique:users',
        'nik' => 'required|min:16',
        'divisi' => 'required',
        'role' => 'required',
    ];

    public function add_user()
    {
        // Validate the rules above.
        $this->validate();
        // Generate password automatically.
        $this->password = Str::random(6);
        // Save into the database.
        User::create([
            'nama_user' => $this->nama,
            'email' => $this->email,
            'nik_user' => $this->nik,
            'id_divisi' => $this->divisi,
            'password' => Hash::make($this->password),
            'role_user' => $this->role
        ]);

        // User account for sending into email user.
        $akun_user = [
            'email' => $this->email,
            'password' => $this->password
        ];

        // send email
        Mail::to($this->email)->send(new ContactFormMail($akun_user));

        // if (env('IS_DEMO') && auth()->user()->id == 1) {
        //     $this->user->save();
        //     return back()->with('status', "User berhasil ditambahkan!");
        // }

        session()->flash('status', 'User berhasil ditambahkan!');

        // Reset value input.
        $this->reset();
    }

    public function render()
    {
        if(auth()->user()->role_user == 'Admin')
        {
            $this->role = 'Karyawan';
        }

        $divisions = Divisi::all();
        return view('livewire.user.add-user', compact('divisions'));
    }
}
