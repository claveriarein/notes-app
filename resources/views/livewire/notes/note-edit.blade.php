<div class="min-h-screen bg-gray-50">

    {{-- Header --}}
    <nav class="bg-white border-b border-gray-200 px-6 py-4 flex items-center justify-between">
        <h1 class="text-xl font-semibold text-gray-800">Edit Note</h1>
        <a href="{{ route('notes') }}" class="text-sm text-gray-500 hover:underline">← Back to notes</a>
    </nav>

    <div class="max-w-2xl mx-auto px-6 py-8">
        <div class="bg-white rounded-2xl border border-gray-200 p-8">

            <form wire:submit.prevent="save" class="space-y-5">

                {{-- Title --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Title</label>
                    <input
                        type="text"
                        wire:model.defer="title"
                        placeholder="Note title..."
                        class="w-full px-4 py-2.5 rounded-lg border border-gray-300 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-400 @error('title') border-red-400 @enderror"
                    />
                    @error('title')
                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Body --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Content</label>
                    <textarea
                        wire:model.defer="body"
                        placeholder="Write your note here..."
                        rows="8"
                        class="w-full px-4 py-2.5 rounded-lg border border-gray-300 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-400 @error('body') border-red-400 @enderror"
                    ></textarea>
                    @error('body')
                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Actions --}}
                <div class="flex gap-3 pt-2">
                    <button
                        type="submit"
                        class="bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium px-6 py-2.5 rounded-lg transition-colors"
                        wire:loading.attr="disabled"
                    >
                        <span wire:loading.remove>Update note</span>
                        <span wire:loading>Updating...</span>
                    </button>
                    <a href="{{ route('notes') }}" class="px-6 py-2.5 rounded-lg border border-gray-300 text-sm text-gray-700 hover:bg-gray-50 transition-colors">
                        Cancel
                    </a>
                </div>

            </form>

        </div>
    </div>

</div>