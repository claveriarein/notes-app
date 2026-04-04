<?php

namespace App\Livewire\Notes;

use Livewire\Component;

class GuestNotes extends Component
{
    public string $title = '';
    public string $body = '';
    public array $notes = [];
    public ?int $editingIndex = null;
    public bool $showForm = false;
    public ?int $deleteIndex = null;

    public function addNote()
    {
        $this->validate([
            'title' => 'required|min:2|max:100',
            'body'  => 'required|min:2',
        ]);

        if ($this->editingIndex !== null) {
            $this->notes[$this->editingIndex] = [
                'title'   => $this->title,
                'body'    => $this->body,
                'created' => $this->notes[$this->editingIndex]['created'],
            ];
            $this->editingIndex = null;
        } else {
            $this->notes[] = [
                'title'   => $this->title,
                'body'    => $this->body,
                'created' => now()->diffForHumans(),
            ];
        }

        $this->title = '';
        $this->body = '';
        $this->showForm = false;
    }

    public function editNote(int $index)
    {
        $this->editingIndex = $index;
        $this->title = $this->notes[$index]['title'];
        $this->body  = $this->notes[$index]['body'];
        $this->showForm = true;
    }

    public function confirmDelete(int $index)
    {
        $this->deleteIndex = $index;
    }

    public function cancelDelete()
    {
        $this->deleteIndex = null;
    }

    public function deleteNote()
    {
        array_splice($this->notes, $this->deleteIndex, 1);
        $this->deleteIndex = null;
    }

    public function cancelForm()
    {
        $this->title = '';
        $this->body  = '';
        $this->editingIndex = null;
        $this->showForm = false;
    }

    public function render()
    {
        return view('livewire.notes.guest-notes')
            ->layout('layouts.app', ['title' => 'Try Notely — Guest Mode']);
    }
}