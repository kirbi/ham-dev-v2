<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class RiwayatPerawatanPasien extends Model
{
    use HasFactory;
    
    protected $table = 'dpha_riwayat_perawatan_pasien';
    protected $primaryKey = 'id_riwayat_perawatan_pasien';
    protected $fillable = [
        'deleted',
        'id_riwayat_perawatan_pasien',
        'id_pasien',
        'tanggal_pengobatan',
        'rencana_kunjungan_selanjutnya',
        'sisa_obat',
        'berat_badan',
        'tinggi_badan',
        'stadium_who',
        'hamil',
        'metode_kb',
        'id_infeksi_oportunistik',
        'obat_untuk_io',
        'id_status_tb',
        'ppk',
        'id_paduan_art',
        'dosis',
        'id_adherence_art',
        'id_efek_samping',
        'jumlah_cd4',
        'viral_load',
        'hasil_lab',
        'diberi_kondom',
        'id_status_fungsional',
        'rujuk_ke_spesialis'
    ];
    public function pasien(){
        return $this->belongsTo(Pasien::class, 'id_pasien', 'id_pasien');
    }

    public function paduanArt(){
        return $this->hasOne(PaduanArt::class, 'id_paduan_art', 'id_paduan_art');
    }

    public function adherenceArt(){
        return $this->belongsTo(AdherenceArt::class, 'id_adherence_art', 'id_adherence_art');
    }

    public function efekSamping(){
        return $this->belongsTo(EfekSamping::class, 'id_efek_samping', 'id_efek_samping');
    }

    public function statusTb(){
        return $this->belongsTo(StatusTb::class, 'id_status_tb', 'id_status_tb');
    }

    public function infeksiOportunistik(){
        return $this->belongsTo(InfeksiOportunistik::class, 'id_infeksi_oportunistik', 'id_infeksi_oportunistik');
    }

    public function statusFungsional(){
        return $this->belongsTo(StatusFungsional::class, 'id_status_fungsional', 'id_status_fungsional');
    }

    public static function detail($id){
        $data = RiwayatPerawatanPasien::find($id);
        return [
            'id_riwayat_perawatan_pasien' => $data->id_riwayat_perawatan_pasien,
            'id_pasien' => $data->id_pasien,
            'nama' => isset($data->id_pasien) ? $data->pasien->nama : '-',
            'tanggal_pengobatan' => isset($data->tanggal_pengobatan) ? $data->tanggal_pengobatan : '-',
            'rencana_kunjungan_selanjutnya' => isset($data->rencana_kunjungan_selanjutnya) ? $data->rencana_kunjungan_selanjutnya : '-',
            'sisa_obat' => isset($data->sisa_obat) ? $data->sisa_obat : '-',
            'berat_badan' => isset($data->berat_badan) ? $data->berat_badan : '-',
            'tinggi_badan' => isset($data->tinggi_badan) ? $data->tinggi_badan : '-',
            'stadium_who' => isset($data->stadium_who) ? $data->stadium_who : '-',
            'hamil' => isset($data->hamil) ? $data->hamil : '-',
            'metode_kb' => isset($data->metode_kb) ? $data->metode_kb : '-',
            'id_infeksi_oportunistik' => $data->id_infeksi_oportunistik,
            'infeksi_oportunistik' => isset($data->id_infeksi_oportunistik) ? $data->infeksiOportunistik->nama : '-',
            'obat_untuk_io' => isset($data->obat_untuk_io) ? $data->obat_untuk_io : '-',
            'id_status_tb' => $data->id_status_tb,
            'status_tb' => isset($data->id_status_tb) ? $data->statusTb->nama : '-',
            'ppk' => isset($data->ppk) ? $data->ppk : '-',
            'id_paduan_art' => $data->id_paduan_art,
            'paduan_art' => isset($data->id_paduan_art) ? $data->paduanArt->nama : '-',
            'dosis' => isset($data->dosis) ? $data->dosis : '-',
            'id_adherence_art' => isset($data->id_adherence_art) ? $data->id_adherence_art : '-',
            'adherence_art' => isset($data->id_adherence_art) ? $data->adherenceArt->nama : '-',
            'id_efek_samping' => isset($data->id_efek_samping) ? $data->id_efek_samping : '-',
            'efek_samping' => isset($data->id_efek_samping) ? $data->efekSamping : '-',
            'jumlah_cd4' => isset($data->jumlah_cd4) ? $data->jumlah_cd4 : '-',
            'viral_load' => isset($data->viral_load) ? $data->viral_load : '-',
            'hasil_lab' => isset($data->hasil_lab) ? $data->hasil_lab : '-',
            'diberi_kondom' => isset($data->diberi_kondom) ? $data->diberi_kondom : '-',
            'id_status_fungsional' => isset($data->id_status_fungsional) ? $data->id_status_fungsional : '-',
            'status_fungsional' => isset($data->id_status_fungsional) ? $data->statusFungsional->nama : '-',
            'rujuk_ke_spesialis' => isset($data->rujuk_ke_spesialis) ? $data->rujuk_ke_spesialis : '-'
        ];
    }

    public static function jumlahPasienTelatFollowup(){
        $today = date('Y-m-d');
        $pasien = Pasien::whereIn('status_aktif', ['Aktif', 'Tidak Aktif'])->where(['deleted' => 0])->get()->pluck('id_pasien');
        $data =  RiwayatPerawatanPasien::select('id_pasien', DB::raw('MAX(rencana_kunjungan_selanjutnya) as tanggal'))->havingRaw('MAX(rencana_kunjungan_selanjutnya) < ?', [$today])->where(['deleted' => 0])->whereIn('id_pasien', $pasien)->groupBy('id_pasien')->orderBy('tanggal', 'DESC')->count();
        return $data;

    }

    public static function pasienTelatFollowup(){
        $today = date('Y-m-d');
        $pasien = Pasien::whereIn('status_aktif', ['Aktif', 'Tidak Aktif'])->where(['deleted' => 0])->get()->pluck('id_pasien');
        $data = RiwayatPerawatanPasien::select( DB::raw('MAX(rencana_kunjungan_selanjutnya) as tanggal, id_pasien'))
        ->havingRaw('MAX(rencana_kunjungan_selanjutnya) < ?', [$today])->where(['deleted' => 0])->whereIn('id_pasien', $pasien)->groupBy('id_pasien')->orderBy('tanggal', 'DESC')->get();
        return $data;
    }

    public static function jumlahPasienAkanFollowup(){
        $from = Carbon::now()->subDays(1);
        $to = Carbon::now()->addDays(7);
        $pasien = Pasien::whereIn('status_aktif', ['Aktif', 'Tidak Aktif'])->where(['deleted' => 0])->get()->pluck('id_pasien');
        return RiwayatPerawatanPasien::select('id_pasien')->whereBetween('rencana_kunjungan_selanjutnya',[$from, $to])->where(['deleted' => 0])->whereIn('id_pasien', $pasien)->orderBy('rencana_kunjungan_selanjutnya', 'DESC')->groupBy('id_pasien')->count();
    }

    public static function pasienAkanFollowup(){
        $from = Carbon::now()->subDays(1);
        $to = Carbon::now()->addDays(7);
        $pasien = Pasien::whereIn('status_aktif', ['Aktif', 'Tidak Aktif'])->where(['deleted' => 0])->get()->pluck('id_pasien');
        return RiwayatPerawatanPasien::select('id_pasien', 'rencana_kunjungan_selanjutnya as tanggal')->whereBetween('rencana_kunjungan_selanjutnya',[$from, $to])->where(['deleted' => 0])->whereIn('id_pasien', $pasien)->orderBy('rencana_kunjungan_selanjutnya', 'DESC')->get();
        
    }

    public static function filterFollowUp($tahun = null, $bulan = null, $statusFungsional = null, $hamil = null, $infeksiOportunistik = null, $statusTb = null, $ppk = null, $adherence = null, $efekSamping = null, $kondom = null, $rujukSpesialis = null, $cd4 = null, $operator = null){
        $pasien = RiwayatPerawatanPasien::where('deleted', 0);
        if($tahun){
            $pasien->whereYear('tanggal_pengobatan', $tahun);
        }
        if($bulan){
            $pasien->whereMonth('tanggal_pengobatan', $bulan);
        }
        if($statusFungsional){
            $pasien->where('id_status_fungsional', $statusFungsional);
        }
        if($hamil){
            $pasien->where('hamil', $hamil);
        }
        if($infeksiOportunistik){
            $pasien->where('id_infeksi_oportunistik', $infeksiOportunistik);
        }
        if($statusTb){
            $pasien->where('id_status_tb', $statusTb);
        }
        if($ppk){
            $pasien->where('ppk', $ppk);
        }
        if($adherence){
            $pasien->where('id_adherence_art', $adherence);
        }
        if($efekSamping){
            $pasien->where('id_efek_samping', $efekSamping);
        }
        if($kondom){
            $pasien->where('diberi_kondom', $kondom);
        }
        if($rujukSpesialis){
            $pasien->where('rujuk_ke_spesialis', $rujukSpesialis);
        }
        
        if($cd4){
            $pasien->where('jumlah_cd4', $operator, $cd4);
        }
        return $pasien;
    }
}
