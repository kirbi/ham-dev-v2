<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemeriksaanKlinis extends Model
{
    use HasFactory;
    
    protected $table = 'dpha_pemeriksaan_klinis';
    protected $primaryKey = 'id_pemeriksaan_klinis';

    
    protected $fillable = [
        'deleted', 'id_pasien', 'tanggal_pemeriksaan', 'berat_badan', 'id_status_fungsional', 'jumlah_cd4', 'lain_lain', 'standar_klinis', 'id_kategori_pemeriksaan', 'tanggal_pemeriksaan_selanjutnya', 'viral_load'
    ];
    public function pasien(){
        return $this->belongsTo(Pasien::class, 'id_pasien', 'id_pasien');
    }
    public function kategoriPemeriksaan(){
        return $this->belongsTo(KategoriPemeriksaan::class, 'id_kategori_pemeriksaan', 'id_kategori_pemeriksaan');
    }
    public function statusFungsional(){
        return $this->belongsTo(StatusFungsional::class, 'id_status_fungsional', 'id_status_fungsional');
    }
}
