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
        return redirect()->route('dashboard');
    }
}
