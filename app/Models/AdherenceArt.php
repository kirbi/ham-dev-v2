<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdherenceArt extends Model
{
    use HasFactory;
    
    
    protected $fillable = [
        'deleted', 'nama', 'deskripsi'
    ];
    
}
