<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempatTerapi extends Model
{
    use HasFactory;
    
    
    protected $fillable = [
        'deleted', 'nama', 'deskripsi'
    ];

    public function pasien(){
        return $this->hasMany(Pasien::class, 'id_tempat_terapi');
    }
}
