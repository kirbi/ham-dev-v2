<?php

namespace App\Http\Controllers;

class InfoTesHivKonselingController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:admin,konselor']);
    }

    public function index()
    {
        return view('livewire.info-tes-hiv-konseling.index');
    }
}
