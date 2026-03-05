<?php

namespace App\Http\Controllers;

class TerapiArtPasienController extends Controller
{
    public function index()
    {
        return view('livewire.terapi-art-pasien.index');
    }
}
