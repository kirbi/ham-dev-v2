<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;
    
    protected $table = 'dpha_pasien';
    protected $primaryKey = 'id_pasien';

    
    protected $fillable = [
        'deleted', 'no_reg_nasional',
        'no_rekam_medis',
        'nik',
        'no_kk',
        'no_bpjs',
        'nama',
        'jenis_kelamin',
        'tanggal_lahir',
        'tempat_lahir',
        'alamat',
        'no_hp',
        'id_pendidikan_terakhir',
        'id_pekerjaan',
        'id_status_pernikahan',
        'foto_pasien',
        'id_konselor',
        'id_status_hiv',
        'tanggal_konfirmasi_hiv',
        'tempat_konfirmasi_hiv',
        'id_entry_point',
        'nama_pmo',
        'alamat_pmo',
        'hubungan_pmo',
        'no_hp_pmo',
        'id_paduan_art',
        'id_iiart',
        'riwayat_alergi_obat',
        'status_hiv',
        'jenis_pasien',
        'status_aktif',
        'agama',
        'tempat_tinggal',
        'id_provinsi',
        'id_kabupaten',
        'id_kecamatan',
        'id_desa',
        'no_kk',
        'ibu_kandung',
        'tanggal_rujuk_masuk',
        'tanggal_rujuk_keluar',
        'tanggal_konfirmasi_aids',
        'tempat_konfirmasi_aids',
        'tanggal_meninggal',
        'tanggal_masuk',
        'tempat_rujuk_keluar',
        'tempat_rujuk_masuk',
        'tempat_pdp'

    ];

    // public function jenisKelamin(){
    //     return $this->belongsTo(JenisKelamin::class, 'id_jenis_kelamin', 'id_jenis_kelamin');
    // }
    public function konselor(){
        return $this->belongsTo(Konselor::class, 'id_konselor', 'id_konselor');
    }
    public function pasienFile(){
        return $this->hasMany(PasienFile::class, 'id_pasien', 'id_pasien');
    }

    public function pekerjaan(){
        return $this->belongsTo(Pekerjaan::class, 'id_pekerjaan', 'id_pekerjaan')->where('deleted', 0);
    }
    public function pemeriksaanKlinis(){
        return $this->hasMany(PemeriksaanKlinis::class, 'id_pasien', 'id_pasien')->where('deleted', 0);
    }
    public function pendidikan(){
        return $this->belongsTo(Pendidikan::class, 'id_pendidikan_terakhir', 'id_pendidikan')->where('deleted', 0);
    }
    
    public function statusPernikahan(){
        return $this->belongsTo(StatusPernikahan::class, 'id_status_pernikahan', 'id_status_pernikahan')->where('deleted', 0);
    }
    
    public function riwayatTerapiArt(){
        return $this->belongsTo(RiwayatTerapiArt::class, 'id_pasien', 'id_pasien')->where('deleted', 0);
    }

    public function riwayaPerawatanPasien(){
        return $this->hasMany(RiwayatPerawatanPasien::class, 'id_pasien', 'id_pasien')->where('deleted', 0);
    }
    
    public function riwayatMitraSeksuals(){
        return $this->hasMany(RiwayatMitraSeksual::class, 'id_pasien', 'id_pasien')->where('deleted', 0);
    }
    public function statusHiv(){
        return $this->hasOne(StatusHIV::class, 'id_status_hiv', 'id_status_hiv')->where('deleted', 0);
    }
    
    public function faktorResikoPasien(){
        return $this->hasMany(FaktorResikoPasien::class, 'id_pasien', 'id_pasien')->where('deleted', 0);
    }
    public function entryPoint(){
        return $this->hasOne(EntryPoint::class, 'id_entry_point', 'id_entry_point')->where('deleted', 0);
    }
    public function iiart(){
        return $this->hasOne(IndikasiInisiasiArt::class, 'id_iiart', 'id_iiart')->where('deleted', 0);
    }
    public function paduanArt(){
        return $this->hasOne(PaduanArt::class, 'id_paduan_art', 'id_paduan_art')->where('deleted', 0);
    }
    public function terapiArt(){
        return $this->hasMany(TerapiArtPasien::class, 'id_pasien', 'id_pasien')->where('deleted', 0);
    }
    public function pengobatanTb(){
        return $this->hasMany(PengobatanTbHiv::class, 'id_pasien', 'id_pasien')->where('deleted', 0);
    }
    public function provinsi(){
        return $this->belongsTo(Provinsi::class, 'id_provinsi', 'id_provinsi');
    }
    public function kabupaten(){
        return $this->belongsTo(Kabupaten::class, 'id_kabupaten', 'id_kabupaten');
    }
    public function kecamatan(){
        return $this->belongsTo(Kecamatan::class, 'id_kecamatan', 'id_kecamatan');
    }
    public function desa(){
        return $this->belongsTo(Desa::class, 'id_desa', 'id_desa');
    }
    public static function aktifTidakAktif(){
        return Pasien::whereIn('status_aktif', ['Aktif', 'Tidak Aktif'])->where(['deleted' => 0])->orderBy('nama', 'asc')->get();
    }
    public static function pasienMeninggal(){
        return Pasien::where(['status_aktif' => "Meninggal", 'status_hiv' => 'Positif', 'deleted' => 0])->count();
    }
    public static function pasienDirujuk(){
        return Pasien::where(['status_aktif' => "Dirujuk", 'status_hiv' => 'Positif', 'deleted' => 0])->count();
    }
    public static function pasienTidakAktif(){
        return Pasien::where(['status_aktif' => "TidakAktif", 'status_hiv' => 'Positif', 'deleted' => 0])->count();
    }
    public static function pasienAktif(){
        return Pasien::where(['status_aktif' => "Aktif", 'status_hiv' => 'Positif', 'deleted' => 0])->count();
    }
    public static function pasienRujukan(){
        return Pasien::where(['jenis_pasien' => "Rujukan", 'status_hiv' => 'Positif', 'deleted' => 0])->count();
    }
    public static function pasienBaru(){
        return Pasien::where(['jenis_pasien' => "Baru", 'status_hiv' => 'Positif', 'deleted' => 0])->count();
    }

    public static function filterPasienPositif($jenisKelamin =null, $statusHiv = null, $tahun = null, $bulan = null, $statusAktif = null, $jenisPasien = null, $pendidikan = null, $statusPernikahan = null, $pekerjaan = null, $entryPoint = null, $provinsi = null, $kabupaten = null, $kecamatan = null, $desa = null){
        $pasien = Pasien::where('deleted', 0);
        if($jenisKelamin){
            $pasien->where('jenis_kelamin', $jenisKelamin);
        }
        if($statusHiv){
            $pasien->whereIn('status_hiv', $statusHiv);
        }
        if($tahun){
            $pasien->whereYear('tanggal_masuk', $tahun);
        }
        if($bulan){
            $pasien->whereMonth('tanggal_masuk', $bulan);
        }
        if($statusAktif){
            $pasien->where('status_aktif', $statusAktif);
        }
        if($jenisPasien){
            $pasien->where('jenis_pasien', $jenisPasien);
        }
        if($pendidikan){
            $pasien->where('id_pendidikan', $pendidikan);
        }
        if($statusPernikahan){
            $pasien->where('id_status_pernikahan', $statusPernikahan);
        }
        if($pekerjaan){
            $pasien->where('id_pekerjaan', $pekerjaan);
        }
        if($entryPoint){
            $pasien->where('id_entry_point', $entryPoint);
        }
        if($provinsi){
            $pasien->where('id_provinsi', $provinsi);
        }
        if($kabupaten){
            $pasien->where('id_kabupaten', $kabupaten);
        }
        if($kecamatan){
            $pasien->where('id_kecamatan', $kecamatan);
        }
        if($desa){
            $pasien->where('id_desa', $desa);
        }
        return $pasien;
    }

    public static function konseling(){
        return Pasien::where('status_hiv', "Negatif")->where(['deleted' => 0])->orderBy('nama', 'asc')->get();
    }
}
