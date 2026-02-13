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
    KonselingHiv,
    StatusTb};
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use DataTables;

class DashboardKonselorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexPasienTahunan(Request $request)
    {
        if ($request->ajax()) {
           $data = [];
           $i = 0;
           $tahun= date('Y');
           for($j=$tahun-4;$j<=$tahun; $j++){
                $data['label'][$i] = $j;
                $data['lakilaki'][$i] = Pasien::filterPasienPositif(
                    'Laki-laki',
                    ['Positif', 'AIDS'],
                    $j)->count();
                $data['perempuan'][$i] = Pasien::filterPasienPositif(
                    'Perempuan',
                    ['Positif', 'AIDS'],
                    $j)->count();
                $i++;
           }
           return response()->json([
                'data' => $data
            ]);
        }
        $tahun = Pasien::select(DB::raw('YEAR(tanggal_masuk) as tahun'))->where(['deleted' => 0])->orderBy('tanggal_masuk', 'desc')->distinct()->get();
        $pekerjaan = Pekerjaan::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        $pendidikan = Pendidikan::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        $statusPernikahan = StatusPernikahan::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        $tempatTerapi =  TempatTerapi::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        $iiArt = IndikasiInisiasiArt::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        $entryPoint = EntryPoint::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        
        return view('konselor.dashboard.indexPasienTahunan', compact(
            'pekerjaan',
            'pendidikan',
            'statusPernikahan',
            'tahun',
            'entryPoint',
            'iiArt',
        ));
    }

    public function indexPasienTahunanFilter(Request $request)
    {
           
           if($request->tahun_mulai && $request->tahun_akhir){
                $mulai = $request->tahun_mulai;
                $akhir = $request->tahun_akhir;
           }else if ($request->tahun_mulai && !$request->tahun_akhir){
                $mulai = $request->tahun_mulai;
                $tahun = Pasien::select(DB::raw('YEAR(tanggal_masuk) as tahun'))->where(['deleted' => 0])->orderBy('tanggal_masuk', 'desc')->distinct()->limit(1)->get();
                $akhir = $tahun[0]->tahun;
           }else if (!$request->tahun_mulai && $request->tahun_akhir){
                $mulai = $request->tahun_mulai;
                $tahun = Pasien::select(DB::raw('YEAR(tanggal_masuk) as tahun'))->where(['deleted' => 0])->orderBy('tanggal_masuk', 'asc')->distinct()->limit(1)->get();
                $akhir = $tahun[0]->tahun;
           }else{
                $mulai = date('Y')-4;
                $akhir = date('Y');
           }
        
           $data = [];
           $i = 0;
           for($mulai; $mulai<=$akhir; $mulai++){
                $data['label'][$i] = $mulai;
                $data['lakilaki'][$i] = Pasien::filterPasienPositif(
                    'Laki-laki',
                    ['Positif', 'AIDS'],
                    $mulai,
                    null,
                    $request->statusAktif,
                    $request->jenisPasien,
                    $request->pendidikan,
                    $request->statusPernikahan,
                    $request->pekerjaan,
                    $request->entryPoint)->count();
                $data['perempuan'][$i] = Pasien::filterPasienPositif(
                    'Perempuan',
                    ['Positif', 'AIDS'],
                    $mulai,
                    null,
                    $request->statusAktif,
                    $request->jenisPasien,
                    $request->pendidikan,
                    $request->statusPernikahan,
                    $request->pekerjaan,
                    $request->entryPoint)->count();
                $i++;
           }
           return response()->json([
                'data' => $data
            ]);
    }
    
    public function indexPasienHidupMati(Request $request)
    {
        if ($request->ajax()) {
           $data = [];
           $i = 0;
           $tahun= date('Y');
           for($j=$tahun-4;$j<=$tahun; $j++){
                $data['label'][$i] = $j;
                $data['hidup'][$i] = Pasien::where(['deleted' => 0])->whereYear('tanggal_masuk', $tahun)->whereIn('status_aktif', ['Aktif', 'Hilang Kontak', 'Tidak Aktif'])->get()->count();
                $data['mati'][$i] =  Pasien::where(['deleted' => 0])->whereYear('tanggal_masuk', $tahun)->whereIn('status_aktif', ['Meninggal'])->get()->count();
                $data['rujuk'][$i] =  Pasien::where(['deleted' => 0])->whereYear('tanggal_masuk', $tahun)->whereIn('status_aktif', ['Dirujuk'])->get()->count();
                $i++;
           }
           return response()->json([
                'data' => $data
            ]);
        }
        $tahun = Pasien::select(DB::raw('YEAR(tanggal_masuk) as tahun'))->where(['deleted' => 0])->orderBy('tanggal_masuk', 'desc')->distinct()->get();
       
        return view('konselor.dashboard.indexPasienHidupMati', compact(
            'tahun'
        ));
    }

    public function indexPasienHidupMatiFilter(Request $request)
    {
           if($request->tahun_mulai && $request->tahun_akhir){
                $mulai = $request->tahun_mulai;
                $akhir = $request->tahun_akhir;
           }else if ($request->tahun_mulai && !$request->tahun_akhir){
                $mulai = $request->tahun_mulai;
                $tahun = Pasien::select(DB::raw('YEAR(tanggal_masuk) as tahun'))->where(['deleted' => 0])->orderBy('tanggal_masuk', 'desc')->distinct()->limit(1)->get();
                $akhir = $tahun[0]->tahun;
           }else if (!$request->tahun_mulai && $request->tahun_akhir){
                $mulai = $request->tahun_mulai;
                $tahun = Pasien::select(DB::raw('YEAR(tanggal_masuk) as tahun'))->where(['deleted' => 0])->orderBy('tanggal_masuk', 'asc')->distinct()->limit(1)->get();
                $akhir = $tahun[0]->tahun;
           }else{
                $mulai = date('Y')-4;
                $akhir = date('Y');
           }
        
           $data = [];
           $i = 0;
           for($mulai; $mulai<=$akhir; $mulai++){
                $data['label'][$i] = $mulai;
                $data['hidup'][$i] = Pasien::where(['deleted' => 0])->whereYear('tanggal_masuk', $mulai)->whereIn('status_aktif', ['Aktif', 'Hilang Kontak', 'Tidak Aktif'])->get()->count();
                $data['mati'][$i] =  Pasien::where(['deleted' => 0])->whereYear('tanggal_masuk', $mulai)->whereIn('status_aktif', ['Meninggal'])->get()->count();
                $data['rujuk'][$i] =  Pasien::where(['deleted' => 0])->whereYear('tanggal_masuk', $mulai)->whereIn('status_aktif', ['Dirujuk'])->get()->count();
                $i++;
           }
           return response()->json([
                'data' => $data
            ]);
    }

    public function indexPasienPenularan(Request $request)
    {
        if ($request->ajax()) {
           $data = [];
           $i = 0;
           $akhir= date('Y');
           $mulai= date('Y') - 4;
           $datas = IndikasiInisiasiArt::where('deleted', 0)->get();
           foreach($datas as $k){
                $data['label'][$i] = $k->nama;
                $data['total'][$i] = Pasien::where(['deleted' => 0, 'id_iiart' => $k->id_iiart])->whereBetween(DB::raw('YEAR(tanggal_masuk) as tahun'), [$mulai, $akhir])->get()->count();
                $i++;
           }
           return response()->json([
                'data' => $data
            ]);
        }
        $tahun = Pasien::select(DB::raw('YEAR(tanggal_masuk) as tahun'))->where(['deleted' => 0])->orderBy('tanggal_masuk', 'desc')->distinct()->get();
       
        return view('konselor.dashboard.indexPasienPenularan', compact(
            'tahun'
        ));
    }

    public function indexPasienPenularanFilter(Request $request)
    {
           if($request->tahun_mulai && $request->tahun_akhir){
                $mulai = $request->tahun_mulai;
                $akhir = $request->tahun_akhir;
           }else if ($request->tahun_mulai && !$request->tahun_akhir){
                $mulai = $request->tahun_mulai;
                $tahun = Pasien::select(DB::raw('YEAR(tanggal_masuk) as tahun'))->where(['deleted' => 0])->orderBy('tanggal_masuk', 'desc')->distinct()->limit(1)->get();
                $akhir = $tahun[0]->tahun;
           }else if (!$request->tahun_mulai && $request->tahun_akhir){
                $mulai = $request->tahun_mulai;
                $tahun = Pasien::select(DB::raw('YEAR(tanggal_masuk) as tahun'))->where(['deleted' => 0])->orderBy('tanggal_masuk', 'asc')->distinct()->limit(1)->get();
                $akhir = $tahun[0]->tahun;
           }else{
                $mulai = date('Y')-4;
                $akhir = date('Y');
           }
        
           $data = [];
           $i = 0;
           $datas = IndikasiInisiasiArt::where('deleted', 0)->get();
           foreach($datas as $k){
                $data['label'][$i] = $k->nama;
                $data['total'][$i] = Pasien::where(['deleted' => 0, 'id_iiart' => $k->id_iiart])->whereBetween(DB::raw('YEAR(tanggal_masuk)'), [$mulai, $akhir])->get()->count();
                $i++;
           }
           return response()->json([
                'data' => $data
            ]);
    }

    public function indexPasienTahunanPersentase(Request $request)
    {
        if ($request->ajax()) {
            $data = [];
            $pasien = Pasien::filterPasienPositif(
                null,
                ['Positif', 'AIDS']
            );
            $total = $pasien->count();
            $satu = 0;
            $empat = 0;
            $empatbelas = 0;
            $sembilanbelas = 0;
            $duasembilan = 0;
            $tigasembilan = 0;
            $empatsembilan = 0;
            $limasembilan = 0;
            $enampuluh = 0;
            $tidakdiketahui = 0;
            foreach($pasien->get() as $p) {
                $umur = isset($p->tanggal_lahir) ? Carbon::parse($p->tanggal_lahir)->age : 99999;
                $satu = $satu + ($umur < 1 ? 1 : 0);
                $empat = $empat + ($umur >= 1 && $umur <= 4 ? 1 : 0);
                $empatbelas = $empatbelas +  ($umur >= 5 && $umur <= 14 ? 1 : 0);
                $sembilanbelas = $sembilanbelas +  ($umur >= 15 && $umur <= 19 ? 1 : 0);
                $duasembilan = $duasembilan +  ($umur >= 20 && $umur <= 29 ? 1 : 0);
                $tigasembilan = $tigasembilan +  ($umur >= 30 && $umur <= 39 ? 1 : 0);
                $empatsembilan = $empatsembilan +  ($umur >= 40 && $umur <= 49 ? 1 : 0);
                $limasembilan = $limasembilan +  ($umur >= 50 && $umur <= 59 ? 1 : 0);
                $enampuluh = $enampuluh +  ($umur >= 60 ? 1 : 0);
                $tidakdiketahui = $tidakdiketahui +  ($umur == 99999 ? 1 : 0);
            }
            
            $data['label'] = ['< 1 Tahun', '1-4 Tahun', '5-14 Tahun', '15-19 Tahun', '20-29 Tahun', '30-39 Tahun', '40-49 Tahun', '50-59 Tahun', '</= 60 Tahun', 'Tidak Melaporkan Usia'];
            $data['value'] = [
                $satu = $satu > 0 ? round($satu/$total*100, 2) : 0,
                $empat = $empat  > 0 ? round($empat/$total*100, 2) : 0,
                $empatbelas = $empatbelas > 0 ? round($empatbelas/$total*100, 2) : 0,
                $sembilanbelas = $sembilanbelas > 0 ? round($sembilanbelas/$total*100, 2) : 0,
                $duasembilan = $duasembilan > 0 ? round($duasembilan/$total*100, 2) : 0,
                $tigasembilan = $tigasembilan > 0 ? round($tigasembilan/$total*100, 2) : 0,
                $empatsembilan = $empatsembilan > 0 ? round($empatsembilan/$total*100, 2) : 0,
                $limasembilan = $limasembilan > 0 ? round($limasembilan/$total*100, 2) : 0,
                $enampuluh = $enampuluh > 0 ? round($enampuluh/$total*100, 2) : 0,
                $tidakdiketahui = $tidakdiketahui > 0 ? round($tidakdiketahui/$total*100, 2) : 0,
            ];
            
            return response()->json([
                 'data' => $data
             ]);
         }
         $tahun = Pasien::select(DB::raw('YEAR(tanggal_masuk) as tahun'))->where(['deleted' => 0])->orderBy('tanggal_masuk', 'desc')->distinct()->get();
         $pekerjaan = Pekerjaan::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
         $pendidikan = Pendidikan::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
         $statusPernikahan = StatusPernikahan::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
         $tempatTerapi =  TempatTerapi::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
         $iiArt = IndikasiInisiasiArt::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
         $entryPoint = EntryPoint::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
         
         return view('konselor.dashboard.indexPasienTahunanPersentase', compact(
             'pekerjaan',
             'pendidikan',
             'statusPernikahan',
             'tahun',
             'entryPoint',
             'iiArt',
         ));
    }

    public function indexPasienTahunanPersentaseFilter(Request $request)
    {
        $data = [];
        $pasien = Pasien::filterPasienPositif(
            null,
            ['Positif', 'AIDS'],
            null,
            $request->statusAktif,
            $request->jenisPasien,
            $request->pendidikan,
            $request->statusPernikahan,
            $request->pekerjaan,
            $request->entryPoint
        );
        // dd($pasien);
        $total = $pasien->count();
        $satu = 0;
        $empat = 0;
        $empatbelas = 0;
        $sembilanbelas = 0;
        $duasembilan = 0;
        $tigasembilan = 0;
        $empatsembilan = 0;
        $limasembilan = 0;
        $enampuluh = 0;
        $tidakdiketahui = 0;
        foreach($pasien->get() as $p) {
            $umur = isset($p->tanggal_lahir) ? Carbon::parse($p->tanggal_lahir)->age : 99999;
            $satu = $satu + ($umur < 1 ? 1 : 0);
            $empat = $empat + ($umur >= 1 && $umur <= 4 ? 1 : 0);
            $empatbelas = $empatbelas +  ($umur >= 5 && $umur <= 14 ? 1 : 0);
            $sembilanbelas = $sembilanbelas +  ($umur >= 15 && $umur <= 19 ? 1 : 0);
            $duasembilan = $duasembilan +  ($umur >= 20 && $umur <= 29 ? 1 : 0);
            $tigasembilan = $tigasembilan +  ($umur >= 30 && $umur <= 39 ? 1 : 0);
            $empatsembilan = $empatsembilan +  ($umur >= 40 && $umur <= 49 ? 1 : 0);
            $limasembilan = $limasembilan +  ($umur >= 50 && $umur <= 59 ? 1 : 0);
            $enampuluh = $enampuluh +  ($umur >= 60 ? 1 : 0);
            $tidakdiketahui = $tidakdiketahui +  ($umur == 99999 ? 1 : 0);
        }
        
        $data['label'] = ['< 1 Tahun', '1-4 Tahun', '5-14 Tahun', '15-19 Tahun', '20-29 Tahun', '30-39 Tahun', '40-49 Tahun', '50-59 Tahun', '</= 60 Tahun', 'Tidak Melaporkan Usia'];
        $data['value'] = [
            $satu = $satu > 0 ? round($satu/$total*100, 2) : 0,
            $empat = $empat  > 0 ? round($empat/$total*100, 2) : 0,
            $empatbelas = $empatbelas > 0 ? round($empatbelas/$total*100, 2) : 0,
            $sembilanbelas = $sembilanbelas > 0 ? round($sembilanbelas/$total*100, 2) : 0,
            $duasembilan = $duasembilan > 0 ? round($duasembilan/$total*100, 2) : 0,
            $tigasembilan = $tigasembilan > 0 ? round($tigasembilan/$total*100, 2) : 0,
            $empatsembilan = $empatsembilan > 0 ? round($empatsembilan/$total*100, 2) : 0,
            $limasembilan = $limasembilan > 0 ? round($limasembilan/$total*100, 2) : 0,
            $enampuluh = $enampuluh > 0 ? round($enampuluh/$total*100, 2) : 0,
            $tidakdiketahui = $tidakdiketahui > 0 ? round($tidakdiketahui/$total*100, 2) : 0,
        ];
        
        return response()->json([
            'data' => $data
        ]);
    }

    public function indexPasienUmur(Request $request)
    {
        
        if ($request->ajax()) {
            $data = [];
            $i = 0;
            $tahun= date('Y');
            for($j=$tahun-4;$j<=$tahun; $j++){
                $data['label'][$i] = $j;
                $pasien = Pasien::filterPasienPositif(
                    null,
                    ['Positif', 'AIDS'],
                    $j
                );
                $satutujuh = 0;
                $tigakosong = 0;
                $empatkosong = 0;
                $empatsatu = 0;
                $tidakdiketahui = 0;
                foreach($pasien->get() as $p) {
                    $umur = isset($p->tanggal_lahir) ? Carbon::parse($p->tanggal_lahir)->diffInYears(Carbon::parse($p->tanggal_masuk)) : 99999;
                    $satutujuh = $satutujuh + ($umur >= 0 && $umur <= 17 ? 1 : 0);
                    $tigakosong = $tigakosong +  ($umur >= 18 && $umur <= 30 ? 1 : 0);
                    $empatkosong = $empatkosong +  ($umur >= 31 && $umur <= 40 ? 1 : 0);
                    $empatsatu = $empatsatu +  ($umur >= 41 ? 1 : 0);
                    $tidakdiketahui = $tidakdiketahui + ($umur == 99999 ? 1 : 0);
                }
                $data['satu'][$i] = $satutujuh;
                $data['dua'][$i] = $tigakosong;
                $data['tiga'][$i] = $empatkosong;
                $data['empat'][$i] = $empatsatu;
                $data['lima'][$i] = $tidakdiketahui;
                $i++;
            }
            
            return response()->json([
                 'data' => $data
            ]);
         }
         $tahun = Pasien::select(DB::raw('YEAR(tanggal_masuk) as tahun'))->where(['deleted' => 0])->orderBy('tanggal_masuk', 'desc')->distinct()->get();
         return view('konselor.dashboard.indexPasienUmur', compact(
             'tahun'));
    }

    public function indexPasienUmurFilter(Request $request)
    {
        $data = [];
        $i = 0;
        if($request->tahun_mulai && $request->tahun_akhir){
            $mulai = $request->tahun_mulai;
            $akhir = $request->tahun_akhir;
       }else if ($request->tahun_mulai && !$request->tahun_akhir){
            $mulai = $request->tahun_mulai;
            $tahun = Pasien::select(DB::raw('YEAR(tanggal_masuk) as tahun'))->where(['deleted' => 0])->orderBy('tanggal_masuk', 'desc')->distinct()->limit(1)->get();
            $akhir = $tahun[0]->tahun;
       }else if (!$request->tahun_mulai && $request->tahun_akhir){
            $mulai = $request->tahun_mulai;
            $tahun = Pasien::select(DB::raw('YEAR(tanggal_masuk) as tahun'))->where(['deleted' => 0])->orderBy('tanggal_masuk', 'asc')->distinct()->limit(1)->get();
            $akhir = $tahun[0]->tahun;
       }else{
            $mulai = date('Y')-4;
            $akhir = date('Y');
       }
    
       $data = [];
       $i = 0;
       for($mulai; $mulai<=$akhir; $mulai++){
            $data['label'][$i] = $mulai;
                $pasien = Pasien::filterPasienPositif(
                    null,
                    ['Positif', 'AIDS'],
                    $mulai
                );
                $satutujuh = 0;
                $tigakosong = 0;
                $empatkosong = 0;
                $empatsatu = 0;
                $tidakdiketahui = 0;
                foreach($pasien->get() as $p) {
                    $umur = isset($p->tanggal_lahir) ? Carbon::parse($p->tanggal_lahir)->diffInYears(Carbon::parse($p->tanggal_masuk)) : 99999;
                    $satutujuh = $satutujuh + ($umur >= 0 && $umur <= 17 ? 1 : 0);
                    $tigakosong = $tigakosong +  ($umur >= 18 && $umur <= 30 ? 1 : 0);
                    $empatkosong = $empatkosong +  ($umur >= 31 && $umur <= 40 ? 1 : 0);
                    $empatsatu = $empatsatu +  ($umur >= 41 ? 1 : 0);
                    $tidakdiketahui = $tidakdiketahui + ($umur == 99999 ? 1 : 0);
                }
                $data['satu'][$i] = $satutujuh;
                $data['dua'][$i] = $tigakosong;
                $data['tiga'][$i] = $empatkosong;
                $data['empat'][$i] = $empatsatu;
                $data['lima'][$i] = $tidakdiketahui;
            $i++;
       }
        
        return response()->json([
            'data' => $data
        ]);
    }
    
    public function indexPasienUmurBulanan(Request $request)
    {
        if ($request->ajax()) {
           $mounth = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];
           $data = [];
           $i = 0;
           $tahun = date('Y');
           foreach($mounth as $m){
                $data['label'][$i] = $m;
                $pasien = Pasien::filterPasienPositif(
                    null,
                    ['Positif', 'AIDS'],
                    $tahun,
                    $m
                );
                $satutujuh = 0;
                $tigakosong = 0;
                $empatkosong = 0;
                $empatsatu = 0;
                $tidakdiketahui = 0;
                foreach($pasien->get() as $p) {
                    $umur = isset($p->tanggal_lahir) ? Carbon::parse($p->tanggal_lahir)->diffInYears(Carbon::parse($p->tanggal_masuk)) : 99999;
                    $satutujuh = $satutujuh + ($umur >= 0 && $umur <= 17 ? 1 : 0);
                    $tigakosong = $tigakosong +  ($umur >= 18 && $umur <= 30 ? 1 : 0);
                    $empatkosong = $empatkosong +  ($umur >= 31 && $umur <= 40 ? 1 : 0);
                    $empatsatu = $empatsatu +  ($umur >= 41 ? 1 : 0);
                    $tidakdiketahui = $tidakdiketahui + ($umur == 99999 ? 1 : 0);
                }
                $data['satu'][$i] = $satutujuh;
                $data['dua'][$i] = $tigakosong;
                $data['tiga'][$i] = $empatkosong;
                $data['empat'][$i] = $empatsatu;
                $data['lima'][$i] = $tidakdiketahui;
                    $i++;
           }
            return response()->json([
                'data' => $data
            ]);
        }
        $tahun = Pasien::select(DB::raw('YEAR(tanggal_masuk) as tahun'))->where(['deleted' => 0])->orderBy('tanggal_masuk', 'desc')->distinct()->get();
        return view('konselor.dashboard.indexPasienUmurBulanan', compact(
            'tahun'
        ));
    }
    public function indexPasienUmurBulananFilter(Request $request)
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
                $data['label'][$i] = $m;
                $pasien = Pasien::filterPasienPositif(
                    null,
                    ['Positif', 'AIDS'],
                    $tahun,
                    $m
                );
                $satutujuh = 0;
                $tigakosong = 0;
                $empatkosong = 0;
                $empatsatu = 0;
                $tidakdiketahui = 0;
                foreach($pasien->get() as $p) {
                    $umur = isset($p->tanggal_lahir) ? Carbon::parse($p->tanggal_lahir)->diffInYears(Carbon::parse($p->tanggal_masuk)) : 99999;
                    $satutujuh = $satutujuh + ($umur >= 0 && $umur <= 17 ? 1 : 0);
                    $tigakosong = $tigakosong +  ($umur >= 18 && $umur <= 30 ? 1 : 0);
                    $empatkosong = $empatkosong +  ($umur >= 31 && $umur <= 40 ? 1 : 0);
                    $empatsatu = $empatsatu +  ($umur >= 41 ? 1 : 0);
                    $tidakdiketahui = $tidakdiketahui + ($umur == 99999 ? 1 : 0);
                }
                $data['satu'][$i] = $satutujuh;
                $data['dua'][$i] = $tigakosong;
                $data['tiga'][$i] = $empatkosong;
                $data['empat'][$i] = $empatsatu;
                $data['lima'][$i] = $tidakdiketahui;
                $i++;
           }
           return response()->json([
                'data' => $data
            ]);
    }

    public function indexPasienBulanan(Request $request)
    {
        if ($request->ajax()) {
           $mounth = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];
           $data = [];
           $i = 0;
           $tahun= date('Y');
           foreach($mounth as $m){
                $data['lakilaki'][$i] = Pasien::filterPasienPositif(
                    'Laki-laki',
                    ['Positif', 'AIDS'],
                    $tahun,
                    $m)->count();
                $data['perempuan'][$i] = Pasien::filterPasienPositif(
                    'Perempuan',
                    ['Positif', 'AIDS'],
                    $tahun,
                    $m)->count();
                $data['hiv'][$i] = Pasien::filterPasienPositif(
                    null,
                    ['Positif'],
                    $tahun,
                    $m)->count();
                $data['aids'][$i] = Pasien::filterPasienPositif(
                    null,
                    ['AIDS'],
                    $tahun,
                    $m=)->count();
                $data['total'][$i] = Pasien::filterPasienPositif(
                        null,
                        ['Positif', 'AIDS'],
                        $tahun,
                        $m)->count();
                $i++;
           }
           return response()->json([
                'data' => $data
            ]);
        }
        $tahun = Pasien::select(DB::raw('YEAR(tanggal_masuk) as tahun'))->where(['deleted' => 0])->orderBy('tanggal_masuk', 'desc')->distinct()->get();
        $pekerjaan = Pekerjaan::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        $pendidikan = Pendidikan::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        $statusPernikahan = StatusPernikahan::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        $tempatTerapi =  TempatTerapi::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        $iiArt = IndikasiInisiasiArt::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        $entryPoint = EntryPoint::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        
        return view('konselor.dashboard.indexPasienBulanan', compact(
            'pekerjaan',
            'pendidikan',
            'statusPernikahan',
            'tahun',
            'entryPoint',
            'iiArt',
        ));
    }
    public function indexPasienBulananFilter(Request $request)
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
                $data['lakilaki'][$i] = Pasien::filterPasienPositif(
                    'Laki-laki',
                    ['Positif', 'AIDS'],
                    $tahun,
                    $m,
                    $request->statusAktif,
                    $request->jenisPasien,
                    $request->pendidikan,
                    $request->statusPernikahan,
                    $request->pekerjaan,
                    $request->entryPoint)->count();
                $data['perempuan'][$i] = Pasien::filterPasienPositif(
                    'Perempuan',
                    ['Positif', 'AIDS'],
                    $tahun,
                    $m,
                    $request->statusAktif,
                    $request->jenisPasien,
                    $request->pendidikan,
                    $request->statusPernikahan,
                    $request->pekerjaan,
                    $request->entryPoint)->count();
                $data['hiv'][$i] = Pasien::filterPasienPositif(
                    null,
                    ['Positif'],
                    $tahun,
                    $m,
                    $request->statusAktif,
                    $request->jenisPasien,
                    $request->pendidikan,
                    $request->statusPernikahan,
                    $request->pekerjaan,
                    $request->entryPoint)->count();
                $data['aids'][$i] = Pasien::filterPasienPositif(
                    null,
                    ['AIDS'],
                    $tahun,
                    $m,
                    $request->statusAktif,
                    $request->jenisPasien,
                    $request->pendidikan,
                    $request->statusPernikahan,
                    $request->pekerjaan,
                    $request->entryPoint)->count();
                $data['total'][$i] = Pasien::filterPasienPositif(
                    null,
                    ['Positif', 'AIDS'],
                    $tahun,
                    $m,
                    $request->statusAktif,
                    $request->jenisPasien,
                    $request->pendidikan,
                    $request->statusPernikahan,
                    $request->pekerjaan,
                    $request->entryPoint)->count();
                $i++;
           }
           return response()->json([
                'data' => $data
            ]);
    }
    
    /**
     * Display a listing of the resource follow up art.
     *
     * @return \Illuminate\Http\Response
     */
    public function followUpTahunan(Request $request)
    {
        if ($request->ajax()) {
           $data = [];
           $i = 0;
           $tahun= date('Y');
           for($j=$tahun-4;$j<=$tahun; $j++){
                $data['label'][$i] = $j;
                $data['jumlah'][$i] = RiwayatPerawatanPasien::filterFollowUp($j, null, null, null, null, null, null, null, null, null, null, null)->count();
                $i++;
           }
           return response()->json([
                'data' => $data
            ]);
        }
        $tahun = RiwayatPerawatanPasien::select(DB::raw('YEAR(tanggal_pengobatan) as tahun'))->where(['deleted' => 0])->orderBy('tanggal_pengobatan', 'desc')->distinct()->get();
        $adherenceArt = AdherenceArt::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        $efekSamping = EfekSamping::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        $infeksiOportunistik = InfeksiOportunistik::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        $paduanArt =  PaduanArt::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        $statusFungsional = StatusFungsional::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        $statusTb = StatusTb::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        
        return view('konselor.dashboard.followUpTahunan', compact(
            'adherenceArt',
            'efekSamping',
            'infeksiOportunistik',
            'paduanArt',
            'statusFungsional',
            'statusTb',
            'tahun'
        ));
    }

    public function followUpTahunanFilter(Request $request)
    {
           
           if($request->tahun_mulai && $request->tahun_akhir){
                $mulai = $request->tahun_mulai;
                $akhir = $request->tahun_akhir;
           }else if ($request->tahun_mulai && !$request->tahun_akhir){
                $mulai = $request->tahun_mulai;
                $tahun = RiwayatPerawatanPasien::select(DB::raw('YEAR(tanggal_pengobatan) as tahun'))->where(['deleted' => 0])->orderBy('tanggal_pengobatan', 'desc')->distinct()->limit(1)->get();
                $akhir = $tahun[0]->tahun;
           }else if (!$request->tahun_mulai && $request->tahun_akhir){
                $mulai = $request->tahun_mulai;
                $tahun = RiwayatPerawatanPasien::select(DB::raw('YEAR(tanggal_pengobatan) as tahun'))->where(['deleted' => 0])->orderBy('tanggal_pengobatan', 'asc')->distinct()->limit(1)->get();
                $akhir = $tahun[0]->tahun;
           }else{
                $mulai = date('Y')-4;
                $akhir = date('Y');
           }
        
           $data = [];
           $i = 0;
           for($mulai; $mulai<=$akhir; $mulai++){
                $data['label'][$i] = $mulai;
                $data['jumlah'][$i] = RiwayatPerawatanPasien::filterFollowUp(
                    $mulai,
                    null,
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

    public function followUpBulanan(Request $request)
    {
        if ($request->ajax()) {
           $mounth = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];
           $data = [];
           $i = 0;
           $tahun= date('Y');
           foreach($mounth as $m){
                $data['jumlah'][$i] = RiwayatPerawatanPasien::filterFollowUp($tahun, $m, null, null, null, null, null, null, null, null, null, null, null)->count();
                $i++;
           }
           return response()->json([
                'data' => $data
            ]);
        }
        $tahun = RiwayatPerawatanPasien::select(DB::raw('YEAR(tanggal_pengobatan) as tahun'))->where(['deleted' => 0])->orderBy('tanggal_pengobatan', 'desc')->distinct()->get();
        $adherenceArt = AdherenceArt::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        $efekSamping = EfekSamping::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        $infeksiOportunistik = InfeksiOportunistik::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        $paduanArt =  PaduanArt::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        $statusFungsional = StatusFungsional::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        $statusTb = StatusTb::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        
        return view('konselor.dashboard.followUpBulanan', compact(
            'adherenceArt',
            'efekSamping',
            'infeksiOportunistik',
            'paduanArt',
            'statusFungsional',
            'statusTb',
            'tahun'
        ));
    }
    public function followUpBulananFilter(Request $request)
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

    
    public function checkHivBulanan(Request $request)
    {
        if ($request->ajax()) {
           $mounth = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];
           $data = [];
           $i = 0;
           $tahun= date('Y');
           foreach($mounth as $m){
                $datas= $this->filterCheckHivBulanan($tahun, $m, null, null);
                // dd($datas[0]->positif);
                $data['positif'][$i] = $datas[0]->positif;
                $data['negatif'][$i] = $datas[0]->negatif;
                $data['total'][$i] = $datas[0]->total;
                $i++;
           }
        //    dd($data);
           return response()->json([
                'data' => $data
            ]);
        }
        $tahun = CheckHiv::select(DB::raw('YEAR(tanggal_kegiatan) as tahun'))->where(['deleted' => 0])->orderBy('tanggal_kegiatan', 'desc')->distinct()->get();
        $kabupaten = Kabupaten::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        return view('konselor.dashboard.checkHivBulanan', compact(
            'kabupaten',
            'tahun'
        ));
    }
    public function checkHivBulananFilter(Request $request)
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
                $datas= $this->filterCheckHivBulanan($tahun, $m, $request->id_kabupaten, $request->id_kecamatan);
                $data['positif'][$i] = $datas[0]->positif;
                $data['negatif'][$i] = $datas[0]->negatif;
                $data['total'][$i] = $datas[0]->total;
                $i++;
           }
           return response()->json([
                'data' => $data
            ]);
    }

    public function filterCheckHivBulanan($tahun = null, $bulan = null, $kabupaten = null, $kecamatan = null){
        $pasien = CheckHiv::where('deleted', 0);
        if($tahun){
            $pasien->whereYear('tanggal_kegiatan', $tahun);
        }
        if($bulan){
            $pasien->whereMonth('tanggal_kegiatan', $bulan);
        }
        if($kabupaten){
            $pasien->where('id_kabupaten', $kabupaten);
        }
        if($kecamatan){
            $pasien->where('id_kecamatan', $kecamatan);
        }
        return $pasien->select(DB::raw('SUM(jumlah_positif) as positif'),DB::raw('SUM(jumlah_negatif) as negatif'), DB::raw('SUM(jumlah_negatif + jumlah_positif) as total'))
        ->get();
    }
    
    public function sosialisasiHivBulanan(Request $request)
    {
        if ($request->ajax()) {
           $mounth = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];
           $data = [];
           $i = 0;
           $tahun= date('Y');
           foreach($mounth as $m){
                $datas= $this->filterSosialisasiHivBulanan($tahun, $m, null, null);
                $data['total'][$i] = $datas[0]->total;
                $i++;
           }
           return response()->json([
                'data' => $data
            ]);
        }
        $tahun = SosialisasiHiv::select(DB::raw('YEAR(tanggal_kegiatan) as tahun'))->where(['deleted' => 0])->orderBy('tanggal_kegiatan', 'desc')->distinct()->get();
        $kabupaten = Kabupaten::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        return view('konselor.dashboard.sosialisasiHivBulanan', compact(
            'kabupaten',
            'tahun'
        ));
    }
    
    public function sosialisasiHivBulananFilter(Request $request)
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
                $datas= $this->filterSosialisasiHivBulanan($tahun, $m, $request->id_kabupaten, $request->id_kecamatan);
                $data['total'][$i] = $datas[0]->total;
                $i++;
           }
           return response()->json([
                'data' => $data
            ]);
    }

    private function filterSosialisasiHivBulanan($tahun = null, $bulan = null, $kabupaten = null, $kecamatan = null){
        $pasien = SosialisasiHiv::where('deleted', 0);
        if($tahun){
            $pasien->whereYear('tanggal_kegiatan', $tahun);
        }
        if($bulan){
            $pasien->whereMonth('tanggal_kegiatan', $bulan);
        }
        if($kabupaten){
            $pasien->where('id_kabupaten', $kabupaten);
        }
        if($kecamatan){
            $pasien->where('id_kecamatan', $kecamatan);
        }
        return $pasien->select(DB::raw('SUM(peserta_hadir) as total'))
        ->get();
    }

    public function indexKonselingTahunan(Request $request)
    {
        if ($request->ajax()) {
           $data = [];
           $i = 0;
           $tahun= date('Y');
           for($j=$tahun-4;$j<=$tahun; $j++){
                $data['label'][$i] = $j;
                $data['jumlah'][$i] = KonselingHiv::filterKonselingHiv(
                    null,
                    $j,
                    null,
                    null,
                    null)->count();
                $i++;
           }
           return response()->json([
                'data' => $data
            ]);
        }
        $tahun = KonselingHiv::select(DB::raw('YEAR(tanggal_konseling) as tahun'))->where(['deleted' => 0])->orderBy('tanggal_konseling', 'desc')->distinct()->get();
        
        return view('konselor.dashboard.indexKonselingTahunan', compact(
            'tahun'
        ));
    }

    public function indexKonselingTahunanFilter(Request $request)
    {
           
           if($request->tahun_mulai && $request->tahun_akhir){
                $mulai = $request->tahun_mulai;
                $akhir = $request->tahun_akhir;
           }else if ($request->tahun_mulai && !$request->tahun_akhir){
                $mulai = $request->tahun_mulai;
                $tahun = KonselingHiv::select(DB::raw('YEAR(tanggal_konseling) as tahun'))->where(['deleted' => 0])->orderBy('tanggal_konseling', 'desc')->distinct()->limit(1)->get();
                $akhir = $tahun[0]->tahun;
           }else if (!$request->tahun_mulai && $request->tahun_akhir){
                $mulai = $request->tahun_mulai;
                $tahun = KonselingHiv::select(DB::raw('YEAR(tanggal_konseling) as tahun'))->where(['deleted' => 0])->orderBy('tanggal_konseling', 'asc')->distinct()->limit(1)->get();
                $akhir = $tahun[0]->tahun;
           }else{
                $mulai = date('Y')-4;
                $akhir = date('Y');
           }
        
           $data = [];
           $i = 0;
           for($mulai; $mulai<=$akhir; $mulai++){
                $data['label'][$i] = $mulai;
                $data['jumlah'][$i] = KonselingHiv::filterKonselingHiv(
                    null,
                    $mulai,
                    null,
                    null,
                    null)->count();
                $i++;
           }
           return response()->json([
                'data' => $data
            ]);
    }

    public function indexKonselingBulanan(Request $request)
    {
        if ($request->ajax()) {
           $mounth = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];
           $data = [];
           $i = 0;
           $tahun= date('Y');
           foreach($mounth as $m){
                $data['jumlah'][$i] = KonselingHiv::filterKonselingHiv(
                    null,
                    $tahun,
                    $m,
                    null,
                    null)->count();
                $i++;
           }
           return response()->json([
                'data' => $data
            ]);
        }
        $tahun = KonselingHiv::select(DB::raw('YEAR(tanggal_konseling) as tahun'))->where(['deleted' => 0])->orderBy('tanggal_konseling', 'desc')->distinct()->get();
        
        return view('konselor.dashboard.indexKonselingBulanan', compact(
            'tahun'
        ));
    }
    public function indexKonselingBulananFilter(Request $request)
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
                $data['jumlah'][$i] = KonselingHiv::filterKonselingHiv(
                    null,
                    $tahun,
                    $m,
                    $request->statusAktif,
                    $request->jenisPasien,
                    $request->pendidikan,
                    $request->statusPernikahan,
                    $request->pekerjaan,
                    $request->entryPoint)->count();
                $i++;
           }
           return response()->json([
                'data' => $data
            ]);
    }
}
