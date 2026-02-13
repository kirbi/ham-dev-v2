<?php

namespace App\Http\Controllers;

class PengobatanTbHivController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:admin,konselor']);
    }

    public function index()
    {
        return view('livewire.pengobatan-tb-hiv.index');
    }
}
