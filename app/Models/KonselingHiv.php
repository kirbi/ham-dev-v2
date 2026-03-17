<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KonselingHiv extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'pasien_id',
        'kabupaten_id',
        'konselor_id',
        'pendidikan_id',
        'pekerjaan_id',
        'status_pernikahan_id',
        'alamat',
        'tanggal_konseling',
        'no_registrasi',
        'ada_pasangan_perempuan',
        'pasangan_hamil',
        'jumlah_pasangan_laki_laki',
        'jumlah_anak_kandung',
        'umur_anak_terakhir',
        'status_kehamilan',
        'tanggal_konseling_pasca_tes_hiv',
        'status_pasien',
        'tanggal_konseling_pra_tes_hiv',
        'pernah_tes_hiv_sebelumnya',
        'kesediaan_tes_hiv',
        'catatan_konseling',
        'deleted'
    ];
    
    public function pasien(){
        return $this->belongsTo(Pasien::class, 'pasien_id');
    }
    
    public function kelompokResikoKonseling(){
        return $this->hasMany(KelompokResikoKonseling::class, 'konseling_hiv_id');
    }

    public function infoTesHivKonseling(){
        return $this->hasMany(InfoTesHivKonseling::class, 'konseling_hiv_id');
    }

    public function kajianResikoHiv(){
        return $this->hasMany(KajianResikoHiv::class, 'konseling_hiv_id');
    }

    public function tesHivKonseling(){
        return $this->hasOne(TesHivKonseling::class, 'konseling_hiv_id');
    }

    public function rekapTesHivKonseling(){
        return $this->hasOne(RekapTesHivKonseling::class, 'konseling_hiv_id');
    }

    public function kabupaten(){
        return $this->belongsTo(Kabupaten::class, 'kabupaten_id');
    }

    public function statusPernikahan(){
        return $this->belongsTo(StatusPernikahan::class, 'status_pernikahan_id');
    }

    public function konselor(){
        return $this->belongsTo(Konselor::class, 'konselor_id');
    }

    public function alasanTes(){
        return $this->belongsTo(AlasanTesHiv::class, 'alasan_tes_hiv_id');
    }

    public function pekerjaan(){
        return $this->belongsTo(Pekerjaan::class, 'pekerjaan_id');
    }
    public function pendidikan(){
        return $this->belongsTo(Pendidikan::class, 'pendidikan_id');
    }
    public static function filterKonselingHiv($jenisKelamin =null, $tahun = null, $bulan = null, $pendidikan = null, $statusPernikahan = null, $pekerjaan = null){
        $konseling = KonselingHiv::where('deleted', 0);
        if($jenisKelamin){
            $konseling->where('jenis_kelamin', $jenisKelamin);
        }
        if($tahun){
            $konseling->whereYear('tanggal_konseling', $tahun);
        }
        if($bulan){
            $konseling->whereMonth('tanggal_konseling', $bulan);
        }
        if($pendidikan){
            $konseling->where('pendidikan_id', $pendidikan);
        }
        if($statusPernikahan){
            $konseling->where('status_pernikahan_id', $statusPernikahan);
        }
        if($pekerjaan){
            $konseling->where('pekerjaan_id', $pekerjaan);
        }
        return $konseling;
    }
}
