<div class="min-h-screen bg-gray-50">

    {{-- Navbar --}}
    <nav class="bg-white border-b border-gray-100 sticky top-0 z-50">
        <div class="max-w-5xl mx-auto px-6 py-4 flex items-center justify-between">

            {{-- Logo --}}
            <div class="flex items-center gap-2">
                <div class="w-8 h-8 bg-indigo-600 rounded-xl flex items-center justify-center">
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                </div>
                <span class="font-bold text-gray-800 text-lg">Notely</span>
            </div>

            {{-- Right side --}}
            <div class="flex items-center gap-4">
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 bg-gray-100 rounded-full flex items-center justify-center">
                        <svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                    </div>
                    <span class="text-sm font-medium text-gray-500 hidden sm:block">Guest</span>
                </div>

                <div class="w-px h-5 bg-gray-200"></div>

                <a href="{{ route('login') }}" class="flex items-center gap-1.5 text-sm text-gray-400 hover:text-indigo-600 transition-colors font-medium">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/></svg>
                    <span class="hidden sm:block">Sign in</span>
                </a>
            </div>
        </div>
    </nav>

    <div class="max-w-5xl mx-auto px-6 py-8">

        {{-- Page header --}}
        <div class="mb-8">
            <h1 class="text-2xl font-bold text-gray-800">My Notes</h1>
            <p class="text-sm text-gray-400 mt-1">Guest workspace — <a href="{{ route('register') }}" class="text-indigo-500 hover:underline font-medium">create an account</a> to save your notes</p>
        </div>

        {{-- New Note Form --}}
        @if ($showForm)
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-indigo-100 mb-6">
                <h3 class="text-sm font-semibold text-gray-700 mb-4">{{ $editingIndex !== null ? 'Edit Note' : 'New Note' }}</h3>
                <form wire:submit.prevent="addNote" class="space-y-4">
                    <div>
                        <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">Title</label>
                        <input
                            type="text"
                            wire:model.defer="title"
                            placeholder="Note title..."
                            class="w-full px-4 py-3 rounded-2xl border border-gray-200 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-transparent bg-gray-50 @error('title') border-red-400 @enderror"
                        />
                        @error('title')
                            <p class="text-xs text-red-500 mt-1 ml-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">Content</label>
                        <textarea
                            wire:model.defer="body"
                            placeholder="Write your note here..."
                            rows="5"
                            class="w-full px-4 py-3 rounded-2xl border border-gray-200 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-transparent bg-gray-50 @error('body') border-red-400 @enderror"
                        ></textarea>
                        @error('body')
                            <p class="text-xs text-red-500 mt-1 ml-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex gap-3">
                        <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 active:scale-95 text-white text-sm font-semibold px-6 py-2.5 rounded-2xl transition-all shadow-lg shadow-indigo-200">
                            {{ $editingIndex !== null ? 'Update note' : 'Save note' }}
                        </button>
                        <button type="button" wire:click="cancelForm" class="px-6 py-2.5 rounded-2xl border border-gray-200 text-sm font-semibold text-gray-500 hover:bg-gray-50 transition-colors">
                            Cancel
                        </button>
                    </div>
                </form>
            </div>
        @endif

        {{-- Search + New Note --}}
        @if (!$showForm)
            <div class="flex items-center gap-3 mb-8">
                <div class="relative flex-1">
                    <svg class="absolute left-4 top-3.5 w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    <input
                        type="text"
                        placeholder="Search notes..."
                        class="w-full pl-11 pr-4 py-3 rounded-2xl border border-gray-200 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-transparent bg-white"
                        disabled
                    />
                </div>
                <button wire:click="$set('showForm', true)" class="bg-indigo-600 hover:bg-indigo-700 active:scale-95 text-white text-sm font-semibold px-5 py-3 rounded-2xl transition-all duration-150 shadow-lg shadow-indigo-200 whitespace-nowrap flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                    <span class="hidden sm:block">New Note</span>
                    <span class="block sm:hidden">New</span>
                </button>
            </div>
        @endif

        {{-- Empty state --}}
        @if (empty($notes) && !$showForm)
            <div class="text-center py-24">
                <div class="w-16 h-16 bg-indigo-50 rounded-2xl flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-indigo-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                </div>
                <p class="text-gray-400 text-sm font-medium">No notes found</p>
                <button wire:click="$set('showForm', true)" class="text-indigo-600 text-sm hover:underline mt-2 inline-block font-semibold">
                    Create your first note →
                </button>
            </div>
        @endif

        {{-- Notes Grid --}}
        @if (!empty($notes))
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach ($notes as $index => $note)
                    <div class="bg-white rounded-2xl border border-gray-100 p-5 flex flex-col justify-between hover:shadow-md hover:border-indigo-100 transition-all duration-200 group">
                        <div>
                            <h2 class="font-semibold text-gray-800 mb-2 truncate group-hover:text-indigo-600 transition-colors">{{ $note['title'] }}</h2>
                            <p class="text-sm text-gray-400 line-clamp-3 leading-relaxed">{{ $note['body'] }}</p>
                        </div>
                        <div class="flex items-center justify-between mt-4 pt-3 border-t border-gray-50">
                            <span class="text-xs text-gray-300">{{ $note['created'] }}</span>
                            <div class="flex gap-2">
                                <button wire:click="editNote({{ $index }})" class="inline-flex items-center gap-1 text-xs text-indigo-400 hover:text-indigo-600 font-medium transition-colors">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                    Edit
                                </button>
                                <button wire:click="confirmDelete({{ $index }})" class="inline-flex items-center gap-1 text-xs text-red-300 hover:text-red-500 font-medium transition-colors">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                    Delete
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

    </div>

    {{-- Delete confirmation modal --}}
    @if ($deleteIndex !== null)
        <div class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50 px-6">
            <div class="bg-white rounded-3xl p-8 w-full max-w-sm shadow-2xl">
                <div class="w-12 h-12 bg-red-50 rounded-2xl flex items-center justify-center mx-auto mb-4">
                    <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                </div>
                <h3 class="text-lg font-bold text-gray-800 text-center mb-1">Delete note?</h3>
                <p class="text-sm text-gray-400 text-center mb-6">This action cannot be undone.</p>
                <div class="flex gap-3">
                    <button wire:click="cancelDelete" class="flex-1 px-4 py-3 rounded-2xl border border-gray-200 text-sm font-semibold text-gray-600 hover:bg-gray-50 transition-colors">Cancel</button>
                    <button wire:click="deleteNote" class="flex-1 px-4 py-3 rounded-2xl bg-red-500 hover:bg-red-600 text-white text-sm font-semibold transition-colors">Delete</button>
                </div>
            </div>
        </div>
    @endif

</div>