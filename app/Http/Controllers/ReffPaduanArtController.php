<?php

namespace App\Http\Controllers;

use App\Models\PaduanArt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReffPaduanArtController extends Controller
{

    public function index()
    {
        return view('livewire.reff-paduan-art.index');
    }
}
