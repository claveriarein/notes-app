<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

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

    /**
     * Skip registration and go directly to notes as guest
     */
    public function skip()
    {
        // Create a temporary guest session
        session()->put('guest_mode', true);
        session()->put('guest_id', Str::random(32));
        
        return redirect()->route('notes.index');
    }

    public function render()
    {
        return view('livewire.auth.register')
            ->layout('layouts.app', ['title' => 'Register']);
    }
}