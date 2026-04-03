<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Notes\NoteList;
use App\Livewire\Notes\NoteCreate;
use App\Livewire\Notes\NoteEdit;

// Livewire assets
Route::get('/livewire/livewire.js', function () {
    $path = base_path('vendor/livewire/livewire/dist/livewire.js');
    return response()->file($path, ['Content-Type' => 'application/javascript']);
});

Route::get('/livewire/livewire.min.js', function () {
    $path = base_path('vendor/livewire/livewire/dist/livewire.min.js');
    return response()->file($path, ['Content-Type' => 'application/javascript']);
});

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
    if (Auth::check()) {
        return redirect('/notes');
    }
    return redirect('/login');
});


