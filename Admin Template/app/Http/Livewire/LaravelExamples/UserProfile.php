<?php

namespace App\Http\Livewire\LaravelExamples;

use App\Models\User;

use Livewire\Component;

class UserProfile extends Component
{
    public User $user;

    protected $rules = [
        'user.name' => 'max:40|min:3',
        'user.email' => 'email:rfc,dns',
        'user.phone' => 'max:13|min:11',
        'user.about' => 'max:200',
        'user.location' => 'min:3'
    ];

    public function mount()
    {
        $this->user = auth()->user();
    }

    public function save()
    {
        $this->validate();

        if (env('IS_DEMO') && auth()->user()->id == 1) {
            if (auth()->user()->email == $this->user->email) {
                $this->user->save();
                return back()->with('status', "Profile Anda berhasil disimpan!");
            }
        }

        $this->user->save();

        return back()->with('status', "Profile Anda berhasil disimpan!");
    }
    public function render()
    {
        return view('livewire.laravel-examples.user-profile');
    }
}
