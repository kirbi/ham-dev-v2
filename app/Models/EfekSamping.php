<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EfekSamping extends Model
{
    use HasFactory;
    

    
    protected $fillable = [
        'deleted', 'kode', 'nama', 'deskripsi'
    ];
}
