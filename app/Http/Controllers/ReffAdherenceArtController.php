<?php

namespace App\Http\Controllers;

use App\Models\AdherenceArt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Middleware\RoleMiddleware;

class ReffAdherenceArtController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:admin,konselor']);
    }

    public function index()
    {
        return view('livewire.reff-adherence-art.index');
    }
}
