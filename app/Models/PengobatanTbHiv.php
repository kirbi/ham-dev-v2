<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengobatanTbHiv extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'pasien_id',
        'tipe_tb_id',
        'klasifikasi_tb_id',
        'paduan_tb_id',
        'kabupaten_pengobatan_id',
        'nama_sarana_kesehatan',
        'no_reg_tb',
        'tanggal_mulai_terapi',
        'tanggal_selesai_terapi',
        'lokasi_tb',
        'deleted'
    ];
    
    public function pasien(){
        return $this->belongsTo(Pasien::class, 'pasien_id');
    }
    public function paduanTb(){
        return $this->belongsTo(PaduanTb::class, 'paduan_tb_id');
    }
    public function klasifikasiTb(){
        return $this->belongsTo(KlasifikasiTb::class, 'klasifikasi_tb_id');
    }
    public function tipeTb(){
        return $this->belongsTo(TipeTb::class, 'tipe_tb_id');
    }
    public function kabupaten(){
        return $this->belongsTo(Kabupaten::class, 'kabupaten_pengobatan_id');
    }
    public static  function jumlahPasienSedangPengobatanTb(){
        return PengobatanTbHiv::where(['tanggal_selesai_terapi' => null])->where(['deleted' => 0])->count();
    }
    public static  function jumlahPasienTb(){
        return PengobatanTbHiv::where(['deleted' => 0])->groupBy('pasien_id')->count();
    }
}
