<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class Login extends Component
{
    public string $email = '';
    public string $password = '';
    public bool $remember = false;

    protected array $rules = [
        'email'    => 'required|email',
        'password' => 'required|min:6',
    ];

    public function login()
    {
        $this->validate();

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            // Clear guest session if they had one
            session()->forget(['guest_mode', 'guest_id']);
            session()->regenerate();
            return redirect()->intended('/notes');
        }

        $this->addError('email', 'These credentials do not match our records.');
    }

    /**
     * Skip login and go directly to notes as guest
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
        return view('livewire.auth.login')
            ->layout('layouts.app', ['title' => 'Login']);
    }
}