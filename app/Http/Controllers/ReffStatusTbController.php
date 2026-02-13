<?php

namespace App\Http\Controllers;

use App\Models\StatusTb;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReffStatusTbController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:admin,konselor']);
    }

    public function index()
    {
        return view('livewire.reff-status-tb.index');
    }
}
