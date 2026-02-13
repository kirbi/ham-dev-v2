<?php

namespace App\Http\Controllers;

use App\Models\PemeriksaanKlinis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DataTables;


class PemeriksaanKlinisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data =PemeriksaanKlinis::orderBy('tanggal_pemeriksaan', 'DESC')->where(['deleted' => 0])->get();
        return view('admin.pemeriksaanKlinis.index',compact('data'));
    }
    public function konselorIndex()
    {
        $data =PemeriksaanKlinis::orderBy('tanggal_pemeriksaan', 'DESC')->where(['deleted' => 0])->get();
        return view('konselor.pemeriksaanKlinis.index',compact('data'));
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
                'id_pasien3' => 'integer|required',
                'standar_klinis' => 'required',
                'tanggal_pemeriksaan' => 'required|date',
                'id_status_fungsional' => 'integer|required',
                'berat_badan' => 'required',
                'id_kategori_pemeriksaan' => 'required|integer',
                'jumlah_cd4' => 'integer',
                'viral_load' => 'integer',
            ],
            [],
            [
                
                'id_pasien3' => 'Nama Pasien',
                'standar_klinis' => 'Standard klinis',
                'jumlah_cd4' => 'Jumlah CD4',
                'viral_load' => 'Viral Load',
                'tanggal_pemeriksaan' => 'Tanggal Pemeriksaan',
                'tanggal_pemeriksaan_selanjutnya' => 'Tanggal pemeriksaan Selanjutnya',
                'id_status_fungsional' => 'Status Fungsional',
                'lain_lain' => 'Lain-Lain',
                'berat_badan' => 'Berat badan',
                'id_kategori_pemeriksaan' => "Tahap Pemeriksaan"
            ]
        );

        if($validator->fails()){
            return response()->json([
                'error' => $validator->errors()->all()
            ]);
        }
        if(empty($request->id_pemeriksaan_klinis)){
            $check = PemeriksaanKlinis::where(['id_kategori_pemeriksaan' => $request->id_kategori_pemeriksaan, 'id_pasien' => $request->id_pasien3, 'deleted' => 0])->get();
            if(count($check)>0){
                return response()->json([
                    'error' => array(['Sudah pernah melakukan pemeriksaan ditahap ini!'])
                ]);
            }
        }
        
        PemeriksaanKlinis::UpdateOrCreate([
            'id_pemeriksaan_klinis' => $request->id_pemeriksaan_klinis], [
            'id_pasien' => $request->id_pasien3,
            'standar_klinis' => $request->standar_klinis,
            'jumlah_cd4' => $request->jumlah_cd4,
            'viral_load' => $request->viral_load,
            'tanggal_pemeriksaan' => $request->tanggal_pemeriksaan,
            'tanggal_pemeriksaan_selanjutnya' => $request->tanggal_pemeriksaan_selanjutnya,
            'id_status_fungsional' => $request->id_status_fungsional,
            'lain_lain' => $request->lain_lain,
            'berat_badan' => $request->berat_badan,
            'id_kategori_pemeriksaan' => $request->id_kategori_pemeriksaan
        ]);    

        return response()->json(['success'=>'Pemeriksaan Klinis Pasien berhasil disimpan.']);
    }
    
    public function konselorStore(Request $request)
    {
       return $this->addStore($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PemeriksaanKlinis  $pemeriksaanKlinis
     * @return \Illuminate\Http\Response
     */
    public function show(PemeriksaanKlinis $pemeriksaanKlinis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PemeriksaanKlinis  $pemeriksaanKlinis
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = PemeriksaanKlinis::find($id);
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
     * @param  \App\Models\PemeriksaanKlinis  $pemeriksaanKlinis
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PemeriksaanKlinis $pemeriksaanKlinis)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PemeriksaanKlinis  $pemeriksaanKlinis
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PemeriksaanKlinis::find($id)->update(['deleted' => 1]);
     
        return response()->json(['success'=>'Data berhasil dihapus.']);
    }
}
