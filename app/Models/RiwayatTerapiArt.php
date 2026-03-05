<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatTerapiArt extends Model
{
    use HasFactory;
    
    
    protected $fillable = [
        'deleted', 'pernah_menerima', 'jenis_terapi_art_id', 'tempat_art_id', 'paduan_art_id', 'dosis_art', 'lama_penggunaan', 'pasien_id'  
    ];

    public function pasien(){
        return $this->belongsTo(Pasien::class, 'pasien_id');
    }
    public function paduanArt(){
        return $this->belongsTo(PaduanArt::class, 'paduan_art_id');
    }
    public function tempatTerapi(){
        return $this->belongsTo(TempatTerapi::class, 'tempat_art_id');
    }
    public function jenisTerapi(){
        return $this->belongsTo(JenisTerapi::class, 'jenis_terapi_art_id');
    }
}
