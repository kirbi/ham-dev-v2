<?php

namespace App\Http\Controllers;

class KonselorController extends Controller
{

    public function index()
    {
        return view('livewire.konselor.index');
    }
}
