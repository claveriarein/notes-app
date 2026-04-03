<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Register extends Component
{
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    protected array $rules = [
        'name'                  => 'required|min:2|max:50',
        'email'                 => 'required|email|unique:users,email',
        'password'              => 'required|min:6|confirmed',
        'password_confirmation' => 'required',
    ];

    public function register()
    {
        $this->validate();

        User::create([
            'name'     => $this->name,
            'email'    => $this->email,
            'password' => Hash::make($this->password),
        ]);

        session()->flash('success', 'Account created successfully! Please sign in.');
        return redirect()->route('login');
    }

    public function render()
    {
        return view('livewire.auth.register')
            ->layout('layouts.app', ['title' => 'Register']);
    }
}