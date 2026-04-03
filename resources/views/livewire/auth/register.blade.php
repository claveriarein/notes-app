<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-indigo-50 via-white to-purple-50">
    <div class="w-full max-w-md bg-white/80 backdrop-blur-sm rounded-2xl shadow-xl border border-gray-100 p-8">

        {{-- Notes App Header --}}
        <div class="text-center mb-6">
            <div class="text-4xl mb-2">📝</div>
            <h1 class="text-3xl font-bold bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">NotesApp</h1>
            <p class="text-sm text-gray-500 mt-1">Capture what matters</p>
        </div>

        <h2 class="text-xl font-semibold text-gray-800 mb-1">Create an account</h2>
        <p class="text-sm text-gray-500 mb-6">Start saving your thoughts forever</p>

        <form wire:submit.prevent="register" class="space-y-4">

            {{-- Name --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                <input
                    type="text"
                    wire:model.defer="name"
                    placeholder="Juan dela Cruz"
                    class="w-full px-4 py-2.5 rounded-lg border border-gray-300 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-transparent transition-all @error('name') border-red-400 @enderror"
                />
                @error('name')
                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Email --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input
                    type="email"
                    wire:model.defer="email"
                    placeholder="you@example.com"
                    class="w-full px-4 py-2.5 rounded-lg border border-gray-300 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-transparent transition-all @error('email') border-red-400 @enderror"
                />
                @error('email')
                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Password --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <input
                    type="password"
                    wire:model.defer="password"
                    placeholder="••••••••"
                    class="w-full px-4 py-2.5 rounded-lg border border-gray-300 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-transparent transition-all @error('password') border-red-400 @enderror"
                />
                @error('password')
                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Confirm Password --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Confirm Password</label>
                <input
                    type="password"
                    wire:model.defer="password_confirmation"
                    placeholder="••••••••"
                    class="w-full px-4 py-2.5 rounded-lg border border-gray-300 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-transparent transition-all @error('password_confirmation') border-red-400 @enderror"
                />
                @error('password_confirmation')
                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Submit --}}
            <button
                type="submit"
                class="w-full bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white text-sm font-medium py-2.5 rounded-lg transition-all duration-200 transform hover:scale-[1.02]"
                wire:loading.attr="disabled"
            >
                <span wire:loading.remove>✨ Create account</span>
                <span wire:loading>Creating account...</span>
            </button>

        </form>

        {{-- Divider --}}
        <div class="relative my-6">
            <div class="absolute inset-0 flex items-center">
                <div class="w-full border-t border-gray-200"></div>
            </div>
            <div class="relative flex justify-center text-sm">
                <span class="px-3 bg-white/80 text-gray-500">or</span>
            </div>
        </div>

        {{-- Skip Button --}}
        <button
            wire:click="skip"
            class="w-full border-2 border-gray-200 hover:border-indigo-300 text-gray-700 hover:text-indigo-600 text-sm font-medium py-2.5 rounded-lg transition-all duration-200"
        >
            🚀 Skip & start taking notes
        </button>

        <p class="text-center text-sm text-gray-500 mt-6">
            Already have an account?
            <a href="{{ route('login') }}" class="text-indigo-600 hover:underline font-medium">Sign in</a>
        </p>

    </div>
</div>