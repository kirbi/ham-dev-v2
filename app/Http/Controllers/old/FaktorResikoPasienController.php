<?php

namespace App\Http\Controllers;

use App\Models\FaktorResikoPasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DataTables;

class FaktorResikoPasienController extends Controller
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
        $validator =  Validator::make($request->all(), [
                'id_pasien8' => 'integer|required',
                'id_faktor_resiko' => 'integer|required',
            ],
            [],
            [
                
                'id_pasien8' => 'Nama Pasien',
                'id_faktor_resiko' => 'Faktor Resiko',
            ]
        );

        if($validator->fails()){
            return response()->json([
                'error' => $validator->errors()->all()
            ]);
        }

        FaktorResikoPasien::UpdateOrCreate([
            'id_faktor_resiko_pasien' => $request->id_faktor_resiko_pasien], [
            'id_pasien' => $request->id_pasien8,
            'id_faktor_resiko' => $request->id_faktor_resiko
        ]);    

        return response()->json(['success'=>'Faktor Resiko Pasien berhasil disimpan.']);
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
     * @param  \App\Models\MitraSeksual  $faktorResikoPasien
     * @return \Illuminate\Http\Response
     */
    public function show(FaktorResikoPasien $faktorResikoPasien)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MitraSeksual  $faktorResikoPasien
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = FaktorResikoPasien::find($id);
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
     * @param  \App\Models\MitraSeksual  $faktorResikoPasien
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FaktorResikoPasien $faktorResikoPasien)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MitraSeksual  $faktorResikoPasien
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        FaktorResikoPasien::find($id)->update(['deleted' => 1]);
        return response()->json(['success'=>'Data berhasil dihapus.']);
    }
}
