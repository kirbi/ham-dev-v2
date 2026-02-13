<?php

namespace App\Http\Controllers;

class PemeriksaanKlinisController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:admin,konselor']);
    }

    public function index()
    {
        return view('livewire.pemeriksaan-klinis.index');
    }
}
