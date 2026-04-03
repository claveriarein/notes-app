<?php

namespace App\Livewire\Notes;

use Livewire\Component;
use App\Models\Note;
use Illuminate\Support\Facades\Auth;

class NoteCreate extends Component
{
    public string $title = '';
    public string $body = '';

    protected array $rules = [
        'title' => 'required|min:2|max:100',
        'body'  => 'required|min:5',
    ];

    public function save()
    {
        // ADD THIS - Block guests from creating notes
        if (session()->has('guest_mode')) {
            session()->flash('error', 'Please create an account to save notes!');
            return redirect()->route('register');
        }

        $this->validate();

        Note::create([
            'title'   => $this->title,
            'body'    => $this->body,
            'user_id' => Auth::id(),
        ]);

        session()->flash('success', 'Note created successfully.');
        return redirect()->route('notes');
    }

    public function render()
    {
        return view('livewire.notes.note-create')
            ->layout('layouts.app', ['title' => 'New Note']);
    }
}