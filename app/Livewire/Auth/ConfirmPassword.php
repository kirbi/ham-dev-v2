<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.guest')]
class ConfirmPassword extends Component
{
    public string $password = '';

    protected array $rules = [
        'password' => 'required|string',
    ];

    public function confirmPassword()
    {
        $this->validate();

        if (! Hash::check($this->password, auth()->user()->password)) {
            $this->addError('password', 'Password yang Anda masukkan salah.');
            return;
        }

        session()->put('auth.password_confirmed_at', time());

        return redirect()->intended(route('dashboard'));
    }

    public function render()
    {
        return view('livewire.auth.confirm-password');
    }
}
