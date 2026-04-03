<div class="min-h-screen bg-gray-50">

    {{-- Add this guest banner at the top of your notes list view --}}
    @if(session()->has('guest_mode'))
        <div class="mb-4 bg-yellow-50 border-l-4 border-yellow-400 p-4">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm text-yellow-700">
                        You're in guest mode. <a href="{{ route('register') }}" class="font-medium underline text-yellow-800">Sign up</a> to save your notes permanently!
                    </p>
                </div>
            </div>
        </div>
    @endif
    {{-- Your existing notes list code continues here --}}

    {{-- Header --}}
    <nav class="bg-white border-b border-gray-200 px-s6 py-4 flex items-center justify-between">
        <h1 class="text-xl font-semibold text-gray-800">My Notes</h1>
        <div class="flex items-center gap-3">
            <span class="text-sm text-gray-500">{{ Auth::user()->name }}</span>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-sm text-red-500 hover:underline">Logout</button>
            </form>
        </div>
    </nav>

    <div class="max-w-5xl mx-auto px-6 py-8">

        {{-- Flash message --}}
        @if (session()->has('success'))
            <div class="mb-6 px-4 py-3 bg-green-50 border border-green-200 text-green-700 text-sm rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        {{-- Search + New Note --}}
        <div class="flex items-center gap-3 mb-6">
            <input
                type="text"
                wire:model.live="search"
                placeholder="Search notes..."
                class="flex-1 px-4 py-2.5 rounded-lg border border-gray-300 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-400"
            />
            
            <a href="{{ route('notes.create') }}"
                class="bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium px-4 py-2.5 rounded-lg transition-colors whitespace-nowrap"
            >
            + New Note
            </a>
        </div>

        {{-- Notes Grid --}}
        @if ($notes->isEmpty())
            <div class="text-center py-20">
                <p class="text-gray-400 text-sm">No notes found.</p>
                <a href="{{ route('notes.create') }}" class="text-indigo-600 text-sm hover:underline mt-2 inline-block">Create your first note</a>
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach ($notes as $note)
                    <div class="bg-white rounded-xl border border-gray-200 p-5 flex flex-col justify-between hover:shadow-sm transition-shadow">
                        <div>
                            <h2 class="font-medium text-gray-800 mb-2 truncate">{{ $note->title }}</h2>
                            <p class="text-sm text-gray-500 line-clamp-3">{{ $note->body }}</p>
                        </div>
                        <div class="flex items-center justify-between mt-4 pt-3 border-t border-gray-100">
                            <span class="text-xs text-gray-400">{{ $note->created_at->diffForHumans() }}</span>
                            <div class="flex gap-3">
                                <a href="{{ route('notes.edit', $note->id) }}" class="text-xs text-indigo-600 hover:underline">Edit</a>
                                <button wire:click="confirmDelete({{ $note->id }})" class="text-xs text-red-500 hover:underline">Delete</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Pagination --}}
            <div class="mt-6">
                {{ $notes->links() }}
            </div>
        @endif

    </div>

    {{-- Delete confirmation modal --}}
    @if ($deleteId)
        <div class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50">
            <div class="bg-white rounded-2xl p-6 w-full max-w-sm shadow-lg">
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Delete note?</h3>
                <p class="text-sm text-gray-500 mb-6">This action cannot be undone.</p>
                <div class="flex gap-3">
                    <button wire:click="cancelDelete" class="flex-1 px-4 py-2 rounded-lg border border-gray-300 text-sm text-gray-700 hover:bg-gray-50">Cancel</button>
                    <button wire:click="delete" class="flex-1 px-4 py-2 rounded-lg bg-red-500 hover:bg-red-600 text-white text-sm font-medium">Delete</button>
                </div>
            </div>
        </div>
    @endif

</div>