<?php

namespace App\Http\Controllers;

use App\Models\StatusFungsional;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReffStatusFungsionalController extends Controller
{

    public function index()
    {
        return view('livewire.reff-status-fungsional.index');
    }
}
