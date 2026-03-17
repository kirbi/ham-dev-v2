<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;
    

    
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
        'pendidikan_id',
        'pekerjaan_id',
        'status_pernikahan_id',
        'foto_pasien',
        'konselor_id',
        'status_hiv_id',
        'tanggal_konfirmasi_hiv',
        'tempat_konfirmasi_hiv',
        'entry_point_id',
        'nama_pmo',
        'alamat_pmo',
        'hubungan_pmo',
        'no_hp_pmo',
        'paduan_art_id',
        'riwayat_alergi_obat',
        'status_hiv',
        'jenis_pasien',
        'status_aktif',
        'agama',
        'tempat_tinggal',
        'provinsi_id',
        'kabupaten_id',
        'kecamatan_id',
        'desa_id',
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
    //     return $this->belongsTo(JenisKelamin::class, 'jenis_kelamin_id');
    // }
    public function konselor(){
        return $this->belongsTo(Konselor::class, 'konselor_id');
    }
    public function pasienFile(){
        return $this->hasMany(PasienFile::class, 'pasien_id');
    }

    public function pekerjaan(){
        return $this->belongsTo(Pekerjaan::class, 'pekerjaan_id')->where('deleted', 0);
    }
    public function pemeriksaanKlinis(){
        return $this->hasMany(PemeriksaanKlinis::class, 'pasien_id')->where('deleted', 0);
    }
    public function pendidikan(){
        return $this->belongsTo(Pendidikan::class, 'pendidikan_id')->where('deleted', 0);
    }
    
    public function statusPernikahan(){
        return $this->belongsTo(StatusPernikahan::class, 'status_pernikahan_id')->where('deleted', 0);
    }
    
    public function riwayatTerapiArt(){
        return $this->hasMany(RiwayatTerapiArt::class, 'pasien_id')->where('deleted', 0);
    }

    public function riwayaPerawatanPasien(){
        return $this->hasMany(RiwayatPerawatanPasien::class, 'pasien_id')->where('deleted', 0);
    }
    
    public function riwayatMitraSeksuals(){
        return $this->hasMany(RiwayatMitraSeksual::class, 'pasien_id')->where('deleted', 0);
    }
    public function statusHiv(){
        return $this->belongsTo(StatusHiv::class, 'status_hiv_id')->where('deleted', 0);
    }
    
    public function faktorResikoPasien(){
        return $this->hasMany(FaktorResikoPasien::class, 'pasien_id')->where('deleted', 0);
    }
    public function entryPoint(){
        return $this->belongsTo(EntryPoint::class, 'entry_point_id')->where('deleted', 0);
    }
    public function paduanArt(){
        return $this->belongsTo(PaduanArt::class, 'paduan_art_id')->where('deleted', 0);
    }
    public function terapiArt(){
        return $this->hasMany(TerapiArtPasien::class, 'pasien_id')->where('deleted', 0);
    }
    public function pengobatanTb(){
        return $this->hasMany(PengobatanTbHiv::class, 'pasien_id')->where('deleted', 0);
    }
    public function provinsi(){
        return $this->belongsTo(Provinsi::class, 'provinsi_id');
    }
    public function kabupaten(){
        return $this->belongsTo(Kabupaten::class, 'kabupaten_id');
    }
    public function kecamatan(){
        return $this->belongsTo(Kecamatan::class, 'kecamatan_id');
    }
    public function desa(){
        return $this->belongsTo(Desa::class, 'desa_id');
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
            $pasien->where('pendidikan_id', $pendidikan);
        }
        if($statusPernikahan){
            $pasien->where('status_pernikahan_id', $statusPernikahan);
        }
        if($pekerjaan){
            $pasien->where('pekerjaan_id', $pekerjaan);
        }
        if($entryPoint){
            $pasien->where('entry_point_id', $entryPoint);
        }
        if($provinsi){
            $pasien->where('provinsi_id', $provinsi);
        }
        if($kabupaten){
            $pasien->where('kabupaten_id', $kabupaten);
        }
        if($kecamatan){
            $pasien->where('kecamatan_id', $kecamatan);
        }
        if($desa){
            $pasien->where('desa_id', $desa);
        }
        return $pasien;
    }

    public static function konseling(){
        return Pasien::where('status_hiv', "Negatif")->where(['deleted' => 0])->orderBy('nama', 'asc')->get();
    }
}
