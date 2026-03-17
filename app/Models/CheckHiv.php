<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckHiv extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'deleted', 'nama_tempat', 'nama_kegiatan', 'deskripsi_kegiatan', 'tanggal_kegiatan', 'hadir', 'kabupaten_id', 'kecamatan_id', 'jumlah_positif', 'jumlah_negatif', 'nama_narahubung', 'kontak_narahubung'
    ];

    public function kabupaten(){
        return $this->belongsTo(Kabupaten::class, 'kabupaten_id');
    }
    
    public function kecamatan(){
        return $this->belongsTo(Kecamatan::class, 'kecamatan_id');
    }

    public static function filterCheckHivBulanan($tahun = null, $bulan = null, $kabupaten = null, $kecamatan = null){
        $pasien = CheckHiv::where('deleted', 0);
        if($tahun){
            $pasien->whereYear('tanggal_kegiatan', $tahun);
        }
        if($bulan){
            $pasien->whereMonth('tanggal_kegiatan', $bulan);
        }
        if($kabupaten){
            $pasien->where('kabupaten_id', $kabupaten);
        }
        if($kecamatan){
            $pasien->where('kecamatan_id', $kecamatan);
        }
        return $pasien;
    }
}
