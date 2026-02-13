<?php

namespace App\Http\Controllers;

use App\Models\KajianResikoHiv;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DataTables;

class KajianResikoHivController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = KajianResikoHiv::orderBy('tanggal', 'ASC')->where(['deleted' => 0])->get();
        return view('admin.KajianResikoHiv.index',compact('data'));
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
    
    public function addStore(Request $request)
    {
        $validator =  Validator::make($request->all(), [
                'id_konseling3' => 'integer|required',
                'tanggal' => 'required',
                'id_tingkat_resiko_hiv' => 'required'
            ],
            [],
            [
                'id_tingkat_resiko_hiv' => 'Tingkat Resiko',
                'tanggal' => 'Tanggal',
            ]
        );

        if($validator->fails()){
            return response()->json([
                'error' => $validator->errors()->all()
            ]);
        }

        KajianResikoHiv::UpdateOrCreate([
            'id_kajian_resiko_hiv' => $request->id_kajian_resiko_hiv], [
            'id_konseling' => $request->id_konseling3,
            'id_tingkat_resiko_hiv' => $request->id_tingkat_resiko_hiv,
            'tanggal' => $request->tanggal
        ]);    

        return response()->json(['success'=>'Tingkat Kajian Resiko HIV berhasil disimpan.']);
    }
    public function konselorAddStore(Request $request)
    {
        return $this->addStore($request);
    }

    public function store(Request $request)
    {
        //
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KajianResikoHiv  $KajianResikoHiv
     * @return \Illuminate\Http\Response
     */
    public function show(KajianResikoHiv $KajianResikoHiv)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KajianResikoHiv  $KajianResikoHiv
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = KajianResikoHiv::find($id);
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
     * @param  \App\Models\KajianResikoHiv  $KajianResikoHiv
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KajianResikoHiv $KajianResikoHiv)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KajianResikoHiv  $KajianResikoHiv
     * @return \Illuminate\Http\Response
     */
    public function destroy(KajianResikoHiv $KajianResikoHiv)
    {
        //
    }
}
