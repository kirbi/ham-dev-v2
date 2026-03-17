<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TerapiArtPasien extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'deleted',
        'pasien_id',
        'tanggal_mulai',
        'fase',
        'alasan_id',
        'penjelasan',
        'paduan_art_id',
    ];
    public function pasien(){
        return $this->belongsTo(Pasien::class, 'pasien_id');
    }

    public function paduanArt(){
        return $this->hasOne(PaduanArt::class, 'paduan_art_id');
    }

    public function alasan(){
        return $this->belongsTo(AlasanSubstitusi::class, 'alasan_id');
    }

}
