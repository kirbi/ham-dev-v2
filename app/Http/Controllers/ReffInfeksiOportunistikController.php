<?php

namespace App\Http\Controllers;

use App\Models\InfeksiOportunistik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReffInfeksiOportunistikController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:admin,konselor']);
    }

    public function index()
    {
        return view('livewire.reff-infeksi-oportunistik.index');
    }
}
