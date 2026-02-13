<?php

namespace App\Http\Controllers;

use App\Models\EfekSamping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReffEfekSampingController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:admin,konselor']);
    }

    public function index()
    {
        return view('livewire.reff-efek-samping.index');
    }
}
