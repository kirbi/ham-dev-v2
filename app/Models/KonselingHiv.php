<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KonselingHiv extends Model
{
    use HasFactory;
    
    protected $table = 'dpha_konseling_hiv';
    protected $primaryKey = 'id_konseling_hiv';
    protected $fillable = [
        'id_pasien',
        'id_kabupaten',
        'id_konselor',
        'id_pendidikan',
        'id_pekerjaan',
        'id_status_pernikahan',
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
        return $this->belongsTo(Pasien::class, 'id_pasien', 'id_pasien');
    }
    
    public function kelompokResikoKonseling(){
        return $this->hasMany(KelompokResikoKonseling::class, 'id_konseling', 'id_konseling_hiv');
    }

    public function infoTesHivKonseling(){
        return $this->hasMany(InfoTesHivKonseling::class, 'id_konseling', 'id_konseling_hiv');
    }

    public function kajianResikoHiv(){
        return $this->hasMany(KajianResikoHiv::class, 'id_konseling', 'id_konseling_hiv');
    }

    public function tesHivKonseling(){
        return $this->hasOne(TesHivKonseling::class, 'id_konseling', 'id_konseling_hiv');
    }

    public function rekapTesHivKonseling(){
        return $this->hasOne(RekapTesHivKonseling::class, 'id_konseling', 'id_konseling_hiv');
    }

    public function kabupaten(){
        return $this->belongsTo(Kabupaten::class, 'id_kabupaten', 'id_kabupaten');
    }

    public function statusPernikahan(){
        return $this->belongsTo(StatusPernikahan::class, 'id_status_pernikahan', 'id_status_pernikahan');
    }

    public function konselor(){
        return $this->belongsTo(Konselor::class, 'id_konselor', 'id_konselor');
    }

    public function alasanTes(){
        return $this->belongsTo(AlasanTesHiv::class, 'id_alasan_tes_hiv', 'id_alasan_tes_hiv');
    }

    public function pekerjaan(){
        return $this->belongsTo(Pekerjaan::class, 'id_pekerjaan', 'id_pekerjaan');
    }
    public function pendidikan(){
        return $this->belongsTo(Pendidikan::class, 'id_pendidikan', 'id_pendidikan');
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
            $konseling->where('id_pendidikan', $pendidikan);
        }
        if($statusPernikahan){
            $konseling->where('id_status_pernikahan', $statusPernikahan);
        }
        if($pekerjaan){
            $konseling->where('id_pekerjaan', $pekerjaan);
        }
        return $konseling;
    }
}
