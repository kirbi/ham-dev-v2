<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class RiwayatPerawatanPasien extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'deleted',
        'pasien_id',
        'tanggal_pengobatan',
        'rencana_kunjungan_selanjutnya',
        'sisa_obat',
        'berat_badan',
        'tinggi_badan',
        'stadium_who',
        'hamil',
        'metode_kb',
        'infeksi_oportunistik_id',
        'obat_untuk_io',
        'status_tb_id',
        'ppk',
        'paduan_art_id',
        'dosis',
        'adherence_art_id',
        'efek_samping_id',
        'jumlah_cd4',
        'viral_load',
        'hasil_lab',
        'diberi_kondom',
        'status_fungsional_id',
        'rujuk_ke_spesialis'
    ];
    public function pasien(){
        return $this->belongsTo(Pasien::class, 'pasien_id');
    }

    public function paduanArt(){
        return $this->belongsTo(PaduanArt::class, 'paduan_art_id');
    }

    public function adherenceArt(){
        return $this->belongsTo(AdherenceArt::class, 'adherence_art_id');
    }

    public function efekSamping(){
        return $this->belongsTo(EfekSamping::class, 'efek_samping_id');
    }

    public function statusTb(){
        return $this->belongsTo(StatusTb::class, 'status_tb_id');
    }

    public function infeksiOportunistik(){
        return $this->belongsTo(InfeksiOportunistik::class, 'infeksi_oportunistik_id');
    }

    public function statusFungsional(){
        return $this->belongsTo(StatusFungsional::class, 'status_fungsional_id');
    }

    public static function detail($id){
        $data = RiwayatPerawatanPasien::find($id);
        return [
            'id' => $data->id,
            'pasien_id' => $data->pasien_id,
            'nama' => isset($data->pasien_id) ? $data->pasien->nama : '-',
            'tanggal_pengobatan' => isset($data->tanggal_pengobatan) ? $data->tanggal_pengobatan : '-',
            'rencana_kunjungan_selanjutnya' => isset($data->rencana_kunjungan_selanjutnya) ? $data->rencana_kunjungan_selanjutnya : '-',
            'sisa_obat' => isset($data->sisa_obat) ? $data->sisa_obat : '-',
            'berat_badan' => isset($data->berat_badan) ? $data->berat_badan : '-',
            'tinggi_badan' => isset($data->tinggi_badan) ? $data->tinggi_badan : '-',
            'stadium_who' => isset($data->stadium_who) ? $data->stadium_who : '-',
            'hamil' => isset($data->hamil) ? $data->hamil : '-',
            'metode_kb' => isset($data->metode_kb) ? $data->metode_kb : '-',
            'infeksi_oportunistik_id' => $data->infeksi_oportunistik_id,
            'infeksi_oportunistik' => isset($data->infeksi_oportunistik_id) ? $data->infeksiOportunistik->nama : '-',
            'obat_untuk_io' => isset($data->obat_untuk_io) ? $data->obat_untuk_io : '-',
            'status_tb_id' => $data->status_tb_id,
            'status_tb' => isset($data->status_tb_id) ? $data->statusTb->nama : '-',
            'ppk' => isset($data->ppk) ? $data->ppk : '-',
            'paduan_art_id' => $data->paduan_art_id,
            'paduan_art' => isset($data->paduan_art_id) ? $data->paduanArt->nama : '-',
            'dosis' => isset($data->dosis) ? $data->dosis : '-',
            'adherence_art_id' => isset($data->adherence_art_id) ? $data->adherence_art_id : '-',
            'adherence_art' => isset($data->adherence_art_id) ? $data->adherenceArt->nama : '-',
            'efek_samping_id' => isset($data->efek_samping_id) ? $data->efek_samping_id : '-',
            'efek_samping' => isset($data->efek_samping_id) ? $data->efekSamping : '-',
            'jumlah_cd4' => isset($data->jumlah_cd4) ? $data->jumlah_cd4 : '-',
            'viral_load' => isset($data->viral_load) ? $data->viral_load : '-',
            'hasil_lab' => isset($data->hasil_lab) ? $data->hasil_lab : '-',
            'diberi_kondom' => isset($data->diberi_kondom) ? $data->diberi_kondom : '-',
            'status_fungsional_id' => isset($data->status_fungsional_id) ? $data->status_fungsional_id : '-',
            'status_fungsional' => isset($data->status_fungsional_id) ? $data->statusFungsional->nama : '-',
            'rujuk_ke_spesialis' => isset($data->rujuk_ke_spesialis) ? $data->rujuk_ke_spesialis : '-'
        ];
    }

    public static function jumlahPasienTelatFollowup(){
        $today = date('Y-m-d');
        $pasien = Pasien::whereIn('status_aktif', ['Aktif', 'Tidak Aktif'])->where(['deleted' => 0])->get()->pluck('id');
        $data =  RiwayatPerawatanPasien::select('pasien_id', DB::raw('MAX(rencana_kunjungan_selanjutnya) as tanggal'))->havingRaw('MAX(rencana_kunjungan_selanjutnya) < ?', [$today])->where(['deleted' => 0])->whereIn('pasien_id', $pasien)->groupBy('pasien_id')->orderBy('tanggal', 'DESC')->count();
        return $data;

    }

    public static function pasienTelatFollowup(){
        $today = date('Y-m-d');
        $pasien = Pasien::whereIn('status_aktif', ['Aktif', 'Tidak Aktif'])->where(['deleted' => 0])->get()->pluck('id');
        $data = RiwayatPerawatanPasien::select( DB::raw('MAX(rencana_kunjungan_selanjutnya) as tanggal, pasien_id'))
        ->havingRaw('MAX(rencana_kunjungan_selanjutnya) < ?', [$today])->where(['deleted' => 0])->whereIn('pasien_id', $pasien)->groupBy('pasien_id')->orderBy('tanggal', 'DESC')->get();
        return $data;
    }

    public static function jumlahPasienAkanFollowup(){
        $from = Carbon::now()->subDays(1);
        $to = Carbon::now()->addDays(7);
        $pasien = Pasien::whereIn('status_aktif', ['Aktif', 'Tidak Aktif'])->where(['deleted' => 0])->get()->pluck('id');
        return RiwayatPerawatanPasien::select('pasien_id')->whereBetween('rencana_kunjungan_selanjutnya',[$from, $to])->where(['deleted' => 0])->whereIn('pasien_id', $pasien)->orderBy('rencana_kunjungan_selanjutnya', 'DESC')->groupBy('pasien_id')->count();
    }

    public static function pasienAkanFollowup(){
        $from = Carbon::now()->subDays(1);
        $to = Carbon::now()->addDays(7);
        $pasien = Pasien::whereIn('status_aktif', ['Aktif', 'Tidak Aktif'])->where(['deleted' => 0])->get()->pluck('id');
        return RiwayatPerawatanPasien::select('pasien_id', 'rencana_kunjungan_selanjutnya as tanggal')->whereBetween('rencana_kunjungan_selanjutnya',[$from, $to])->where(['deleted' => 0])->whereIn('pasien_id', $pasien)->orderBy('rencana_kunjungan_selanjutnya', 'DESC')->get();
        
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
            $pasien->where('status_fungsional_id', $statusFungsional);
        }
        if($hamil){
            $pasien->where('hamil', $hamil);
        }
        if($infeksiOportunistik){
            $pasien->where('infeksi_oportunistik_id', $infeksiOportunistik);
        }
        if($statusTb){
            $pasien->where('status_tb_id', $statusTb);
        }
        if($ppk){
            $pasien->where('ppk', $ppk);
        }
        if($adherence){
            $pasien->where('adherence_art_id', $adherence);
        }
        if($efekSamping){
            $pasien->where('efek_samping_id', $efekSamping);
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
