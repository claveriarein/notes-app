<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Landing;
use App\Livewire\Notes\NoteList;
use App\Livewire\Notes\NoteCreate;
use App\Livewire\Notes\NoteEdit;

// Serve Livewire JS directly
Route::get('/livewire/livewire.min.js', function () {
    $file = base_path('vendor/livewire/livewire/dist/livewire.min.js');
    if (!file_exists($file)) {
        $file = base_path('vendor/livewire/livewire/dist/livewire.js');
    }
    return response()->file($file, [
        'Content-Type' => 'application/javascript',
        'Cache-Control' => 'public, max-age=31536000',
    ]);
})->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);

Route::get('/', Landing::class)->name('landing');

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
    return redirect('/');
})->name('logout');