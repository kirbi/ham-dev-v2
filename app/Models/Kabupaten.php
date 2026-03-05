<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kabupaten extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama', 'provinsi_id', 'deleted'
    ];

    public function provinsi(){
        return $this->belongsTo(Provinsi::class, 'provinsi_id');
    }

    public function kecamatan(){
        return $this->hasMany(Kecamatan::class, 'kabupaten_id');
    }

}
