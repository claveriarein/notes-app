<div class="min-h-screen bg-gray-50">

    <nav class="bg-white border-b border-gray-100 sticky top-0 z-50">
        <div class="max-w-2xl mx-auto px-6 py-4 flex items-center justify-between">
            <div class="flex items-center gap-2">
                <div class="w-8 h-8 bg-indigo-600 rounded-xl flex items-center justify-center">
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                </div>
                <span class="font-bold text-gray-800 text-lg">Notely</span>
            </div>
            <a href="{{ route('notes') }}" class="inline-flex items-center gap-1 text-sm text-gray-400 hover:text-gray-600 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                Back to notes
            </a>
        </div>
    </nav>

    <div class="max-w-2xl mx-auto px-6 py-8">
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-800">New Note</h1>
            <p class="text-sm text-gray-400 mt-1">Capture your thoughts</p>
        </div>

        <div class="bg-white rounded-3xl border border-gray-100 p-8 shadow-sm">
            <form wire:submit.prevent="save" class="space-y-5">

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
                        rows="8"
                        class="w-full px-4 py-3 rounded-2xl border border-gray-200 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-transparent bg-gray-50 @error('body') border-red-400 @enderror"
                    ></textarea>
                    @error('body')
                        <p class="text-xs text-red-500 mt-1 ml-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex gap-3 pt-2">
                    <button
                        type="submit"
                        class="bg-indigo-600 hover:bg-indigo-700 active:scale-95 text-white text-sm font-semibold px-8 py-3 rounded-2xl transition-all shadow-lg shadow-indigo-200"
                        wire:loading.attr="disabled"
                    >
                        <span wire:loading.remove>Save note</span>
                        <span wire:loading class="hidden">Saving...</span>
                    </button>
                    <a href="{{ route('notes') }}" class="px-8 py-3 rounded-2xl border border-gray-200 text-sm font-semibold text-gray-500 hover:bg-gray-50 transition-colors">
                        Cancel
                    </a>
                </div>

            </form>
        </div>
    </div>
</div>