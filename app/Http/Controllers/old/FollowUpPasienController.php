<?php

namespace App\Http\Controllers;

use App\Models\AdherenceArt;
use App\Models\EfekSamping;
use App\Models\InfeksiOportunistik;
use App\Models\PaduanArt;
use App\Models\Pasien;
use App\Models\RiwayatPerawatanPasien;
use App\Models\StatusTb;
use App\Models\StatusFungsional;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DataTables;

class FollowUpPasienController extends Controller
{
    /**
     * Display a listing of the pasien who aktif/tidak aktif for follow up.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexPasien(Request $request)
    {
        if ($request->ajax()) {
            $data = Pasien::aktifTidakAktif();
            return DataTables::of($data)
                    ->addColumn('action', function($row){
                        $btn = '<div> <a href="/admin/followup/add/'.$row->id_pasien.'" class="btn btn-success btn-sm"><i class="fas fa-plus"></i> Tambah</a></div>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->addIndexColumn()
                    ->make(true);
        }
        return view('admin.followup.indexPasien');
    }
    public function konselorIndexPasien(Request $request)
    {
        if ($request->ajax()) {
            $data = Pasien::aktifTidakAktif();
            return DataTables::of($data)
                    ->addColumn('action', function($row){
                        $btn = '<div> <a href="/konselor/followup/add/'.$row->id_pasien.'" class="btn btn-success btn-sm"><i class="fas fa-plus"></i> Tambah</a></div>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->addIndexColumn()
                    ->make(true);
        }
        return view('konselor.followup.indexPasien');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = RiwayatPerawatanPasien::orderBy('tanggal_pengobatan', 'DESC')->where(['deleted' => 0])->get();
            return DataTables::of($data)
                        ->addColumn('nama', function($data) {
                            return $data->pasien->nama;
                        })
                        ->addColumn('no_rekam_medis', function($data) {
                            return $data->pasien->no_rekam_medis;
                        })
                        ->addColumn('paduanArt', function($data) {
                            return $data->paduanArt->nama;
                        })
                        ->addColumn('action', function($row){
                            $btn = '<div class="btn-group"><a href="/admin/followup/'.$row->id_riwayat_perawatan_pasien.'/edit" class="btn btn-primary btn-sm m-1">Ubah</a>';
                            // $btn = $btn.' <a href="/admin/pasien/detail/'.$row->id_riwayat_perawatan_pasien.'" class="btn btn-success btn-sm  detailFollowUp">Detail</a></div>';
                            $btn = $btn.' <ahref="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id_riwayat_perawatan_pasien.'" data-original-title="Detail Data" class="btn btn-success btn-sm m-1 detailFollowUp">Detail</a></div>';
                            $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id_riwayat_perawatan_pasien.'" data-original-title="Hapus" class="btn btn-danger btn-sm m-1 deleteFollowUp">Hapus</a></div>';
                            return $btn;
                        })
                    ->rawColumns(['action'])
                    ->addIndexColumn()
                    ->make(true);
        }
        return view('admin.followup.index');
    }

    public function konselorIndex(Request $request)
    {
        if ($request->ajax()) {
            $data = RiwayatPerawatanPasien::orderBy('tanggal_pengobatan', 'DESC')->where(['deleted' => 0])->get();
            return DataTables::of($data)
                        ->addColumn('nama', function($data) {
                            return $data->pasien->nama;
                        })
                        ->addColumn('no_rekam_medis', function($data) {
                            return $data->pasien->no_rekam_medis;
                        })
                        ->addColumn('paduanArt', function($data) {
                            return $data->paduanArt->nama;
                        })
                        ->addColumn('action', function($row){
                            $btn = '<div class="btn-group"><a href="/konselor/followup/'.$row->id_riwayat_perawatan_pasien.'/edit" class="btn btn-primary btn-sm m-1">Ubah</a>';
                            $btn = $btn.' <ahref="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id_riwayat_perawatan_pasien.'" data-original-title="Detail Data" class="btn btn-success btn-sm m-1 detailFollowUp">Detail</a></div>';
                            $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id_riwayat_perawatan_pasien.'" data-original-title="Hapus" class="btn btn-danger btn-sm m-1 deleteFollowUp">Hapus</a></div>';
                            return $btn;
                        })
                    ->rawColumns(['action'])
                    ->addIndexColumn()
                    ->make(true);
        }
        return view('konselor.followup.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add($idpasien)
    {
        $pasien = Pasien::find($idpasien);
        if($pasien){
            $adherenceArt = AdherenceArt::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
            $efekSamping = EfekSamping::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
            $infeksiOportunistik = InfeksiOportunistik::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
            $paduanArt =  PaduanArt::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
            $statusFungsional = StatusFungsional::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
            $statusTb = StatusTb::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();

            return view('admin.followup.add', compact(
                'adherenceArt',
                'efekSamping',
                'infeksiOportunistik',
                'pasien',
                'paduanArt',
                'statusFungsional',
                'statusTb'
                ));
        }
        return redirect()->back()->json(['error'=>'Data Pasien btidak ditemukan.']);
    }
    public function konselorAdd($idpasien)
    {
        $pasien = Pasien::find($idpasien);
        if($pasien){
            $adherenceArt = AdherenceArt::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
            $efekSamping = EfekSamping::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
            $infeksiOportunistik = InfeksiOportunistik::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
            $paduanArt =  PaduanArt::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
            $statusFungsional = StatusFungsional::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
            $statusTb = StatusTb::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();

            return view('konselor.followup.add', compact(
                'adherenceArt',
                'efekSamping',
                'infeksiOportunistik',
                'pasien',
                'paduanArt',
                'statusFungsional',
                'statusTb'
                ));
        }
        return redirect()->back()->json(['error'=>'Data Pasien btidak ditemukan.']);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator =  Validator::make($request->all(), [
            'tanggal_pengobatan' => 'required' ,
            'rencana_kunjungan_selanjutnya' => 'required',
            'sisa_obat' => 'required',
            'berat_badan' => 'required',
            'stadium_who' => 'max:250',
            'id_status_tb' => 'integer|required',
            'id_paduan_art' => 'integer|required',
            'diberi_kondom' => 'required',
            'id_status_fungsional' => 'integer|required',
            'id_pasien' => 'required',
            'jumlah_cd4' => 'integer',
            'viral_load' => 'integer',
            
            ],
            ['id_pasien' => 'Pasien tidak ditemukan harap ulangi dari awal!'],
            [
                'tanggal_pengobatan' => 'Tanggal Follow Up' ,
                'rencana_kunjungan_selanjutnya' => 'Rencana Tanggal Follow Up',
                'sisa_obat' => 'Sisa Obat ARV',
                'berat_badan' => 'Berat Badan',
                'id_status_tb' => 'Status TB',
                'id_paduan_art' => 'Paduan ART',
                'id_status_fungsional' => 'Status Fungsional',
                'jumlah_cd4' => 'Jumlah CD4',
                'viral_load' => 'Viral Load',
                'id_pasien' => 'Pasien'  
            ]
        );

        if($validator->fails()){
            return response()->json([
                'error' => $validator->errors()->all()
            ]);
        }

        RiwayatPerawatanPasien::UpdateorCreate(
            ['id_riwayat_perawatan_pasien' => $request->id_riwayat_perawatan_pasien], 
            [
            'id_pasien' => $request->id_pasien,
            'tanggal_pengobatan' => $request->tanggal_pengobatan,
            'rencana_kunjungan_selanjutnya' => $request->rencana_kunjungan_selanjutnya,
            'sisa_obat' => $request->sisa_obat,
            'berat_badan' => $request->berat_badan,
            'tinggi_badan' => $request->tinggi_badan,
            'stadium_who' => $request->stadium_who,
            'hamil' => $request->hamil,
            'metode_kb' => $request->metode_kb,
            'id_status_fungsional' => $request->id_status_fungsional,
            'id_infeksi_oportunistik' => $request->id_infeksi_oportunistik,
            'obat_untuk_io' => $request->obat_untuk_io,
            'id_status_tb' => $request->id_status_tb,
            'ppk' => $request->ppk,
            'id_paduan_art' => $request->id_paduan_art,
            'dosis' => $request->dosis,
            'id_adherence_art' => $request->id_adherence_art,
            'id_efek_samping' => $request->id_efek_samping,
            'jumlah_cd4' => $request->jumlah_cd4,
            'viral_load' => $request->viral_load,
            'hasil_lab'  => $request->hasil_lab,
            'diberi_kondom' => $request->diberi_kondom,
            'rujuk_ke_spesialis' => $request->rujuk_ke_spesialis
            ]
        );    

        return response()->json(['success'=>'Follow Up Pasien berhasil disimpan.']);
    }

    public function konselorStore(Request $request){
        return $this->store($request);
    }
    /**
     * Show the form for detail the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        $data = RiwayatPerawatanPasien::detail($id);
        return response()->json($data);
    }
    public function konselorDetail($id)
    {
        
        return $this->detail($id);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($idriwayatperawatanpasien)
    {
        $data = RiwayatPerawatanPasien::find($idriwayatperawatanpasien);
        if($data){
            $adherenceArt = AdherenceArt::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
            $efekSamping = EfekSamping::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
            $infeksiOportunistik = InfeksiOportunistik::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
            $paduanArt =  PaduanArt::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
            $statusFungsional = StatusFungsional::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
            $statusTb = StatusTb::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();

            return view('admin.followup.edit', compact(
                'adherenceArt',
                'data',
                'efekSamping',
                'infeksiOportunistik',
                'paduanArt',
                'statusFungsional',
                'statusTb'
                ));
        }
        return redirect()->back()->json(['error'=>'Data Pasien tidak ditemukan.']);
    }
    public function konselorEdit($idriwayatperawatanpasien)
    {
        $data = RiwayatPerawatanPasien::find($idriwayatperawatanpasien);
        if($data){
            $adherenceArt = AdherenceArt::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
            $efekSamping = EfekSamping::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
            $infeksiOportunistik = InfeksiOportunistik::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
            $paduanArt =  PaduanArt::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
            $statusFungsional = StatusFungsional::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
            $statusTb = StatusTb::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();

            return view('konselor.followup.edit', compact(
                'adherenceArt',
                'data',
                'efekSamping',
                'infeksiOportunistik',
                'paduanArt',
                'statusFungsional',
                'statusTb'
                ));
        }
        return redirect()->back()->json(['error'=>'Data Pasien tidak ditemukan.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        RiwayatPerawatanPasien::find($id)->update(['deleted' => 1]);
        return response()->json(['success'=>'Data berhasil dihapus.']);
    }
}
