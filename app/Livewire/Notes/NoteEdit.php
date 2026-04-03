<?php

namespace App\Livewire\Notes;

use Livewire\Component;
use App\Models\Note;
use Illuminate\Support\Facades\Auth;

class NoteEdit extends Component
{
    public Note $note;
    public string $title = '';
    public string $body = '';

    protected array $rules = [
        'title' => 'required|min:2|max:100',
        'body'  => 'required|min:5',
    ];

    public function mount(Note $note)
    {
        if ($note->user_id !== Auth::id()) {
            abort(403);
        }

        $this->note  = $note;
        $this->title = $note->title;
        $this->body  = $note->body;
    }

    public function save()
    {
        $this->validate();

        $this->note->update([
            'title' => $this->title,
            'body'  => $this->body,
        ]);

        session()->flash('success', 'Note updated successfully.');
        return redirect()->route('notes');
    }

    public function render()
    {
        return view('livewire.notes.note-edit')
            ->layout('layouts.app', ['title' => 'Edit Note']);
    }
}