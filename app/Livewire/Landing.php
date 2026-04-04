<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Landing extends Component
{
    public function getStarted()
    {
        if (Auth::check()) {
            return redirect()->route('notes');
        }
        return redirect()->route('guest.notes');
    }

    public function render()
    {
        return view('livewire.landing')
            ->layout('layouts.app', ['title' => 'Notely - Your Personal Notes']);
    }
}