<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckHivController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:admin,konselor']);
    }

    public function index()
    {
        return view('livewire.check-hiv.index');
    }
}
