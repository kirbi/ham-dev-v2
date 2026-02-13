<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SosialisasiHiv extends Model
{
    use HasFactory;
    protected $table = 'dpha_sosialisasi_hiv';
    /**
    * The primary key associated with the table.
    *
    * @var string
    */
    protected $primaryKey = 'id_sosialisasi_hiv';

    
    protected $fillable = [
        'deleted', 'tempat_kegiatan', 'nama_kegiatan', 'target_kegiatan', 'tanggal_kegiatan', 'peserta_hadir', 'id_kabupaten', 'id_kecamatan', 'nama_narahubung', 'kontak_narahubung'
    ];

    public function kabupaten(){
        return $this->belongsTo(Kabupaten::class, 'id_kabupaten', 'id_kabupaten');
    }
    
    public function kecamatan(){
        return $this->belongsTo(Kecamatan::class, 'id_kecamatan', 'id_kecamatan');
    }

    public static function filterCheckHivBulanan($tahun = null, $bulan = null, $kabupaten = null, $kecamatan = null){
        $pasien = SosialisasiHiv::where('deleted', 0);
        if($tahun){
            $pasien->whereYear('tanggal_kegiatan', $tahun);
        }
        if($bulan){
            $pasien->whereMonth('tanggal_kegiatan', $bulan);
        }
        if($kabupaten){
            $pasien->where('id_kabupaten', $kabupaten);
        }
        if($kecamatan){
            $pasien->where('id_kecamatan', $kecamatan);
        }
        return $pasien;
    }
}
