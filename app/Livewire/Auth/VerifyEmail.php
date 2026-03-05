<?php

namespace App\Livewire\Auth;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.guest')]
class VerifyEmail extends Component
{
    public function resendVerification()
    {
        if (auth()->user()->hasVerifiedEmail()) {
            return redirect()->route('dashboard');
        }

        auth()->user()->sendEmailVerificationNotification();
        session()->flash('status', 'Link verifikasi telah dikirim ulang ke email Anda.');
    }

    public function render()
    {
        return view('livewire.auth.verify-email');
    }
}
