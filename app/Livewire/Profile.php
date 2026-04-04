<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class Profile extends Component
{
    use WithFileUploads;

    public string $name = '';
    public string $email = '';
    public string $current_password = '';
    public string $new_password = '';
    public string $new_password_confirmation = '';
    public $photo = null;
    public bool $showPasswordForm = false;
    public string $successMessage = '';

    public function mount()
    {
        $this->name  = Auth::user()->name;
        $this->email = Auth::user()->email;
    }

    public function updateProfile()
    {
        $this->validate([
            'name'  => 'required|min:2|max:50',
            'email' => ['required', 'email', Rule::unique('users')->ignore(Auth::id())],
            'photo' => 'nullable|image|max:2048',
        ]);

        $user = Auth::user();
        $data = [
            'name'  => $this->name,
            'email' => $this->email,
        ];

        if ($this->photo) {
            // Delete old photo
            if ($user->profile_photo) {
                \Storage::disk('public')->delete($user->profile_photo);
            }
            $data['profile_photo'] = $this->photo->store('profile-photos', 'public');
        }

        $user->update($data);
        $this->photo = null;
        $this->successMessage = 'Profile updated successfully!';
    }

    public function updatePassword()
    {
        $this->validate([
            'current_password'      => 'required',
            'new_password'          => 'required|min:6|confirmed',
            'new_password_confirmation' => 'required',
        ]);

        if (!Hash::check($this->current_password, Auth::user()->password)) {
            $this->addError('current_password', 'Current password is incorrect.');
            return;
        }

        Auth::user()->update([
            'password' => Hash::make($this->new_password),
        ]);

        $this->current_password = '';
        $this->new_password = '';
        $this->new_password_confirmation = '';
        $this->showPasswordForm = false;
        $this->successMessage = 'Password updated successfully!';
    }

    public function render()
    {
        return view('livewire.profile')
            ->layout('layouts.app', ['title' => 'My Profile']);
    }
}