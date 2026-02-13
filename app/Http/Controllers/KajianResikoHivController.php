<?php

namespace App\Http\Controllers;

class KajianResikoHivController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:admin,konselor']);
    }

    public function index()
    {
        return view('livewire.kajian-resiko-hiv.index');
    }
}
