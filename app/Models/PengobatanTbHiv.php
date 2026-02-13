<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengobatanTbHiv extends Model
{
    use HasFactory;
    
    protected $table = 'dpha_pengobatan_tb_hiv';
    protected $primaryKey = 'id_pengobatan_tb_hiv';
    protected $fillable = [
        'id_pasien',
        'id_tipe_tb',
        'id_klasifikasi_tb',
        'id_paduan_tb',
        'id_kabupaten_pengobatan',
        'nama_sarana_kesehatan',
        'no_reg_tb',
        'tanggal_mulai_terapi',
        'tanggal_selesai_terapi',
        'lokasi_tb',
        'deleted'
    ];
    
    public function pasien(){
        return $this->belongsTo(Pasien::class, 'id_pasien', 'id_pasien');
    }
    public function paduanTb(){
        return $this->belongsTo(PaduanTb::class, 'id_paduan_tb', 'id_paduan_tb');
    }
    public function klasifikasiTb(){
        return $this->belongsTo(KlasifikasiTb::class, 'id_klasifikasi_tb', 'id_klasifikasi_tb');
    }
    public function tipeTb(){
        return $this->belongsTo(TipeTb::class, 'id_tipe_tb', 'id_tipe_tb');
    }
    public function kabupaten(){
        return $this->belongsTo(Kabupaten::class, 'id_kabupaten_pengobatan', 'id_kabupaten');
    }
    public static  function jumlahPasienSedangPengobatanTb(){
        return PengobatanTbHiv::where(['tanggal_selesai_terapi' => null])->where(['deleted' => 0])->count();
    }
    public static  function jumlahPasienTb(){
        return PengobatanTbHiv::where(['deleted' => 0])->groupBy('id_pasien')->count();
    }
}
