<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaktorResiko extends Model
{
    use HasFactory;
    
    
    protected $fillable = [
        'deleted', 'nama', 'deskripsi'
    ];

    public function pasien(){
        return $this->hasMany(FaktorResikoPasien::class, 'faktor_resiko_id');
    }
}
