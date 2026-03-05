<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Redirect authenticated user to the dashboard.
     */
    public function index()
    {
        if (! auth()->check()) {
            return redirect()->route('login');
        }

        return redirect()->route('dashboard');
    }
}
