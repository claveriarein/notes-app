<div class="min-h-screen bg-gray-50">

    {{-- Navbar --}}
    <nav class="bg-white border-b border-gray-100 sticky top-0 z-50">
        <div class="max-w-3xl mx-auto px-6 py-4 flex items-center justify-between">
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

    <div class="max-w-3xl mx-auto px-6 py-8">

        {{-- Page header --}}
        <div class="mb-8">
            <h1 class="text-2xl font-bold text-gray-800">My Profile</h1>
            <p class="text-sm text-gray-400 mt-1">Manage your account settings</p>
        </div>

        {{-- Success message --}}
        @if ($successMessage)
            <div class="mb-6 px-4 py-3 bg-green-50 border border-green-200 text-green-700 text-sm rounded-2xl flex items-center gap-2">
                <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                {{ $successMessage }}
            </div>
        @endif

        {{-- Profile Photo + Name + Email --}}
        <div class="bg-white rounded-3xl border border-gray-100 p-8 shadow-sm mb-4">
            <h2 class="text-base font-bold text-gray-700 mb-6">Profile Information</h2>

            <form wire:submit.prevent="updateProfile" class="space-y-6">

                {{-- Profile Photo --}}
                <div class="flex items-center gap-6">
                    <div class="relative">
                        {{-- Current photo or initials --}}
                        @if (Auth::user()->profile_photo)
                            <img
                                src="{{ asset('storage/' . Auth::user()->profile_photo) }}"
                                class="w-20 h-20 rounded-2xl object-cover border-2 border-indigo-100"
                                alt="Profile photo"
                            />
                        @elseif ($photo)
                            <img
                                src="{{ $photo->temporaryUrl() }}"
                                class="w-20 h-20 rounded-2xl object-cover border-2 border-indigo-100"
                                alt="Profile photo preview"
                            />
                        @else
                            <div class="w-20 h-20 bg-indigo-100 rounded-2xl flex items-center justify-center border-2 border-indigo-100">
                                <span class="text-2xl font-bold text-indigo-600">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</span>
                            </div>
                        @endif

                        {{-- Upload button overlay --}}
                        <label class="absolute -bottom-2 -right-2 w-7 h-7 bg-indigo-600 rounded-xl flex items-center justify-center cursor-pointer hover:bg-indigo-700 transition-colors shadow-md">
                            <svg class="w-3.5 h-3.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            <input type="file" wire:model="photo" accept="image/*" class="hidden"/>
                        </label>
                    </div>

                    <div>
                        <p class="text-sm font-semibold text-gray-700">{{ Auth::user()->name }}</p>
                        <p class="text-xs text-gray-400 mt-0.5">{{ Auth::user()->email }}</p>
                        <p class="text-xs text-indigo-500 mt-1">Click the camera icon to change photo</p>
                        @error('photo')
                            <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Name --}}
                <div>
                    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">Full Name</label>
                    <input
                        type="text"
                        wire:model.defer="name"
                        class="w-full px-4 py-3 rounded-2xl border border-gray-200 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-transparent bg-gray-50 @error('name') border-red-400 @enderror"
                    />
                    @error('name')
                        <p class="text-xs text-red-500 mt-1 ml-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Email --}}
                <div>
                    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">Email Address</label>
                    <input
                        type="email"
                        wire:model.defer="email"
                        class="w-full px-4 py-3 rounded-2xl border border-gray-200 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-transparent bg-gray-50 @error('email') border-red-400 @enderror"
                    />
                    @error('email')
                        <p class="text-xs text-red-500 mt-1 ml-1">{{ $message }}</p>
                    @enderror
                </div>

                <button
                    type="submit"
                    class="bg-indigo-600 hover:bg-indigo-700 active:scale-95 text-white text-sm font-semibold px-8 py-3 rounded-2xl transition-all shadow-lg shadow-indigo-200"
                    wire:loading.attr="disabled"
                >
                    <span wire:loading.remove>Save changes</span>
                    <span wire:loading class="hidden">Saving...</span>
                </button>

            </form>
        </div>

        {{-- Password Section --}}
        <div class="bg-white rounded-3xl border border-gray-100 p-8 shadow-sm">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h2 class="text-base font-bold text-gray-700">Password</h2>
                    <p class="text-xs text-gray-400 mt-0.5">Update your account password</p>
                </div>
                <button
                    wire:click="$toggle('showPasswordForm')"
                    class="text-sm text-indigo-600 font-semibold hover:underline"
                >
                    {{ $showPasswordForm ? 'Cancel' : 'Change password' }}
                </button>
            </div>

            @if ($showPasswordForm)
                <form wire:submit.prevent="updatePassword" class="space-y-4">

                    <div>
                        <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">Current Password</label>
                        <input
                            type="password"
                            wire:model.defer="current_password"
                            placeholder="••••••••"
                            class="w-full px-4 py-3 rounded-2xl border border-gray-200 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-transparent bg-gray-50 @error('current_password') border-red-400 @enderror"
                        />
                        @error('current_password')
                            <p class="text-xs text-red-500 mt-1 ml-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">New Password</label>
                        <input
                            type="password"
                            wire:model.defer="new_password"
                            placeholder="••••••••"
                            class="w-full px-4 py-3 rounded-2xl border border-gray-200 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-transparent bg-gray-50 @error('new_password') border-red-400 @enderror"
                        />
                        @error('new_password')
                            <p class="text-xs text-red-500 mt-1 ml-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">Confirm New Password</label>
                        <input
                            type="password"
                            wire:model.defer="new_password_confirmation"
                            placeholder="••••••••"
                            class="w-full px-4 py-3 rounded-2xl border border-gray-200 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-transparent bg-gray-50"
                        />
                    </div>

                    <button
                        type="submit"
                        class="bg-indigo-600 hover:bg-indigo-700 active:scale-95 text-white text-sm font-semibold px-8 py-3 rounded-2xl transition-all shadow-lg shadow-indigo-200"
                        wire:loading.attr="disabled"
                    >
                        <span wire:loading.remove>Update password</span>
                        <span wire:loading class="hidden">Updating...</span>
                    </button>

                </form>
            @else
                <div class="flex items-center gap-3 p-4 bg-gray-50 rounded-2xl">
                    <svg class="w-5 h-5 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                    <p class="text-sm text-gray-400">Password last changed: never</p>
                </div>
            @endif
        </div>

    </div>
</div>