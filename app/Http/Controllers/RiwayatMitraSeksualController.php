<?php

namespace App\Http\Controllers;

class RiwayatMitraSeksualController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:admin,konselor']);
    }

    public function index()
    {
        return view('livewire.riwayat-mitra-seksual.index');
    }
}
