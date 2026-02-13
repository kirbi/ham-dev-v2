<?php

namespace App\Http\Controllers;

use App\Models\{
    AlasanSubsitusi,
    AlasanSubstitusi,
    CheckHiv,
    EntryPoint,
    IndikasiInisiasiArt,
    JenisKelamin,
    JenisTerapi,
    Kabupaten,
    KonselingHiv,
    Konselor,
    KategoriPemeriksaan,
    KlasifikasiTb,
    MitraSeksual,
    PaduanArt,
    PaduanTb,
    Pasien,
    Pekerjaan,
    Pendidikan,
    Provinsi,
    RiwayatPerawatanPasien,
    SosialisasiHiv,
    StatusFungsional,
    StatusPernikahan,
    StatusHiv,
    TempatTerapi,
    TipeTb,
    AdherenceArt,
    EfekSamping,
    InfeksiOportunistik,
    StatusTb};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Mpdf\Mpdf;
// use  Mpdf\Mpdf as PDF;
use App\XlsTemplate\{
     CheckHivXlsx,
     FollowUpXlsx,
     KonselingXlsx,
     PasienXlsx,
     SosialisasiHivXlsx
};
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

use Illuminate\Support\Carbon;

use DataTables;

class DownloadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pasien(Request $request)
    {
        $tahun = Pasien::select(DB::raw('YEAR(tanggal_konfirmasi_hiv) as tahun'))->where(['deleted' => 0])->orderBy('tanggal_konfirmasi_hiv', 'desc')->distinct()->get();
        $pekerjaan = Pekerjaan::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        $pendidikan = Pendidikan::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        $statusPernikahan = StatusPernikahan::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        $tempatTerapi =  TempatTerapi::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        $iiArt = IndikasiInisiasiArt::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        $entryPoint = EntryPoint::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        $provinsi = Provinsi::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        
        return view('admin.download.pasien', compact(
            'pekerjaan',
            'pendidikan',
            'statusPernikahan',
            'tahun',
            'entryPoint',
            'iiArt',
            'provinsi'
        ));
    }

    public function downloadPasien(Request $request)
    {
          if($request->tahun){
               $tahun = $request->tahun == 'Semua' ? null : $request->tahun;
          }else{
               $tahun = date('Y');
          }
          $pasien= Pasien::filterPasienPositif(
          null,
          null,
          $tahun,
          $request->bulan,
          $request->statusAktif,
          $request->jenisPasien,
          $request->pendidikan,
          $request->statusPernikahan,
          $request->pekerjaan,
          $request->entryPoint,
          $request->id_provinsi,
          $request->id_kabupaten,
          $request->id_kecamatan,
          $request->id_desa)->orderBy('nama', 'ASC')->get();
          
          $bulan = '';
          if($request->bulan){
               $bulan = ' Bulan '.$request->bulan;
          }
          $i=0;
          $datas =[];
          foreach($pasien as $data){
               $datas[$i]['i'] = $i+1;
               $datas[$i]['nama'] = isset($data->nama) ? $data->nama:'-';
               $datas[$i]['jenis_kelamin'] = isset($data->jenis_kelamin) ? $data->jenis_kelamin:'-';
               $datas[$i]['nik'] = isset($data->nik) ? $data->nik:'-';
               $datas[$i]['kk'] = isset($data->no_kk) ? $data->no_kk:'-';
               $datas[$i]['tgl_lahir'] = isset($data->tanggal_lahir) ? $data->tanggal_lahir:'-';
               $datas[$i]['umur'] = isset($data->tanggal_lahir) ? Carbon::parse($data->tanggal_lahir)->age:'-';
               $datas[$i]['entry_point'] = isset($data->id_entry_point) && isset($data->entryPoint) ? $data->entryPoint->nama:'-';
               $datas[$i]['pendidikan'] = isset($data->id_pendidikan_terakhir) && isset($data->pendidikan) ? $data->pendidikan->nama:'-';
               $datas[$i]['pekerjaan'] = isset($data->id_pekerjaan) && isset($data->pekerjaan) ? $data->pekerjaan->nama:'-';
               $datas[$i]['status_pernikahan'] = isset($data->id_status_pernikahan) && isset($data->statusPernikahan) ? $data->statusPernikahan->nama:'-';
               $datas[$i]['panesum'] = isset($data->riwayatMitraSeksuals) ? count($data->riwayatMitraSeksuals):'0';
               $datas[$i]['status_hiv'] = isset($data->status_hiv) ? $data->status_hiv:'-';
               $datas[$i]['jenis_pasien'] = isset($data->jenis_pasien) ? $data->jenis_pasien:'-';
               $datas[$i]['status_aktif'] = isset($data->status_aktif) ? $data->status_aktif:'-';
               $datas[$i]['tanggal_konfirmasi_hiv'] = isset($data->tanggal_konfirmasi_hiv) ? $data->tanggal_konfirmasi_hiv:'-';
               $datas[$i]['tanggal_konfirmasi_aids'] = isset($data->tanggal_konfirmasi_aids) ? $data->tanggal_konfirmasi_aids:'-';
               $datas[$i]['tanggal_rujuk_masuk'] = isset($data->tanggal_rujuk_masuk) ? $data->tanggal_rujuk_masuk:'-';
               $datas[$i]['tanggal_rujuk_keluar'] = isset($data->tanggal_rujuk_keluar) ? $data->tanggal_rujuk_keluar:'-';
               $datas[$i]['tanggal_meninggal'] = isset($data->tanggal_meninggal) ? $data->tanggal_meninggal:'-';
               $datas[$i]['tanggal_masuk'] = isset($data->tanggal_masuk) ? $data->tanggal_masuk:'-';
               $datas[$i]['tempat_rujuk_keluar'] = isset($data->tempat_rujuk_keluar) ? $data->tempat_rujuk_keluar:'-';
               $datas[$i]['penularan'] = isset($data->id_iiart) && isset($data->iiart) ? $data->iiart->nama:'-';
               $datas[$i]['tempat_pdp'] = isset($data->tempat_pdp) ? $data->tempat_pdp:'-';
               $i++;
          }
          
          $tahun = $tahun == null ? 'Semua' : $tahun;
          if($request->file == 'pdf'){
               $content = view('admin.download.pasienPDF', compact('datas', 'tahun'));
               $mpdf= new Mpdf([
                    'mode' => 'utf-8',
                    'format' => 'A4',
                    'default_font_size' => 0,
                    'default_font ' => '',
                    'margin_left' => 15,
                    'margin_right' => 15,
                    'margin_top' => 5,
                    'margin_bottom' => 16,
                    'margin_header' => 9,
                    'margin_footer' => 9,
                    'orientation' => 'L'
               ]);
               $mpdf->WriteHTML($content);
               $mpdf->Output('Laporan Pasien HKBP AIDS MINISTRY Tahun '.$tahun.''.$bulan.'_Generated_'.date('Y-m-d H:i:s').'.pdf', "D");
          }
          
          if($request->file =='excel'){
               (new PasienXlsx($datas))->execute();
          }
    }

    public function konseling(Request $request)
    {
        $tahun = Pasien::select(DB::raw('YEAR(tanggal_konfirmasi_hiv) as tahun'))->where(['deleted' => 0])->orderBy('tanggal_konfirmasi_hiv', 'desc')->distinct()->get();
        $statusPernikahan = StatusPernikahan::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        
        return view('admin.download.konseling', compact(
            'tahun',
            'statusPernikahan',
            
        ));
    }
    public function downloadKonseling(Request $request)
    {
          if($request->tahun){
               $tahun = $request->tahun;
          }else{
               $tahun = date('Y');
          }

          $konseling = KonselingHiv::filterKonselingHiv(
               null,
               $tahun,
               $request->bulan,
               null,
               null,
               null)->orderBy('tanggal_konseling', 'ASC')->get();
          
          $bulan = '';
          if($request->bulan){
               $bulan = ' Bulan '.$request->bulan;
          }
          $i=0;
          $datas =[];
          foreach($konseling as $data){
               $kr = '';
               if(count($data->kelompokResikoKonseling) > 0){
                    foreach($data->kelompokResikoKonseling as $kl){
                         $kr .= $kl->kelompokResiko->nama.', ';
                    }
               };
               $datas[$i]['i'] = $i+1;
               $datas[$i]['nama'] = isset($data->id_pasien) && isset($data->pasien) ? $data->pasien->nama:'-';
               $datas[$i]['jenis_kelamin'] = isset($data->id_pasien) && isset($data->pasien) ? $data->pasien->jenis_kelamin:'-';
               $datas[$i]['nik'] = isset($data->id_pasien) && isset($data->pasien)  ? $data->pasien->nik:'-';
               $datas[$i]['kk'] = isset($data->id_pasien) && isset($data->pasien) ? $data->pasien->no_kk:'-';
               $datas[$i]['umur'] = isset($data->id_pasien) && isset($data->pasien) ? Carbon::parse($data->pasien->tanggal_lahir)->diff(Carbon::parse($data->tanggal_konseling))->format('%y Tahun'):'-';
               $datas[$i]['tanggal_test'] = isset($data->tesHivKonseling) ? $data->tesHivKonseling->tanggal_tes:'-';
               $datas[$i]['pendidikan'] = isset($data->id_pendidikan) && isset($data->pendidikan) ? $data->pendidikan->nama:'-';
               $datas[$i]['pekerjaan'] = isset($data->id_pekerjaan) && isset($data->pekerjaan) ? $data->pekerjaan->nama:'-';
               $datas[$i]['status_pernikahan'] = isset($data->id_status_pernikahan) && isset($data->statusPernikahan) ? $data->statusPernikahan->nama:'-';
               $datas[$i]['kategori_penularan'] = $kr;
               $datas[$i]['status_hiv'] = isset($data->status_hiv) ? $data->status_hiv:'-';
               $datas[$i]['jenis_pasien'] = isset($data->pasien->jenis_pasien) ? $data->pasien->jenis_pasien:'-';
               $datas[$i]['status_aktif'] = isset($data->pasien->status_aktif) ? $data->pasien->status_aktif:'-';
               $i++;
          }
          
          if($request->file == 'pdf'){
               $content = view('admin.download.konselingPDF', compact('datas', 'tahun'));
               $mpdf= new Mpdf([
                    'mode' => 'utf-8',
                    'format' => 'A4',
                    'default_font_size' => 0,
                    'default_font ' => '',
                    'margin_left' => 15,
                    'margin_right' => 15,
                    'margin_top' => 5,
                    'margin_bottom' => 16,
                    'margin_header' => 9,
                    'margin_footer' => 9,
                    'orientation' => 'L'
               ]);
               $mpdf->WriteHTML($content);
               $mpdf->Output('Laporan Pasien Konseling HKBP AIDS MINISTRY Tahun '.$tahun.''.$bulan.'_Generated_'.date('Y-m-d H:i:s').'.pdf', "D");
          }
          
          if($request->file =='excel'){
               (new KonselingXlsx($datas))->execute();
          }
    }
    
    /**
     * Display a listing of the resource follow up art.
     *
     * @return \Illuminate\Http\Response
     */
    public function followUp(Request $request)
    {
        $tahun = RiwayatPerawatanPasien::select(DB::raw('YEAR(tanggal_pengobatan) as tahun'))->where(['deleted' => 0])->orderBy('tanggal_pengobatan', 'desc')->distinct()->get();
        $adherenceArt = AdherenceArt::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        $efekSamping = EfekSamping::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        $infeksiOportunistik = InfeksiOportunistik::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        $paduanArt =  PaduanArt::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        $statusFungsional = StatusFungsional::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        $statusTb = StatusTb::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        
        return view('admin.download.followUp', compact(
            'adherenceArt',
            'efekSamping',
            'infeksiOportunistik',
            'paduanArt',
            'statusFungsional',
            'statusTb',
            'tahun'
        ));
    }

    public function downloadFollowUp(Request $request)
    {
          if($request->tahun){
               $tahun = $request->tahun;
          }else{
               $tahun = date('Y');
          }
          $ch= RiwayatPerawatanPasien::filterFollowUp(
               $request->jenis_kelamin,
               $tahun,
               $request->bulan,
               $request->statusFungsional,
               $request->hamil,
               $request->infeksiOportunistik,
               $request->statusTb,
               $request->ppk,
               $request->adherenceArt,
               $request->efekSamping,
               $request->diberiKondom,
               $request->rujukKeSpesialis,
               $request->cd4,
               $request->operator)->orderBy('tanggal_pengobatan', 'ASC')->get();
          $i=0;
          $datas =[];
          foreach($ch as $data){
               $datas[$i]['i'] = $i+1;
               $datas[$i]['nama'] = isset($data->id_pasien) && isset($data->pasien) ? $data->pasien->nama:'-';
               $datas[$i]['jenis_kelamin'] = isset($data->id_pasien) && isset($data->pasien) ? $data->pasien->jenis_kelamin:'-';
               $datas[$i]['nik'] = isset($data->id_pasien) && isset($data->pasien) ? $data->pasien->nik:'-';
               $datas[$i]['tgl_followup'] = isset($data->tanggal_pengobatan) ? $data->tanggal_pengobatan:'-';
               $datas[$i]['bb'] = isset($data->berat_badan) ? $data->berat_badan:'-';
               $datas[$i]['tb'] = isset($data->tinggi_badan) ? $data->tinggi_badan:'-';
               $datas[$i]['status_fungsional'] = isset($data->id_status_fungsional) && isset($data->statusFungsional) ? $data->statusFungsional->nama:'-';
               $datas[$i]['who'] = isset($data->stadium_who) ? $data->stadium_who:'-';
               $datas[$i]['hamil'] = isset($data->hamil) ? $data->hamil:'-';
               $datas[$i]['infeksi_oportunistik'] = isset($data->id_infeksi_oportunistik) && isset($data->infeksiOportunistik) ? $data->infeksiOportunistik->nama:'-';
               $datas[$i]['obat_io'] = isset($data->obat_untuk_io) ? $data->obat_untuk_io:'-';
               $datas[$i]['tb'] = isset($data->id_status_tb) && isset($data->statusTb) ? $data->statusTb->nama:'-';
               $datas[$i]['ppk'] = isset($data->ppk) ? $data->ppk:'-';
               $datas[$i]['arv'] = isset($data->id_paduan_art) && isset($data->paduanArt) ? $data->paduanArt->nama:'-';
               $datas[$i]['dosis_arv'] = isset($data->dosis) ? $data->dosis:'-';
               $datas[$i]['adherence_art'] = isset($data->id_adherence_art) && isset($data->paduanArt) ? $data->paduanArt->nama:'-';
               $datas[$i]['efek_art'] = isset($data->id_efek_samping) && isset($data->efekSamping) ? $data->efekSamping->nama:'-';
               $datas[$i]['cd4'] = isset($data->jumlah_cd4) ? $data->jumlah_cd4:'-';
               $datas[$i]['kondom'] = isset($data->diberi_kondom) ? $data->diberi_kondom:'-';
               $datas[$i]['rujuk'] = isset($data->rujuk_ke_spesialis) ? $data->rujuk_ke_spesialis:'-';
               $i++;
          }
          if($request->file =='pdf'){
               $bulan = '';
               if($request->bulan){
                    $bulan = ' Bulan '.$request->bulan;
               }
               $content = view('admin.download.followUpPDF', compact('datas', 'tahun'));
               $mpdf= new Mpdf([
                    'mode' => 'utf-8',
                    'format' => 'A4',
                    'default_font_size' => 0,
                    'default_font ' => '',
                    'margin_left' => 15,
                    'margin_right' => 15,
                    'margin_top' => 5,
                    'margin_bottom' => 16,
                    'margin_header' => 9,
                    'margin_footer' => 9,
                    'orientation' => 'L'
               ]);
               $mpdf->WriteHTML($content);
               $mpdf->Output('Laporan Follow Up Perawatan Pasien HKBP AIDS MINISTRY Tahun '.$tahun.''.$bulan.'_Generated_'.date('Y-m-d H:i:s').'.pdf', "D");
          }
          
          if($request->file =='excel'){
               (new FollowUpXlsx($datas))->execute();
          }
    }

    public function konselor(Request $request)
    {
        $tahun = RiwayatPerawatanPasien::select(DB::raw('YEAR(tanggal_pengobatan) as tahun'))->where(['deleted' => 0])->orderBy('tanggal_pengobatan', 'desc')->distinct()->get();
        $adherenceArt = AdherenceArt::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        $efekSamping = EfekSamping::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        $infeksiOportunistik = InfeksiOportunistik::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        $paduanArt =  PaduanArt::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        $statusFungsional = StatusFungsional::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        $statusTb = StatusTb::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        
        return view('admin.download.konselor', compact(
            'adherenceArt',
            'efekSamping',
            'infeksiOportunistik',
            'paduanArt',
            'statusFungsional',
            'statusTb',
            'tahun'
        ));
    }
    public function downloadKonselor(Request $request)
    {
           
           if($request->tahun){
                $tahun = $request->tahun;
           }else{
                $tahun =date('Y');
           }
        
           $mounth = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];
           $data = [];
           $i = 0;
           foreach($mounth as $m){
                $data['jumlah'][$i] = RiwayatPerawatanPasien::filterFollowUp(
                    null,
                    $tahun,
                    $m,
                    $request->statusFungsional,
                    $request->hamil,
                    $request->infeksiOportunistik,
                    $request->statusTb,
                    $request->ppk,
                    $request->adherenceArt,
                    $request->efekSamping,
                    $request->diberiKondom,
                    $request->rujukKeSpesialis,
                    $request->cd4,
                    $request->operator)->count();
                    $i++;
           }
           return response()->json([
                'data' => $data
            ]);
    }
    
    public function checkHiv(Request $request)
    {
        $tahun = CheckHiv::select(DB::raw('YEAR(tanggal_kegiatan) as tahun'))->where(['deleted' => 0])->orderBy('tanggal_kegiatan', 'desc')->distinct()->get();
        $kabupaten = Kabupaten::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        return view('admin.download.checkHiv', compact(
            'kabupaten',
            'tahun'
        ));
    }
    public function konselorCheckHiv(Request $request)
    {
        $tahun = CheckHiv::select(DB::raw('YEAR(tanggal_kegiatan) as tahun'))->where(['deleted' => 0])->orderBy('tanggal_kegiatan', 'desc')->distinct()->get();
        $kabupaten = Kabupaten::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        return view('konselor.download.checkHiv', compact(
            'kabupaten',
            'tahun'
        ));
    }
   
    public function downloadCheckHiv(Request $request)
    {
          if($request->tahun){
               $tahun = $request->tahun;
          }else{
               $tahun =date('Y');
          }
          $ch= CheckHiv::filterCheckHivBulanan($tahun, $request->bulan, $request->id_kabupaten, $request->id_kecamatan)->orderBy('tanggal_kegiatan', 'ASC')->get();
          $i=0;
          $datas =[];
          
          $bulan = '';
          if($request->bulan){
               $bulan = ' Bulan '.$request->bulan;
          }
          foreach($ch as $data){
               $datas[$i]['i'] = $i+1;
               $datas[$i]['tanggal_kegiatan'] = isset($data->tanggal_kegiatan) ? $data->tanggal_kegiatan:'-';
               $datas[$i]['nama_tempat'] = isset($data->nama_tempat) ? $data->nama_tempat:'-';
               $datas[$i]['kabupaten'] = isset($data->id_kabupaten) && isset($data->kabupaten) ? $data->kabupaten->nama:'-';
               $datas[$i]['kecamatan'] = isset($data->id_kecamatan) && isset($data->kecamatan) ? $data->kecamatan->nama:'-';
               $datas[$i]['deskripsi_kegiatan'] = isset($data->deskripsi_kegiatan) ? $data->deskripsi_kegiatan:'-';
               $datas[$i]['jumlah_positif'] = isset($data->jumlah_positif) ? $data->jumlah_positif:'0';
               $datas[$i]['jumlah_negatif'] = isset($data->jumlah_negatif) ? $data->jumlah_negatif:'0';
               $datas[$i]['hadir'] = isset($data->hadir) ? $data->hadir:'0';
               $datas[$i]['nama_narahubung'] = isset($data->nama_narahubung) ? $data->nama_narahubung:'-';
               $datas[$i]['kontak_narahubung'] = isset($data->kontak_narahubung) ? $data->kontak_narahubung:'-';
               $i++;
          }
          // dd($datas);
          if($request->file =='pdf'){
               $content = view('admin.download.checkHivPDF', compact('datas', 'tahun'));
               $mpdf= new Mpdf([
                    'mode' => 'utf-8',
                    'format' => 'A4',
                    'default_font_size' => 0,
                    'default_font ' => '',
                    'margin_left' => 15,
                    'margin_right' => 15,
                    'margin_top' => 5,
                    'margin_bottom' => 16,
                    'margin_header' => 9,
                    'margin_footer' => 9,
                    'orientation' => 'L'
               ]);
               $mpdf->WriteHTML($content);
               $mpdf->Output('Laporan Kegiatan Check HIV HKBP AIDS MINISTRY Tahun '.$tahun.''.$bulan.'_Generated_'.date('Y-m-d H:i:s').'.pdf', "D");
          }
          if($request->file =='excel'){
               (new CheckHivXlsx($datas))->execute();
          }
    }

    public function sosialisasiHiv(Request $request)
    {
        $tahun = SosialisasiHiv::select(DB::raw('YEAR(tanggal_kegiatan) as tahun'))->where(['deleted' => 0])->orderBy('tanggal_kegiatan', 'desc')->distinct()->get();
        $kabupaten = Kabupaten::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        return view('admin.download.sosialisasiHiv', compact(
            'kabupaten',
            'tahun'
        ));
    }
    public function konselorSosialisasiHiv(Request $request)
    {
        $tahun = SosialisasiHiv::select(DB::raw('YEAR(tanggal_kegiatan) as tahun'))->where(['deleted' => 0])->orderBy('tanggal_kegiatan', 'desc')->distinct()->get();
        $kabupaten = Kabupaten::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        return view('konselor.download.sosialisasiHiv', compact(
            'kabupaten',
            'tahun'
        ));
    }
    
    public function downloadSosialisasiHiv(Request $request)
    {
           
          if($request->tahun){
               $tahun = $request->tahun;
          }else{
               $tahun =date('Y');
          }
          $ch = SosialisasiHiv::filterCheckHivBulanan($tahun, $request->bulan, $request->id_kabupaten, $request->id_kecamatan)->orderBy('tanggal_kegiatan', 'ASC')->get();
          $i=0;
          $bulan = '';
          if($request->bulan){
               $bulan = ' Bulan '.$request->bulan;
          }
          $datas =[];
          foreach($ch as $data){
               $datas[$i]['i'] = $i+1;
               $datas[$i]['tanggal_kegiatan'] = isset($data->tanggal_kegiatan) ? $data->tanggal_kegiatan:'-';
               $datas[$i]['tempat_kegiatan'] = isset($data->tempat_kegiatan) ? $data->tempat_kegiatan:'-';
               $datas[$i]['kabupaten'] = isset($data->id_kabupaten) && isset($data->kabupaten) ? $data->kabupaten->nama:'-';
               $datas[$i]['kecamatan'] = isset($data->id_kecamatan) && isset($data->kecamatan) ? $data->kecamatan->nama:'-';
               $datas[$i]['target_kegiatan'] = isset($data->target_kegiatan) ? $data->target_kegiatan:'-';
               $datas[$i]['nama_kegiatan'] = isset($data->nama_kegiatan) ? $data->nama_kegiatan:'-';
               $datas[$i]['peserta_hadir'] = isset($data->peserta_hadir) ? $data->peserta_hadir:'0';
               $datas[$i]['nama_narahubung'] = isset($data->nama_narahubung) ? $data->nama_narahubung:'-';
               $datas[$i]['kontak_narahubung'] = isset($data->kontak_narahubung) ? $data->kontak_narahubung:'-';
               $i++;
          }
          if($request->file == 'pdf'){
               $content = view('admin.download.sosialisasiHivPDF', compact('datas', 'tahun'));
               $mpdf= new Mpdf([
                    'mode' => 'utf-8',
                    'format' => 'A4',
                    'default_font_size' => 0,
                    'default_font ' => '',
                    'margin_left' => 15,
                    'margin_right' => 15,
                    'margin_top' => 5,
                    'margin_bottom' => 16,
                    'margin_header' => 9,
                    'margin_footer' => 9,
                    'orientation' => 'L'
               ]);
               $mpdf->WriteHTML($content);
               $mpdf->Output('Laporan Kegiatan Sosialisasi HIV HKBP AIDS MINISTRY Tahun '.$tahun.' '.$bulan.'_Generated_'.date('Y-m-d H:i:s').'.pdf', "D");
          }
          if($request->file =='excel'){
               (new SosialisasiHivXlsx($datas))->execute();
          }
    }
}
