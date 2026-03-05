<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaktorResikoPasien extends Model
{
    use HasFactory;
    

    protected $fillable = [
        'pasien_id', 'faktor_resiko_id', 'deskripsi', 'deleted'
    ];
    
    public function faktorResiko(){
        return $this->belongsTo(FaktorResiko::class, 'faktor_resiko_id');
    }

    public function pasien(){
        return $this->belongsTo(Pasien::class, 'pasien_id');
    }
}
