<?php

namespace App\Http\Controllers;

use App\Models\{
    AlasanTesHiv,
    InfoTesHiv,
    Kabupaten,
    KelompokResiko,
    KonselingHiv,
    Konselor,
    Pasien,
    Pekerjaan,
    Pendidikan,
    StatusPernikahan,
    TingkatResikoHiv
};

use Mpdf\Mpdf;

use Mpdf\Http\Response;
use Mpdf\Http\Stream;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Carbon;
use DataTables;


class KonselingHivController extends Controller
{
    /**
     * Display a listing of the pasien who aktif/tidak aktif for follow up.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexPasien(Request $request)
    {
        if ($request->ajax()) {
            $data = Pasien::konseling();
            return DataTables::of($data)
                    ->addColumn('action', function($row){
                        $btn = '<div> <a href="/admin/konselingHiv/add/'.$row->id_pasien.'" class="btn btn-success btn-sm"><i class="fas fa-plus"></i> Tambah</a></div>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->addIndexColumn()
                    ->make(true);
        }
        return view('admin.konselingHiv.indexPasien');
    }
    public function konselorIndexPasien(Request $request)
    {
        if ($request->ajax()) {
            $data = Pasien::konseling();
            return DataTables::of($data)
                    ->addColumn('action', function($row){
                        $btn = '<div> <a href="/konselor/konselingHiv/add/'.$row->id_pasien.'" class="btn btn-success btn-sm"><i class="fas fa-plus"></i> Tambah</a></div>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->addIndexColumn()
                    ->make(true);
        }
        return view('konselor.konselingHiv.indexPasien');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = KonselingHiv::orderBy('tanggal_konseling', 'DESC')->where(['deleted' => 0])->get();
            return DataTables::of($data)
                        ->addColumn('nama', function($data) {
                            return $data->pasien->nama;
                        })
                        ->addColumn('no_rekam_medis', function($data) {
                            return $data->pasien->no_rekam_medis;
                        })
                        ->addColumn('jenis_kelamin', function($data) {
                            return $data->pasien->jenis_kelamin;
                        })
                        ->addColumn('action', function($row){
                            $btn = '<div class="btn-group"><a href="/admin/konselingHiv/'.$row->id_konseling_hiv.'/edit" class="btn btn-primary btn-sm">Ubah</a>';
                            $btn = $btn.' <a href="/admin/konselingHiv/detail/'.$row->id_konseling_hiv.'" data-toggle="tooltip"  class="btn btn-success btn-sm">Detail</a>';
                            $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id_konseling_hiv.'" data-original-title="Hapus" class="btn btn-danger btn-sm deleteKonseling">Hapus</a></div>';
                            return $btn;
                        })
                    ->rawColumns(['action'])
                    ->addIndexColumn()
                    ->make(true);
        }
        return view('admin.konselingHiv.index');
    }
    public function konselorIndex(Request $request)
    {
        if ($request->ajax()) {
            $data = KonselingHiv::orderBy('tanggal_konseling', 'DESC')->where(['deleted' => 0])->get();
            return DataTables::of($data)
                        ->addColumn('nama', function($data) {
                            return $data->pasien->nama;
                        })
                        ->addColumn('no_rekam_medis', function($data) {
                            return $data->pasien->no_rekam_medis;
                        })
                        ->addColumn('jenis_kelamin', function($data) {
                            return $data->pasien->jenis_kelamin;
                        })
                        ->addColumn('action', function($row){
                            $btn = '<div class="btn-group"><a href="/konselor/konselingHiv/'.$row->id_konseling_hiv.'/edit" class="btn btn-primary btn-sm">Ubah</a>';
                            $btn = $btn.' <a href="/konselor/konselingHiv/detail/'.$row->id_konseling_hiv.'" data-toggle="tooltip"  class="btn btn-success btn-sm">Detail</a></div>';
                            return $btn;
                        })
                    ->rawColumns(['action'])
                    ->addIndexColumn()
                    ->make(true);
        }
        return view('konselor.konselingHiv.index');
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
            $kabupaten = Kabupaten::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
            $pekerjaan = Pekerjaan::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
            $pendidikan = Pendidikan::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
            $konselor = Konselor::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
            $alasanTesHiv = AlasanTesHiv::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
            $statusPernikahan = StatusPernikahan::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
            return view('admin.konselingHiv.add', compact(
                'alasanTesHiv',
                'kabupaten',
                'pekerjaan',
                'pendidikan',
                'konselor',
                'pasien',
                'statusPernikahan'
                ));
        }
        return redirect()->back()->json(['error'=>'Data Pasien tidak ditemukan.']);
    }
    public function konselorAdd($idpasien){
        $pasien = Pasien::find($idpasien);
        if($pasien){
            $kabupaten = Kabupaten::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
            $pekerjaan = Pekerjaan::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
            $pendidikan = Pendidikan::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
            $konselor = Konselor::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
            $alasanTesHiv = AlasanTesHiv::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
            $statusPernikahan = StatusPernikahan::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
            return view('konselor.konselingHiv.add', compact(
                'alasanTesHiv',
                'kabupaten',
                'pekerjaan',
                'pendidikan',
                'konselor',
                'pasien',
                'statusPernikahan'
                ));
        }
        return redirect()->back()->json(['error'=>'Data Pasien tidak ditemukan.']);
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
            'id_pasien' => 'required',
            'id_kabupaten' => 'required',
            'id_konselor' => 'required',
            'id_pendidikan' => 'required',
            'id_pekerjaan' => 'required',
            'id_status_pernikahan' => 'required',
            'alamat' => 'required',
            'tanggal_konseling' => 'required',
            'no_registrasi' => 'required',
            'tanggal_konseling_pasca_tes_hiv' => 'required',
            'status_pasien' => 'required',
            'tanggal_konseling_pra_tes_hiv' => 'required',
            'pernah_tes_hiv_sebelumnya' => 'required',
            'kesediaan_tes_hiv' => 'required',
            'id_alasan_tes_hiv' => 'required'
            ],
            ['id_pasien' => 'Pasien tidak ditemukan harap ulangi dari awal!'],
            [
                'id_pasien' => 'Pasien',
                'id_kabupaten' => 'Kabupaten',
                'id_konselor' => 'Konselor',
                'id_pendidikan' => 'Pendidikan',
                'id_pekerjaan' => 'Pekerjaan',
                'id_status_pernikahan' => 'Status Pernikahan',
                'id_alasan_tes_hiv' => 'Alasan Test HIV',
                'alamat' => 'Alamat',
                'tanggal_konseling' => 'Tanggal Konseling',
                'no_registrasi' => 'No Registrasi',
                'jumlah_anak_kandung' => 'Jumlah Anak Kandung',
                'umur_anak_terakhir' => 'Umur Anak Terakhir',
                'tanggal_konseling_pasca_tes_hiv' => 'Tanggal Konseling Pra Tes HIV',
                'status_pasien' => 'Status Pasien',
                'tanggal_konseling_pra_tes_hiv' => 'Tanggal Konseling Pasca Tes HIV',
                'pernah_tes_hiv_sebelumnya' => 'Pernah Tes HIV',
                'kesediaan_tes_hiv' => 'Kesediaan Tes HIV',
                'catatan_konseling' => 'Catatan Konseling', 
            ]
        );

        if($validator->fails()){
            return response()->json([
                'error' => $validator->errors()->all()
            ]);
        }

        KonselingHiv::UpdateorCreate(
            ['id_konseling_hiv' => $request->id_konseling_hiv], 
            [  
            'id_pasien' => $request->id_pasien,
            'tanggal_konseling' => $request->tanggal_konseling,
            'id_kabupaten' => $request->id_kabupaten,
            'id_konselor' => $request->id_konselor,
            'id_pendidikan' => $request->id_pendidikan,
            'id_pekerjaan' => $request->id_pekerjaan,
            'id_status_pernikahan' => $request->id_status_pernikahan,
            'id_alasan_tes_hiv' => $request->id_alasan_tes_hiv,
            'alamat' => $request->alamat,
            'tanggal_konseling' => $request->tanggal_konseling,
            'no_registrasi' => $request->no_registrasi,
            'ada_pasangan_perempuan' => $request->ada_pasangan_perempuan,
            'pasangan_hamil' => $request->pasangan_hamil,
            'jumlah_pasangan_laki_laki' => $request->jumlah_pasangan_laki_laki,
            'jumlah_anak_kandung' => $request->jumlah_anak_kandung,
            'umur_anak_terakhir' => $request->umur_anak_terakhir,
            'status_kehamilan' => $request->status_kehamilan,
            'tanggal_konseling_pasca_tes_hiv' => $request->tanggal_konseling_pasca_tes_hiv,
            'status_pasien' => $request->status_pasien,
            'tanggal_konseling_pra_tes_hiv' => $request->tanggal_konseling_pra_tes_hiv,
            'pernah_tes_hiv_sebelumnya'  => $request->pernah_tes_hiv_sebelumnya,
            'kesediaan_tes_hiv' => $request->kesediaan_tes_hiv,
            'catatan_konseling' => $request->catatan_konseling
            ]
        );    

        return response()->json(['success'=>'Follow Up Pasien berhasil disimpan.']);
    }
    public function konselorStore(Request $request)
    {
        return $this->store($request);
    }

    /**
     * Show the form for detail the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        $data = KonselingHiv::find($id);
        $infoTesHiv = InfoTesHiv::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        $kelompokResiko = KelompokResiko::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        $tingkatResikoHiv = TingkatResikoHiv::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        return view('admin.konselingHiv.detail', compact('data', 'infoTesHiv', 'kelompokResiko', 'tingkatResikoHiv'));
    }
    public function konselorDetail($id)
    {
        $data = KonselingHiv::find($id);
        $infoTesHiv = InfoTesHiv::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        $kelompokResiko = KelompokResiko::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        $tingkatResikoHiv = TingkatResikoHiv::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        return view('konselor.konselingHiv.detail', compact('data', 'infoTesHiv', 'kelompokResiko', 'tingkatResikoHiv'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($idriwayatperawatanpasien)
    {
        $data = KonselingHiv::find($idriwayatperawatanpasien);
        if($data){
            $kabupaten = Kabupaten::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
            $pekerjaan = Pekerjaan::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
            $pendidikan = Pendidikan::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
            $konselor = Konselor::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
            $alasanTesHiv = AlasanTesHiv::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
            $statusPernikahan = StatusPernikahan::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
            return view('admin.konselingHiv.edit', compact(
                'data',
                'alasanTesHiv',
                'kabupaten',
                'pekerjaan',
                'pendidikan',
                'konselor',
                'statusPernikahan'
                ));
        }
        return redirect()->back()->json(['error'=>'Data Pasien tidak ditemukan.']);
    }
    public function konselorEdit($idriwayatperawatanpasien){
        return $this->edit($idriwayatperawatanpasien);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        KonselingHiv::find($id)->update(['deleted' => 1]);
        return response()->json(['success'=>'Data berhasil dihapus.']);
    }

    public function download($id){
        $data = KonselingHiv::find($id);
        $umur = Carbon::parse($data->pasien->tanggal_lahir)->diff(Carbon::parse($data->tanggal_konseling))->format('%y Tahun');
        $content = view('admin.konselingHiv.konselingPDF', compact('data', 'umur'));
        $mpdf=new Mpdf([
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
            'orientation' => 'P'
        ]); 
        $mpdf->setFooter('HKBP AIDS MINISTRY|{DATE d-m-Y}|Halaman {PAGENO} dari 1');
        $mpdf->WriteHTML($content);
        $mpdf->Output('Formulir Konseling HIV'.$data->pasien->nama.'.pdf', "D");
        exit;
    }
    public function konselorDownload($id)
    {
        return $this->download($id);
    }


}
