<?php

namespace App\Http\Controllers;

use App\Models\RiwayatMitraSeksual;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DataTables;

class RiwayatMitraSeksualController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    public function addStore(Request $request)
    {
        $validator =  Validator::make($request->all(),
            [
                'id_pasien2' => 'integer|required',
                'nama' => 'required|max:100',
                'umur' => 'required',
                'umur_bulan' => 'required',
                'komsumsi_art' => 'required',
                'id_hubungan' => 'integer|required',
                'id_status_hiv' => 'integer|required',
                'no_reg_nasional' => 'string|max:50'
            ],
            [],
            [
                
                'id_pasien2' => 'Nama Pasien',
                'nama' => 'Nama',
                'umur' => 'Umur',
                'umur_bulan' => 'Umur (Dalam Bulan)',
                'id_hubungan' => 'Hubungan',
                'komsumsi_art' => 'Komsumsi ART',
                'id_status_hiv' => 'Status HIV',
                'no_reg_nasional' => 'No REG Nasional'
            ]
        );

        if($validator->fails()){
            return response()->json([
                'error' => $validator->errors()->all()
            ]);
        }

        RiwayatMitraSeksual::UpdateOrCreate([
            'id_riwayat_mitra_seksual' => $request->id_riwayat_mitra_seksual], [
            'id_pasien' => $request->id_pasien2,
            'nama' => $request->nama,
            'umur' => $request->umur,
            'umur_bulan' => $request->umur_bulan,
            'id_hubungan' => $request->id_hubungan,
            'komsumsi_art' => $request->komsumsi_art,
            'id_status_hiv' => $request->id_status_hiv,
            'no_reg_nasional' => $request->no_reg_nasional
        ]);    

        return response()->json(['success'=>'Riwayat Mitra Seksual berhasil disimpan.']);
    }
        
    public function konselorStore(Request $request)
    {
       return $this->addStore($request);
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MitraSeksual  $mitraSeksual
     * @return \Illuminate\Http\Response
     */
    public function show(RiwayatMitraSeksual $mitraSeksual)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MitraSeksual  $mitraSeksual
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = RiwayatMitraSeksual::find($id);
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
     * @param  \App\Models\MitraSeksual  $mitraSeksual
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RiwayatMitraSeksual $mitraSeksual)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MitraSeksual  $mitraSeksual
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        RiwayatMitraSeksual::find($id)->update(['deleted' => 1]);
     
        return response()->json(['success'=>'Data berhasil dihapus.']);
    }
}
