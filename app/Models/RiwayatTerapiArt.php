<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatTerapiArt extends Model
{
    use HasFactory;
    
    protected $table = 'dpha_riwayat_terapi_art';
    /**
    * The primary key associated with the table.
    *
    * @var string
    */
    protected $primaryKey = 'id_riwayat_terapi_art';

    
    protected $fillable = [
        'deleted', 'pernah_menerima', 'id_jenis_terapi_art', 'id_tempat_art', 'id_paduan_art', 'dosis_art', 'lama_penggunaan', 'id_pasien'  
    ];

    public function pasien(){
        return $this->belongsTo(Pasien::class, 'id_pasien', 'id_pasien');
    }
    public function paduanArt(){
        return $this->belongsTo(PaduanArt::class, 'id_paduan_art', 'id_paduan_art');
    }
    public function tempatTerapi(){
        return $this->belongsTo(TempatTerapi::class, 'id_tempat_art', 'id_tempat_terapi');
    }
    public function jenisTerapi(){
        return $this->belongsTo(JenisTerapi::class, 'id_jenis_terapi_art', 'id_jenis_terapi');
    }
}
