<?php

namespace App\Http\Controllers;

use App\Models\AlasanSubstitusi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReffAlasanSubstitusiController extends Controller
{

    public function index()
    {
        return view('livewire.reff-alasan-substitusi.index');
    }
}
