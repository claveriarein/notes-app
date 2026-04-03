<div class="min-h-screen flex items-center justify-center bg-gray-50">
    <div class="w-full max-w-md bg-white rounded-2xl shadow-sm border border-gray-200 p-8">

        <h1 class="text-2xl font-semibold text-gray-800 mb-1">Welcome back</h1>
        <p class="text-sm text-gray-500 mb-6">Sign in to your notes</p>

        {{-- Success message from registration --}}
        @if (session()->has('success'))
            <div class="mb-4 px-4 py-3 bg-green-50 border border-green-200 text-green-700 text-sm rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <form wire:submit.prevent="login" class="space-y-4">

            {{-- Email --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input
                    type="email"
                    wire:model.defer="email"
                    placeholder="you@example.com"
                    class="w-full px-4 py-2.5 rounded-lg border border-gray-300 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-400 @error('email') border-red-400 @enderror"
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
                    class="w-full px-4 py-2.5 rounded-lg border border-gray-300 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-400 @error('password') border-red-400 @enderror"
                />
                @error('password')
                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Remember me --}}
            <div class="flex items-center gap-2">
                <input type="checkbox" wire:model="remember" id="remember" class="rounded border-gray-300 text-indigo-500">
                <label for="remember" class="text-sm text-gray-600">Remember me</label>
            </div>

            {{-- Submit --}}
            <button
                type="submit"
                class="w-full bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium py-2.5 rounded-lg transition-colors"
                wire:loading.attr="disabled"
            >
                <span wire:loading.remove>Sign in</span>
                <span wire:loading class="hidden">Signing in...</span>
            </button>

        </form>

        <p class="text-center text-sm text-gray-500 mt-6">
            Don't have an account?
            <a href="{{ route('register') }}" class="text-indigo-600 hover:underline">Create one</a>
        </p>

    </div>
</div>