<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TingkatResikoHiv extends Model
{
    use HasFactory;
    

    
    protected $fillable = [
        'deleted', 'nama', 'deskripsi'
    ];
}
