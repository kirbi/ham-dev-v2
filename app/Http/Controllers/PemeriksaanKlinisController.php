<?php

namespace App\Http\Controllers;

class PemeriksaanKlinisController extends Controller
{

    public function index()
    {
        return view('livewire.pemeriksaan-klinis.index');
    }
}
