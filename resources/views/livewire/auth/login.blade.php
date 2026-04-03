<div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-100 flex items-center justify-center px-6 py-12">
    <div class="w-full max-w-sm mx-auto">
        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden border border-gray-100 px-8 py-10">

            {{-- Back button --}}
            <a href="{{ route('landing') }}" class="inline-flex items-center gap-1 text-sm text-gray-400 hover:text-gray-600 mb-6 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                Back
            </a>

            {{-- Header --}}
            <div class="mb-8">
                <h1 class="text-2xl font-bold text-gray-800 mb-1">Welcome back</h1>
                <p class="text-sm text-gray-400">Sign in to access your notes</p>
            </div>

            {{-- Success message --}}
            @if (session()->has('success'))
                <div class="mb-4 px-4 py-3 bg-green-50 border border-green-200 text-green-700 text-sm rounded-2xl">
                    {{ session('success') }}
                </div>
            @endif

            <form wire:submit.prevent="login" class="space-y-4">

                {{-- Email --}}
                <div>
                    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">Your Email</label>
                    <div class="relative">
                        <input
                            type="email"
                            wire:model.defer="email"
                            placeholder="you@example.com"
                            class="w-full px-4 py-3 rounded-2xl border border-gray-200 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-transparent bg-gray-50 @error('email') border-red-400 bg-red-50 @enderror"
                        />
                        @if(!$errors->has('email'))
                        <div class="absolute right-3 top-3.5">
                            <svg class="w-4 h-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        </div>
                        @endif
                    </div>
                    @error('email')
                        <p class="text-xs text-red-500 mt-1 ml-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Password --}}
                <div>
                    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">Password</label>
                    <div class="relative">
                        <input
                            type="password"
                            wire:model.defer="password"
                            placeholder="••••••••"
                            class="w-full px-4 py-3 rounded-2xl border border-gray-200 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-transparent bg-gray-50 @error('password') border-red-400 bg-red-50 @enderror"
                        />
                        <div class="absolute right-3 top-3.5">
                            <svg class="w-4 h-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                        </div>
                    </div>
                    @error('password')
                        <p class="text-xs text-red-500 mt-1 ml-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Remember me --}}
                <div class="flex items-center gap-2">
                    <input type="checkbox" wire:model="remember" id="remember" class="w-4 h-4 rounded border-gray-300 text-indigo-500 focus:ring-indigo-400">
                    <label for="remember" class="text-sm text-gray-500">Remember me</label>
                </div>

                {{-- Submit --}}
                <button
                    type="submit"
                    class="w-full bg-indigo-600 hover:bg-indigo-700 active:scale-95 text-white font-semibold py-3.5 rounded-2xl transition-all duration-150 text-sm shadow-lg shadow-indigo-200 mt-2"
                    wire:loading.attr="disabled"
                >
                    <span wire:loading.remove>Sign in</span>
                    <span wire:loading class="hidden">Signing in...</span>
                </button>

            </form>

            <p class="text-center text-sm text-gray-400 mt-6">
                Don't have an account?
                <a href="{{ route('register') }}" class="text-indigo-600 font-semibold hover:underline">Sign up</a>
            </p>

        </div>
    </div>
</div>