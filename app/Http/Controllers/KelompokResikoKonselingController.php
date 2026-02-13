<?php

namespace App\Http\Controllers;

class KelompokResikoKonselingController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:admin,konselor']);
    }

    public function index()
    {
        return view('livewire.kelompok-resiko-konseling.index');
    }
}
