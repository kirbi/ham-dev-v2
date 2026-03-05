<?php

namespace App\Http\Controllers;

class PasienFileController extends Controller
{

    public function index()
    {
        return view('livewire.pasien-file.index');
    }
}
