<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemeriksaanKlinis extends Model
{
    use HasFactory;
    
    
    protected $fillable = [
        'id_pasien', 'tanggal_pemeriksaan', 'hasil_pemeriksaan', 'deleted'
    ];
    public function pasien(){
        return $this->belongsTo(Pasien::class, 'pasien_id');
    }
    public function kategoriPemeriksaan(){
        return $this->belongsTo(KategoriPemeriksaan::class, 'kategori_pemeriksaan_id');
    }
    public function statusFungsional(){
        return $this->belongsTo(StatusFungsional::class, 'status_fungsional_id');
    }
}
