<?php

namespace App\Livewire\Notes;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Note;
use Illuminate\Support\Facades\Auth;

class NoteList extends Component
{
    use WithPagination;

    public string $search = '';
    public ?int $deleteId = null;

    protected $queryString = ['search'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function confirmDelete(int $id)
    {
        $this->deleteId = $id;
    }

    public function cancelDelete()
    {
        $this->deleteId = null;
    }

    public function delete()
    {
        $note = Note::where('id', $this->deleteId)
                    ->where('user_id', Auth::id())
                    ->firstOrFail();

        $note->delete();

        $this->deleteId = null;
        session()->flash('success', 'Note deleted successfully.');
    }

    public function render()
    {
        $notes = Note::where('user_id', Auth::id())
            ->where(function ($query) {
                $query->where('title', 'like', '%' . $this->search . '%')
                      ->orWhere('body', 'like', '%' . $this->search . '%');
            })
            ->latest()
            ->paginate(6);

        return view('livewire.notes.note-list', compact('notes'))
            ->layout('layouts.app', ['title' => 'My Notes']);
    }
}