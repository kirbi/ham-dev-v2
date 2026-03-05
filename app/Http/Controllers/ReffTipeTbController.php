<?php

namespace App\Http\Controllers;

use App\Models\TipeTb;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReffTipeTbController extends Controller
{

    public function index()
    {
        return view('livewire.reff-tipe-tb.index');
    }
}
