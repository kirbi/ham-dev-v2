<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemeriksaanKlinis extends Model
{
    use HasFactory;
    

    
    protected $fillable = [
        'deleted', 'pasien_id', 'tanggal_pemeriksaan', 'berat_badan', 'status_fungsional_id', 'jumlah_cd4', 'lain_lain', 'standar_klinis', 'kategori_pemeriksaan_id', 'tanggal_pemeriksaan_selanjutnya', 'viral_load'
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
