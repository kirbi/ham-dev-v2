<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TerapiArtPasien extends Model
{
    use HasFactory;
    
    protected $table = 'dpha_terapi_art_pasien';
    protected $primaryKey = 'id_terapi_art_pasien';
    protected $fillable = [
        'deleted',
        'id_terapi_art_pasien',
        'id_pasien',
        'tanggal_mulai',
        'fase',
        'id_alasan',
        'penjelasan',
        'id_paduan_art',
    ];
    public function pasien(){
        return $this->belongsTo(Pasien::class, 'id_pasien', 'id_pasien');
    }

    public function paduanArt(){
        return $this->hasOne(PaduanArt::class, 'id_paduan_art', 'id_paduan_art');
    }

    public function alasan(){
        return $this->belongsTo(AlasanSubstitusi::class, 'id_alasan', 'id_alasan_substitusi');
    }

}
