<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdherenceArt extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama', 'deskripsi', 'deleted'
    ];

    public function pasien(){
        return $this->belongsTo(Pasien::class, 'id_pasien');
    }
}
