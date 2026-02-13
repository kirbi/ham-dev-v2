<?php

namespace App\Http\Controllers;

use App\Models\PengobatanTbHiv;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DataTables;

class PengobatanTbHivController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = PengobatanTbHiv::orderBy('tanggal_mulai_terapi', 'DESC')->where(['deleted' => 0])->get();
        return view('admin.pengobatanTb.index', compact('data'));
    }
    public function konselorIndex()
    {
        $data = PengobatanTbHiv::orderBy('tanggal_mulai_terapi', 'DESC')->where(['deleted' => 0])->get();
        return view('konselor.pengobatanTb.index', compact('data'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
    
    public function addStore(Request $request)
    {
        $validator =  Validator::make($request->all(),
            [
                'id_pasien7' => 'integer|required',
                'id_tipe_tb' => 'integer|required',
                'id_klasifikasi_tb' => 'integer|required',
                'id_paduan_tb' => 'integer|required',
                'id_kabupaten_pengobatan' => 'integer|required',
                'nama_sarana_kesehatan' => 'required|max:250',
                'no_reg_tb' => 'required|max:100',
                'tanggal_mulai_terapi' => 'required|date',
                'lokasi_tb' => 'max:250',
            ],
            [],
            [
                
                'id_pasien7' => 'Nama Pasien',
                'id_tipe_tb' => 'Tipe TB',
                'id_klasifikasi_tb' => 'Klasifikasi TB',
                'id_paduan_tb' => 'Panduan TB',
                'id_kabupaten_pengobatan' => 'Kabupaten Pengobatan',
                'nama_sarana_kesehatan' => 'Nama Sarana Kesehatan',
                'no_reg_tb' => 'No REG TB',
                'tanggal_mulai_terapi' => 'Tanggal Mulai Terapi',
                'tanggal_selesai_terapi' => 'Tanggal Selesai Terapi',
                'lokasi_tb' => 'Lokasi TB',
            ]
        );

        if($validator->fails()){
            return response()->json([
                'error' => $validator->errors()->all()
            ]);
        }

       PengobatanTbHiv::UpdateOrCreate([
            'id_pengobatan_tb_hiv' => $request->id_pengobatan_tb_hiv], [
                'id_pasien' =>  $request->id_pasien7,
                'id_tipe_tb' =>  $request->id_tipe_tb,
                'id_klasifikasi_tb' =>  $request->id_klasifikasi_tb,
                'id_paduan_tb' =>  $request->id_paduan_tb,
                'id_kabupaten_pengobatan' =>  $request->id_kabupaten_pengobatan,
                'nama_sarana_kesehatan' =>  $request->nama_sarana_kesehatan,
                'no_reg_tb' =>  $request->no_reg_tb,
                'tanggal_mulai_terapi' =>  $request->tanggal_mulai_terapi,
                'tanggal_selesai_terapi' =>  $request->tanggal_selesai_terapi,
                'lokasi_tb' =>  $request->lokasi_tb,
        ]);    

        return response()->json(['success'=>'Pengobatan TB Pasien berhasil disimpan.']);
    }    
    public function konselorStore(Request $request)
    {
       return $this->addStore($request);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PengobatanTbHiv  $pengobatanTbHiv
     * @return \Illuminate\Http\Response
     */
    public function show(PengobatanTbHiv $pengobatanTbHiv)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PengobatanTbHiv  $pengobatanTbHiv
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = PengobatanTbHiv::find($id);
        return response()->json($data);
    }

    public function konselorEdit($id)
    {
       return $this->edit($id);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PengobatanTbHiv  $pengobatanTbHiv
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PengobatanTbHiv $pengobatanTbHiv)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PengobatanTbHiv  $pengobatanTbHiv
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PengobatanTbHiv::find($id)->update(['deleted' => 1]);
        return response()->json(['success'=>'Data berhasil dihapus.']);
    }
}
