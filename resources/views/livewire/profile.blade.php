{{-- resources/views/livewire/profile.blade.php --}}
<div>
    {{-- Flash messages --}}
    @if (session()->has('success'))
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3500)"
             x-transition:leave="transition ease-in duration-300"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-2"
             class="mb-6 flex items-center gap-3 rounded-2xl bg-violet-50 border border-violet-200 px-4 py-3 text-sm font-medium text-violet-700">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0 text-violet-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            {{ session('success') }}
        </div>
    @endif

    {{-- ── Profile Info Section ── --}}
    <div class="profile-card">
        <div class="profile-card-header">
            <div class="avatar-wrap">
                <div class="avatar">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </div>
                <div class="avatar-ring"></div>
            </div>
            <div>
                <h2 class="profile-name">{{ auth()->user()->name }}</h2>
                <p class="profile-email">{{ auth()->user()->email }}</p>
            </div>
        </div>

        <form wire:submit.prevent="updateProfile">
            <div class="section-label">Profile information</div>

            <div class="form-grid">
                <div class="form-group">
                    <label for="name">Full name</label>
                    <div class="input-wrap">
                        <svg class="icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/>
                        </svg>
                        <input type="text" id="name" wire:model="name" placeholder="Your full name">
                    </div>
                    @error('name') <div class="field-error">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label for="email">Email address</label>
                    <div class="input-wrap">
                        <svg class="icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"/>
                        </svg>
                        <input type="email" id="email" wire:model="email" placeholder="you@example.com">
                    </div>
                    @error('email') <div class="field-error">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-primary" wire:loading.attr="disabled" wire:loading.class="loading">
                    <span wire:loading.remove wire:target="updateProfile">Save profile</span>
                    <span wire:loading wire:target="updateProfile">Saving…</span>
                    <svg wire:loading.remove wire:target="updateProfile" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/>
                    </svg>
                </button>
            </div>
        </form>
    </div>

    {{-- ── Password Section ── --}}
    <div class="profile-card" style="margin-top: 1.5rem;">
        <form wire:submit.prevent="updatePassword">
            <div class="section-label">Change password</div>

            <div class="form-group">
                <label for="current_password">Current password</label>
                <div class="input-wrap">
                    <svg class="icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z"/>
                    </svg>
                    <input type="password" id="current_password" wire:model="current_password" placeholder="Enter current password">
                </div>
                @error('current_password') <div class="field-error">{{ $message }}</div> @enderror
            </div>

            <div class="form-grid">
                <div class="form-group">
                    <label for="new_password">New password</label>
                    <div class="input-wrap">
                        <svg class="icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25a3 3 0 013 3m3 0a6 6 0 01-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1121.75 8.25z"/>
                        </svg>
                        <input type="password" id="new_password" wire:model="new_password" placeholder="Min. 8 characters">
                    </div>
                    @error('new_password') <div class="field-error">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label for="new_password_confirmation">Confirm new password</label>
                    <div class="input-wrap">
                        <svg class="icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z"/>
                        </svg>
                        <input type="password" id="new_password_confirmation" wire:model="new_password_confirmation" placeholder="Repeat new password">
                    </div>
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-primary" wire:loading.attr="disabled" wire:loading.class="loading">
                    <span wire:loading.remove wire:target="updatePassword">Update password</span>
                    <span wire:loading wire:target="updatePassword">Updating…</span>
                    <svg wire:loading.remove wire:target="updatePassword" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z"/>
                    </svg>
                </button>
            </div>
        </form>
    </div>

    {{-- ── Danger Zone ── --}}
    <div class="profile-card danger-card" style="margin-top: 1.5rem;">
        <div class="section-label danger-label">Danger zone</div>
        <p style="font-size:0.875rem; color: var(--text-muted); margin-bottom: 1.25rem;">
            Once you delete your account, all of your notes and data will be permanently removed. This action cannot be undone.
        </p>
        <button type="button"
            onclick="confirm('Are you sure? This cannot be undone.') && document.getElementById('deleteAccountForm').submit()"
            class="btn-danger">
            Delete my account
        </button>
        <form id="deleteAccountForm" method="POST" action="{{ route('profile.destroy') }}" style="display:none;">
            @csrf
            @method('DELETE')
        </form>
    </div>
</div>

<style>
    :root {
        --lavender-soft: #ede8f5;
        --lavender-mid: #c9b8e8;
        --violet: #7c3aed;
        --violet-dark: #6d28d9;
        --violet-light: #a78bfa;
        --surface: #ffffff;
        --text-primary: #1a1523;
        --text-muted: #6b7280;
        --border: #e5e7eb;
        --input-bg: #f9f8fc;
    }

    .profile-card {
        background: var(--surface);
        border-radius: 24px;
        padding: 2rem;
        box-shadow: 0 4px 24px rgba(124, 58, 237, 0.07), 0 1px 3px rgba(0,0,0,0.04);
        border: 1px solid rgba(124,58,237,0.06);
    }

    .profile-card-header {
        display: flex;
        align-items: center;
        gap: 1rem;
        margin-bottom: 1.75rem;
        padding-bottom: 1.5rem;
        border-bottom: 1px solid var(--border);
    }

    .avatar-wrap {
        position: relative;
        flex-shrink: 0;
    }

    .avatar {
        width: 52px;
        height: 52px;
        border-radius: 50%;
        background: linear-gradient(135deg, var(--violet-light), var(--violet));
        color: white;
        font-size: 1.375rem;
        font-weight: 600;
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: 'DM Serif Display', serif;
    }

    .avatar-ring {
        position: absolute;
        inset: -3px;
        border-radius: 50%;
        border: 2px solid var(--violet-light);
        opacity: 0.5;
    }

    .profile-name {
        font-size: 1rem;
        font-weight: 600;
        color: var(--text-primary);
    }

    .profile-email {
        font-size: 0.8125rem;
        color: var(--text-muted);
        margin-top: 0.1rem;
    }

    .section-label {
        font-size: 0.75rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.08em;
        color: var(--violet);
        margin-bottom: 1.25rem;
    }

    .danger-label { color: #dc2626; }

    .form-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 0 1rem;
    }

    @media (max-width: 640px) {
        .form-grid { grid-template-columns: 1fr; }
    }

    .form-group {
        margin-bottom: 1rem;
    }

    .form-group label {
        display: block;
        font-size: 0.8rem;
        font-weight: 500;
        color: var(--text-muted);
        margin-bottom: 0.35rem;
        letter-spacing: 0.04em;
        text-transform: uppercase;
    }

    .input-wrap { position: relative; }

    .input-wrap .icon {
        position: absolute;
        left: 0.9rem;
        top: 50%;
        transform: translateY(-50%);
        color: var(--lavender-mid);
        pointer-events: none;
        width: 16px;
        height: 16px;
    }

    .input-wrap input {
        width: 100%;
        background: var(--input-bg);
        border: 1.5px solid var(--border);
        border-radius: 12px;
        padding: 0.75rem 1rem 0.75rem 2.4rem;
        font-family: 'DM Sans', sans-serif;
        font-size: 0.9375rem;
        color: var(--text-primary);
        transition: border-color 0.2s, box-shadow 0.2s;
        outline: none;
    }

    .input-wrap input::placeholder { color: #c4b5d8; }

    .input-wrap input:focus {
        border-color: var(--violet-light);
        background: #fff;
        box-shadow: 0 0 0 3px rgba(167, 139, 250, 0.18);
    }

    .field-error {
        font-size: 0.78rem;
        color: #dc2626;
        margin-top: 0.3rem;
        padding-left: 0.25rem;
    }

    .form-actions {
        display: flex;
        justify-content: flex-end;
        margin-top: 0.5rem;
    }

    .btn-primary {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        background: var(--violet);
        color: #fff;
        border: none;
        border-radius: 12px;
        padding: 0.7rem 1.4rem;
        font-family: 'DM Sans', sans-serif;
        font-size: 0.9rem;
        font-weight: 600;
        cursor: pointer;
        transition: background 0.2s, transform 0.15s, box-shadow 0.2s;
        box-shadow: 0 4px 12px rgba(124, 58, 237, 0.25);
    }
    .btn-primary:hover {
        background: var(--violet-dark);
        transform: translateY(-1px);
        box-shadow: 0 6px 16px rgba(124, 58, 237, 0.32);
    }
    .btn-primary:disabled, .btn-primary.loading {
        opacity: 0.65;
        cursor: not-allowed;
        transform: none;
    }
    .btn-primary svg { width: 16px; height: 16px; }

    .danger-card {
        border-color: #fee2e2;
        background: #fffbfb;
    }

    .btn-danger {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        background: transparent;
        color: #dc2626;
        border: 1.5px solid #fca5a5;
        border-radius: 12px;
        padding: 0.65rem 1.25rem;
        font-family: 'DM Sans', sans-serif;
        font-size: 0.875rem;
        font-weight: 500;
        cursor: pointer;
        transition: background 0.2s, border-color 0.2s;
    }
    .btn-danger:hover {
        background: #fef2f2;
        border-color: #dc2626;
    }
</style>