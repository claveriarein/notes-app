<div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-100 flex items-center justify-center px-6 py-12">

    {{-- MOBILE VIEW (shown only on small screens) --}}
    <div class="w-full max-w-sm mx-auto block md:hidden">
        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden border border-gray-100">

            {{-- Hero illustration area --}}
            <div class="bg-gradient-to-br from-blue-50 to-indigo-100 mx-4 mt-4 rounded-2xl px-6 py-8 mb-6 relative overflow-hidden">

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
                        <div class="w-20 h-20 bg-indigo-500 rounded-full flex items-center justify-center shadow-lg">
                            <svg class="w-12 h-12 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                        </div>
                        <div class="absolute -top-1 -right-1 w-4 h-4 bg-yellow-400 rounded-full"></div>
                        <div class="absolute -bottom-1 -left-1 w-3 h-3 bg-pink-400 rounded-full"></div>
                    </div>
                </div>

                <h2 class="text-center text-lg font-bold text-gray-800 mb-1">CAPTURE YOUR THOUGHTS</h2>
                <p class="text-center text-xs text-gray-500 leading-relaxed">Write, organize, and revisit your notes anytime, anywhere.</p>

                <div class="flex justify-center gap-1.5 mt-4">
                    <div class="w-2 h-2 rounded-full bg-gray-300"></div>
                    <div class="w-2 h-2 rounded-full bg-gray-300"></div>
                    <div class="w-5 h-2 rounded-full bg-indigo-500"></div>
                </div>
            </div>

            {{-- Action buttons --}}
            <div class="px-6 pb-8 space-y-3">
                {{-- Mobile button --}}
                <button wire:click="getStarted" class="w-full bg-indigo-600 hover:bg-indigo-700 active:scale-95 text-white font-semibold py-3.5 rounded-2xl transition-all duration-150 text-sm shadow-lg shadow-indigo-200">
                    Start Taking Notes
                </button>

                <div class="flex items-center gap-3 py-1">
                    <div class="flex-1 h-px bg-gray-100"></div>
                    <span class="text-xs text-gray-400">or</span>
                    <div class="flex-1 h-px bg-gray-100"></div>
                </div>

                <div class="grid grid-cols-2 gap-3">
                    <a href="{{ route('register') }}" class="text-center bg-indigo-50 hover:bg-indigo-100 text-indigo-600 font-semibold py-3 rounded-2xl transition-colors text-sm">
                        Sign up
                    </a>
                    <a href="{{ route('login') }}" class="text-center bg-gray-50 hover:bg-gray-100 text-gray-700 font-semibold py-3 rounded-2xl transition-colors text-sm">
                        Sign in
                    </a>
                </div>
            </div>
        </div>

        <p class="text-center text-xs text-gray-400 mt-6">Notely — simple notes for busy minds</p>
    </div>

    {{-- DESKTOP VIEW (shown only on medium screens and above) --}}
    <div class="hidden md:flex w-full max-w-5xl mx-auto items-center gap-16">

        {{-- Left side - branding --}}
        <div class="flex-1 space-y-6">
            <div class="inline-flex items-center gap-2 bg-indigo-100 text-indigo-600 text-xs font-semibold px-3 py-1.5 rounded-full">
                <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                Your personal notes app
            </div>

            <div>
                <h1 class="text-5xl font-bold text-gray-800 leading-tight mb-4">
                    Capture your<br>
                    <span class="text-indigo-600">thoughts,</span><br>
                    anywhere.
                </h1>
                <p class="text-gray-500 text-lg leading-relaxed max-w-md">
                    Write, organize, and revisit your notes anytime. Simple, fast, and always in sync.
                </p>
            </div>

            {{-- Features list --}}
            <div class="space-y-3">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 bg-indigo-100 rounded-xl flex items-center justify-center flex-shrink-0">
                        <svg class="w-4 h-4 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                    </div>
                    <span class="text-gray-600 text-sm">Create and edit notes instantly</span>
                </div>
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 bg-blue-100 rounded-xl flex items-center justify-center flex-shrink-0">
                        <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    </div>
                    <span class="text-gray-600 text-sm">Search through all your notes</span>
                </div>
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 bg-purple-100 rounded-xl flex items-center justify-center flex-shrink-0">
                        <svg class="w-4 h-4 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                    </div>
                    <span class="text-gray-600 text-sm">Secure and private — only you can see your notes</span>
                </div>
            </div>

            {{-- CTA buttons --}}
            <div class="flex items-center gap-4 pt-2">
                <button
                    wire:click="getStarted"
                    class="bg-indigo-600 hover:bg-indigo-700 active:scale-95 text-white font-semibold px-8 py-3.5 rounded-2xl transition-all duration-150 text-sm shadow-lg shadow-indigo-200"
                >
                    Start Taking Notes
                </button>
                <a href="{{ route('login') }}" class="text-gray-500 hover:text-gray-700 font-semibold text-sm transition-colors">
                    Sign in →
                </a>
            </div>
        </div>

        {{-- Right side - preview card --}}
        <div class="flex-1 flex justify-center">
            <div class="w-80 bg-white rounded-3xl shadow-2xl border border-gray-100 overflow-hidden">

                {{-- Card header --}}
                <div class="bg-gradient-to-br from-indigo-500 to-blue-600 px-6 py-8 text-white">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-10 h-10 bg-white bg-opacity-20 rounded-xl flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                        </div>
                        <span class="font-bold text-lg">Notely</span>
                    </div>
                    <p class="text-white text-opacity-90 text-sm">Your notes, always with you</p>
                </div>

                {{-- Sample notes preview --}}
                <div class="p-4 space-y-3">
                    <div class="bg-gray-50 rounded-2xl p-4 border border-gray-100">
                        <p class="text-xs font-semibold text-gray-800 mb-1">Meeting Notes</p>
                        <p class="text-xs text-gray-400 line-clamp-2">Discuss project timeline, assign tasks to team members...</p>
                        <p class="text-xs text-indigo-400 mt-2">2 minutes ago</p>
                    </div>
                    <div class="bg-gray-50 rounded-2xl p-4 border border-gray-100">
                        <p class="text-xs font-semibold text-gray-800 mb-1">Ideas for the weekend</p>
                        <p class="text-xs text-gray-400 line-clamp-2">Go hiking, visit the new coffee shop, read that book...</p>
                        <p class="text-xs text-indigo-400 mt-2">1 hour ago</p>
                    </div>
                    <div class="bg-indigo-50 rounded-2xl p-4 border border-indigo-100">
                        <p class="text-xs font-semibold text-indigo-800 mb-1">Shopping List</p>
                        <p class="text-xs text-indigo-400 line-clamp-2">Milk, eggs, bread, coffee, fruits...</p>
                        <p class="text-xs text-indigo-400 mt-2">Yesterday</p>
                    </div>

                    {{-- New note button --}}
                    <button class="w-full bg-indigo-600 text-white text-xs font-semibold py-3 rounded-2xl flex items-center justify-center gap-2">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                        New Note
                    </button>
                </div>
            </div>
        </div>

    </div>

</div>