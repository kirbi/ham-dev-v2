<?php

namespace App\Http\Controllers;

use App\Models\{
    AlasanSubsitusi,
    AlasanSubstitusi,
    Desa,
    EntryPoint,
    FaktorResiko,
    IndikasiInisiasiArt,
    JenisKelamin,
    JenisTerapi,
    Kecamatan,
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
    StatusFungsional,
    StatusPernikahan,
    StatusHiv,
    TempatTerapi,
    TipeTb,
    AdherenceArt,
    EfekSamping,
    InfeksiOportunistik,
    RiwayatPerawatanPasien,
    StatusTb,
};

use Mpdf\Mpdf;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;
use DataTables;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        if ($request->ajax()) {
            $data = Pasien::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
            return DataTables::of($data)
                    ->addColumn('action', function($row){
   
                        $btn = '<div class="btn-group"><a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id_pasien.'" class="edit btn btn-primary btn-sm editProduct" title="Ubah"><i class="fas fa-edit"></i>
                        </a>';
                        $btn = $btn.' <a href="/admin/pasien/detail/'.$row->id_pasien.'" class="btn btn-success btn-sm" title="Detail"><i class="fas fa-eye"></i></a>';
                        $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id_pasien.'" class="btn btn-danger btn-sm deleteProduct"  title="Hapus"><i class="fas fa-trash"></i></a></div>';
 
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->addIndexColumn()
                    ->make(true);
        }
        $pekerjaan = Pekerjaan::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        $pendidikan = Pendidikan::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        $konselor = Konselor::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        $statusPernikahan = StatusPernikahan::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        $provinsi = Provinsi::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        return view('admin.pasien.index', compact('pekerjaan', 'pendidikan', 'konselor', 'statusPernikahan', 'provinsi'));
    }

    public function konselorIndexPasien(Request $request){
        if ($request->ajax()) {
            $data = Pasien::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
            return DataTables::of($data)
                    ->addColumn('action', function($row){
   
                        $btn = '<div class="btn-group"><a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id_pasien.'" data-original-title="Ubah" class="edit btn btn-primary btn-sm editProduct m-1">Ubah</a>';
                        $btn = $btn.' <a href="/konselor/pasien/detail/'.$row->id_pasien.'" class="btn btn-success btn-sm m-1">Detail</a></div>';
 
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->addIndexColumn()
                    ->make(true);
        }
        $pekerjaan = Pekerjaan::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        $pendidikan = Pendidikan::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        $konselor = Konselor::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        $statusPernikahan = StatusPernikahan::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        $provinsi = Provinsi::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        return view('konselor.pasien.index', compact('pekerjaan', 'pendidikan', 'konselor', 'statusPernikahan', 'provinsi'));
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
            'no_reg_nasional' => 'required|max:50' ,
            'no_rekam_medis' => 'required|max:50',
            'nik' => 'required|max:30',
            'no_kk' => 'required|max:30',
            'no_bpjs' => 'required|max:30',
            'nama' => 'required|max:100',
            'tanggal_lahir' => 'required|date',
            'tempat_lahir' => 'required|max:100',
            'alamat' => 'required|max:250',
            'no_hp' => 'required|max:25',
            'id_pendidikan_terakhir' => 'integer|required',
            'id_pekerjaan' => 'integer|required',
            'id_status_pernikahan' => 'integer|required',
            'foto_pasien' => 'max:250',
            'id_konselor' => 'integer|required',
            'agama' => 'required'
        ]);

        if($validator->fails()){
            return response()->json([
                'error' => $validator->errors()->all()
            ]);
        }

        Pasien::UpdateOrCreate([
            'id_pasien' => $request->id_pasien], [
            'nama' => $request->nama,
            'no_reg_nasional' => $request->no_reg_nasional,
            'no_rekam_medis' => $request->no_rekam_medis,
            'nik' => $request->nik,
            'no_kk' => $request->no_kk,
            'no_bpjs' => $request->no_bpjs,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tanggal_lahir' => $request->tanggal_lahir,
            'tempat_lahir' => $request->tempat_lahir,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'id_pendidikan_terakhir' => $request->id_pendidikan_terakhir,
            'id_pekerjaan' => $request->id_pekerjaan,
            'id_status_pernikahan' => $request->id_status_pernikahan,
            'id_konselor' => $request->id_konselor,
            'jenis_pasien' => $request->jenis_pasien,
            'status_aktif' => $request->status_aktif,
            'id_provinsi' => $request->id_provinsi,
            'id_kabupaten' => $request->id_kabupaten,
            'id_kecamatan' => $request->id_kecamatan,
            'id_desa' => $request->id_desa,
            'agama' => $request->agama,
            'tempat_tinggal' => $request->tempat_tinggal,
            'ibu_kandung' => $request->ibu_kandung,
            'tanggal_rujuk_masuk' => $request->tanggal_rujuk_masuk,
            'tanggal_rujuk_keluar' => $request->tanggal_rujuk_keluar,
            'tanggal_meninggal' => $request->tanggal_meninggal,
            'tanggal_masuk' => $request->tanggal_masuk,
            'tempat_rujuk_keluar' => $request->tempat_rujuk_keluar
        ]);    

        return response()->json(['success'=>'Pasien berhasil disimpan.']);
    }

    public function konselorStore(Request $request)
    {
       return $this->store($request);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Pasien::find($id);
        $tempatTerapi =  TempatTerapi::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        $jenisTerapi =  JenisTerapi::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        $paduanArt =  PaduanArt::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        $statusHiv = StatusHiv::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        $mitraSeksual = MitraSeksual::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        $tipeTb = TipeTb::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        $klasifikasiTb = KlasifikasiTb::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        $paduanTb = PaduanTb::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        $kabupaten = Kabupaten::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        $provinsi = Provinsi::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        $statusFungsional = StatusFungsional::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        $kategoriPemeriksaan = KategoriPemeriksaan::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        $iiArt = IndikasiInisiasiArt::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        $entryPoint = EntryPoint::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        $alasanSubstitusi = AlasanSubstitusi::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        $faktorResiko = FaktorResiko::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        return view('admin.pasien.view', compact(
            'alasanSubstitusi',
            'data',
            'entryPoint',
            'faktorResiko',
            'iiArt',
            'jenisTerapi',
            'klasifikasiTb',
            'kabupaten',
            'kategoriPemeriksaan',
            'mitraSeksual',
            'paduanArt',
            'paduanTb',
            'provinsi',
            'statusHiv',
            'statusFungsional',
            'tempatTerapi',
            'tipeTb',
            ));
    }

    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function konselorShow($id)
    {
        $data = Pasien::find($id);
        $tempatTerapi =  TempatTerapi::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        $jenisTerapi =  JenisTerapi::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        $paduanArt =  PaduanArt::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        $statusHiv = StatusHiv::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        $mitraSeksual = MitraSeksual::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        $tipeTb = TipeTb::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        $klasifikasiTb = KlasifikasiTb::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        $paduanTb = PaduanTb::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        $kabupaten = Kabupaten::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        $provinsi = Provinsi::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        $statusFungsional = StatusFungsional::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        $kategoriPemeriksaan = KategoriPemeriksaan::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        $iiArt = IndikasiInisiasiArt::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        $entryPoint = EntryPoint::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        $alasanSubstitusi = AlasanSubstitusi::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        $faktorResiko = FaktorResiko::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        return view('konselor.pasien.view', compact(
            'alasanSubstitusi',
            'data',
            'entryPoint',
            'faktorResiko',
            'iiArt',
            'jenisTerapi',
            'klasifikasiTb',
            'kabupaten',
            'kategoriPemeriksaan',
            'mitraSeksual',
            'paduanArt',
            'paduanTb',
            'provinsi',
            'statusHiv',
            'statusFungsional',
            'tempatTerapi',
            'tipeTb',
            ));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Pasien::find($id);
        return response()->json($data);
    }

    public function konselorEdit($id)
    {
       return $this->edit($id);
    }

    public function negatifHiv(Request $request)
    {
        Pasien::UpdateOrCreate([
            'id_pasien' => $request->id_pasien5], [
            'status_hiv' => "Negatif",
        ]);    

        return response()->json(['success'=>'Data Pasien berhasil disimpan.']);
    }
    
    public function hivAids(Request $request)
    {
        Pasien::UpdateOrCreate([
            'id_pasien' => $request->id_pasien10], [
            'status_hiv' => "AIDS",
        ]);    

        return response()->json(['success'=>'Data Pasien berhasil disimpan.']);
    }
    
    public function konselorNegatifHiv(Request $request)
    {
        
       return $this->negatifHiv($request);
    }

    public function positifHiv(Request $request)
    {
        $validator =  Validator::make($request->all(), [
            'id_status_hiv' => 'required|max:50' ,
            'tanggal_konfirmasi_hiv' => 'required|date',
            'tempat_konfirmasi_hiv' => 'max:50',
            'id_entry_point' => 'required',
            'id_paduan_art' => 'required',
            'nama_pmo' => 'required|max:50',
            'hubungan_pmo' => 'required|max:25',
            'alamat_pmo' => 'required|max:250',
            'no_hp_pmo' => 'required|max:25',
            'id_iiart' => 'required',
        ],
        [],

        [
            'id_status_hiv' => 'Status HIV' ,
            'tanggal_konfirmasi_hiv' => 'Tanggal Terkonfirmasi HIV',
            'tempat_konfirmasi_hiv' => 'Tempat Terkonfirmasi HIV',
            'id_entry_point' => 'Entry Point',
            'id_paduan_art' => 'Paduan ART',
            'nama_pmo' => 'Nama PMO',
            'hubungan_pmo' => 'Hubungan PMO',
            'alamat_pmo' => 'Alamat PMO',
            'no_hp_pmo' => 'No HP PMO',
            'id_iiart' => 'Indikasi Inisasi ART',
            'riwayat_alergi_obat' => 'Riwayat Alergi Obat',
        ]);

        if($validator->fails()){
            return response()->json([
                'error' => $validator->errors()->all()
            ]);
        }

        Pasien::UpdateOrCreate([
            'id_pasien' => $request->id_pasien4], [
            'status_hiv' => "Positif",
            'id_status_hiv' => $request->id_status_hiv,
            'tanggal_konfirmasi_hiv' => $request->tanggal_konfirmasi_hiv,
            'tempat_konfirmasi_hiv' => $request->tempat_konfirmasi_hiv,
            'id_entry_point' => $request->id_entry_point,
            'id_paduan_art' => $request->id_paduan_art,
            'nama_pmo' => $request->nama_pmo,
            'hubungan_pmo' => $request->hubungan_pmo,
            'alamat_pmo' => $request->alamat_pmo,
            'no_hp_pmo' => $request->no_hp_pmo,
            'id_iiart' => $request->id_iiart,
            'riwayat_alergi_obat' => $request->riwayat_alergi_obat,
            'tanggal_konfirmasi_aids' => $request->tanggal_konfirmasi_aids,
            'tempat_konfirmasi_aids' => $request->tempat_konfirmasi_aids,
            'tempat_pdp' => $request->tempat_pdp,
        ]);    

        return response()->json(['success'=>'Data Pasien berhasil disimpan.']);
    }

    public function konselorPositifHiv(Request $request)
    {
        return $this->positifHiv($request);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pasien $pasien)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Pasien::find($id);
        $data->deleted = 1;
        $data->save();
        return response()->json($data);
    }

    
    public function download($id){
        $data = Pasien::find($id);
        $paduanArt = PaduanArt::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        $adherenceArt = AdherenceArt::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        $efekSamping = EfekSamping::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        $infeksiOportunistik = InfeksiOportunistik::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        $paduanArt =  PaduanArt::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        $statusFungsional = StatusFungsional::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        $statusTb = StatusTb::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        $followupArt = RiwayatPerawatanPasien::orderBy('tanggal_pengobatan', 'ASC')->where(['id_pasien' => $id, 'deleted' => 0])->get();
        $content = view('admin.pasien.pasienPDF', compact(
            'data',
            'followupArt',
        'paduanArt',
        'adherenceArt',
        'efekSamping',
        'infeksiOportunistik',
        'paduanArt',
        'statusFungsional',
        'statusTb'));
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
            'orientation' => 'L'
        ]); 
        $mpdf->setFooter('HKBP AIDS MINISTRY|{DATE d-m-Y}|Halaman {PAGENO} dari 1');
        $mpdf->WriteHTML($content);
        $mpdf->Output('Data Pasien HIV'.$data->nama.'.pdf', "D");
        exit;
    }
    
    public function konselorDownload($id){
       return $this->download($id);
    }
}
