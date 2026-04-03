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

    // ADD THIS MOUNT METHOD
    public function mount()
    {
        // If in guest mode, show limited functionality
        if (session()->has('guest_mode')) {
            session()->flash('info', 'You are in guest mode. Create an account to save your notes permanently!');
        }
    }

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
        // Prevent guests from deleting
        if (session()->has('guest_mode')) {
            session()->flash('error', 'Please create an account to delete notes!');
            return redirect()->route('register');
        }

        $note = Note::where('id', $this->deleteId)
                    ->where('user_id', Auth::id())
                    ->firstOrFail();

        $note->delete();

        $this->deleteId = null;
        session()->flash('success', 'Note deleted successfully.');
    }

    public function render()
    {
        // Handle guest mode - show empty state or demo notes
        if (session()->has('guest_mode')) {
            $notes = collect(); // Empty collection for guests
        } else {
            $notes = Note::where('user_id', Auth::id())
                ->where(function ($query) {
                    $query->where('title', 'like', '%' . $this->search . '%')
                          ->orWhere('body', 'like', '%' . $this->search . '%');
                })
                ->latest()
                ->paginate(6);
        }

        return view('livewire.notes.note-list', compact('notes'))
            ->layout('layouts.app', ['title' => 'My Notes']);
    }
}