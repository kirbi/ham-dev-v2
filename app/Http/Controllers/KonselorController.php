<?php

namespace App\Http\Controllers;

class KonselorController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:admin']);
    }

    public function index()
    {
        return view('livewire.konselor.index');
    }
}
