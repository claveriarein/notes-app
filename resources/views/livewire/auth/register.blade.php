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
                <h1 class="text-2xl font-bold text-gray-800 mb-1">Create Account</h1>
                <p class="text-sm text-gray-400">Start capturing your thoughts today</p>
            </div>

            <form wire:submit.prevent="register" class="space-y-4">

                {{-- Name --}}
                <div>
                    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">Your Name</label>
                    <input
                        type="text"
                        wire:model.defer="name"
                        placeholder="Juan dela Cruz"
                        class="w-full px-4 py-3 rounded-2xl border border-gray-200 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-transparent bg-gray-50 @error('name') border-red-400 bg-red-50 @enderror"
                    />
                    @error('name')
                        <p class="text-xs text-red-500 mt-1 ml-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Email --}}
                <div>
                    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">Your Email</label>
                    <input
                        type="email"
                        wire:model.defer="email"
                        placeholder="you@example.com"
                        class="w-full px-4 py-3 rounded-2xl border border-gray-200 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-transparent bg-gray-50 @error('email') border-red-400 bg-red-50 @enderror"
                    />
                    @error('email')
                        <p class="text-xs text-red-500 mt-1 ml-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Password --}}
                <div>
                    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">Password</label>
                    <input
                        type="password"
                        wire:model.defer="password"
                        placeholder="••••••••"
                        class="w-full px-4 py-3 rounded-2xl border border-gray-200 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-transparent bg-gray-50 @error('password') border-red-400 bg-red-50 @enderror"
                    />
                    @error('password')
                        <p class="text-xs text-red-500 mt-1 ml-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Confirm Password --}}
                <div>
                    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">Confirm Password</label>
                    <input
                        type="password"
                        wire:model.defer="password_confirmation"
                        placeholder="••••••••"
                        class="w-full px-4 py-3 rounded-2xl border border-gray-200 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-transparent bg-gray-50 @error('password_confirmation') border-red-400 bg-red-50 @enderror"
                    />
                    @error('password_confirmation')
                        <p class="text-xs text-red-500 mt-1 ml-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Terms --}}
                <div class="flex items-start gap-2 pt-1">
                    <input type="checkbox" id="terms" required class="w-4 h-4 mt-0.5 rounded border-gray-300 text-indigo-500 focus:ring-indigo-400">
                    <label for="terms" class="text-xs text-gray-400 leading-relaxed">
                        I agree to the <span class="text-indigo-600 font-semibold">Terms & Conditions</span> and <span class="text-indigo-600 font-semibold">Privacy Policy</span>
                    </label>
                </div>

                {{-- Submit --}}
                <button
                    type="submit"
                    class="w-full bg-indigo-600 hover:bg-indigo-700 active:scale-95 text-white font-semibold py-3.5 rounded-2xl transition-all duration-150 text-sm shadow-lg shadow-indigo-200 mt-2"
                    wire:loading.attr="disabled"
                >
                    <span wire:loading.remove>Create account</span>
                    <span wire:loading class="hidden">Creating account...</span>
                </button>

            </form>

            <p class="text-center text-sm text-gray-400 mt-6">
                Already have an account?
                <a href="{{ route('login') }}" class="text-indigo-600 font-semibold hover:underline">Log in</a>
            </p>

        </div>
    </div>
</div>