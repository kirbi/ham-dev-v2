<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FaktorResikoPasienController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:admin,konselor']);
    }

    public function index()
    {
        return view('livewire.faktor-resiko-pasien.index');
    }
}
