<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Notes\NoteList;
use App\Livewire\Notes\NoteCreate;
use App\Livewire\Notes\NoteEdit;

Route::middleware('guest')->group(function () {
    Route::get('/login', Login::class)->name('login');
    Route::get('/register', Register::class)->name('register');
});

Route::middleware('auth')->group(function () {
    Route::get('/notes', NoteList::class)->name('notes');
    Route::get('/notes/create', NoteCreate::class)->name('notes.create');
    Route::get('/notes/{note}/edit', NoteEdit::class)->name('notes.edit');
});

Route::post('/logout', function () {
    Auth::logout();
    session()->invalidate();
    session()->regenerateToken();
    return redirect('/login');
})->name('logout');

Route::get('/', function () {
    return redirect('/login');
});


