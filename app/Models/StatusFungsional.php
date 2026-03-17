<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusFungsional extends Model
{
    use HasFactory;
    

    
    protected $fillable = [
        'deleted', 'kode', 'nama', 'deskripsi'
    ];
}
