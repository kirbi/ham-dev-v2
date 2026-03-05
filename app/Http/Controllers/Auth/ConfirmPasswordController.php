<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

class ConfirmPasswordController extends Controller
{
    public function showConfirmForm()
    {
        return view('livewire.auth.confirm-password');
    }
}
