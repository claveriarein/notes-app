<div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-100 flex items-center justify-center px-6 py-12">
    <div class="w-full max-w-sm mx-auto">

        {{-- Phone mockup container --}}
        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden border border-gray-100">

            {{-- Status bar --}}
            <div class="bg-white px-6 pt-4 pb-2 flex items-center justify-between">
                <span class="text-xs font-semibold text-gray-800">9:41</span>
                <div class="flex items-center gap-1">
                    <svg class="w-3 h-3 text-gray-800" fill="currentColor" viewBox="0 0 24 24"><path d="M1 9l2 2c4.97-4.97 13.03-4.97 18 0l2-2C16.93 2.93 7.08 2.93 1 9zm8 8l3 3 3-3c-1.65-1.66-4.34-1.66-6 0zm-4-4l2 2c2.76-2.76 7.24-2.76 10 0l2-2C15.14 9.14 8.87 9.14 5 13z"/></svg>
                    <svg class="w-3 h-3 text-gray-800" fill="currentColor" viewBox="0 0 24 24"><path d="M15.67 4H14V2h-4v2H8.33C7.6 4 7 4.6 7 5.33v15.33C7 21.4 7.6 22 8.33 22h7.33c.74 0 1.34-.6 1.34-1.33V5.33C17 4.6 16.4 4 15.67 4z"/></svg>
                </div>
            </div>

            {{-- Hero illustration area --}}
            <div class="bg-gradient-to-br from-blue-50 to-indigo-100 mx-4 rounded-2xl px-6 py-8 mb-6 relative overflow-hidden">

                {{-- Floating icons --}}
                <div class="absolute top-4 right-6 w-10 h-10 bg-white rounded-xl shadow-md flex items-center justify-center">
                    <svg class="w-5 h-5 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                </div>
                <div class="absolute top-16 left-4 w-8 h-8 bg-white rounded-xl shadow-md flex items-center justify-center">
                    <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                </div>
                <div class="absolute bottom-4 right-4 w-8 h-8 bg-white rounded-xl shadow-md flex items-center justify-center">
                    <svg class="w-4 h-4 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"/></svg>
                </div>

                {{-- Illustration --}}
                <div class="flex justify-center mb-4">
                    <div class="relative">
                        {{-- Person illustration using CSS --}}
                        <div class="w-20 h-20 bg-indigo-500 rounded-full flex items-center justify-center shadow-lg">
                            <svg class="w-12 h-12 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                        </div>
                        {{-- Decorative dots --}}
                        <div class="absolute -top-1 -right-1 w-4 h-4 bg-yellow-400 rounded-full"></div>
                        <div class="absolute -bottom-1 -left-1 w-3 h-3 bg-pink-400 rounded-full"></div>
                    </div>
                </div>

                <h2 class="text-center text-lg font-bold text-gray-800 mb-1">CAPTURE YOUR THOUGHTS</h2>
                <p class="text-center text-xs text-gray-500 leading-relaxed">Write, organize, and revisit your notes anytime, anywhere.</p>

                {{-- Dots indicator --}}
                <div class="flex justify-center gap-1.5 mt-4">
                    <div class="w-2 h-2 rounded-full bg-gray-300"></div>
                    <div class="w-2 h-2 rounded-full bg-gray-300"></div>
                    <div class="w-5 h-2 rounded-full bg-indigo-500"></div>
                </div>
            </div>

            {{-- Action buttons --}}
            <div class="px-6 pb-8 space-y-3">

                {{-- Get Started --}}
                <button
                    wire:click="getStarted"
                    class="w-full bg-indigo-600 hover:bg-indigo-700 active:scale-95 text-white font-semibold py-3.5 rounded-2xl transition-all duration-150 text-sm shadow-lg shadow-indigo-200"
                >
                    Let's Get Started
                </button>

                {{-- Divider --}}
                <div class="flex items-center gap-3 py-1">
                    <div class="flex-1 h-px bg-gray-100"></div>
                    <span class="text-xs text-gray-400">or</span>
                    <div class="flex-1 h-px bg-gray-100"></div>
                </div>

                {{-- Sign In / Sign Up row --}}
                <div class="grid grid-cols-2 gap-3">
                    
                        href="{{ route('register') }}"
                        class="text-center bg-indigo-50 hover:bg-indigo-100 text-indigo-600 font-semibold py-3 rounded-2xl transition-colors text-sm"
                    >
                        Sign up
                    </a>
                    
                        href="{{ route('login') }}"
                        class="text-center bg-gray-50 hover:bg-gray-100 text-gray-700 font-semibold py-3 rounded-2xl transition-colors text-sm"
                    >
                        Sign in
                    </a>
                </div>

            </div>
        </div>

        {{-- Bottom tagline --}}
        <p class="text-center text-xs text-gray-400 mt-6">Notely — simple notes for busy minds</p>

    </div>
</div>