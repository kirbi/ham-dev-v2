<?php

namespace App\Http\Controllers;

use App\Models\TesHivKonseling;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DataTables;

class TesHivKonselingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = TesHivKonseling::orderBy('tanggal_tes', 'ASC')->where(['deleted' => 0])->get();
        return view('admin.tesHivKonseling.index',compact('data'));
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
                'id_konseling4' => 'integer|required',
                'hasil' => 'required',
                'tanggal_tes' => 'required|date',
                'jenis_tes' => 'required'
            ],
            [],
            [
                'hasil' => 'Hasil',
                'tanggal_tes' => 'Tanggal',
                'jenis_tes' => 'Jenis Tes'
            ]
        );

        if($validator->fails()){
            return response()->json([
                'error' => $validator->errors()->all()
            ]);
        }

        TesHivKonseling::UpdateOrCreate([
            'id_tes_hiv_konseling' => $request->id_tes_hiv_konseling], [
            'id_konseling' => $request->id_konseling4,
            'tes_r1' => $request->tes_r1,
            'tes_r2' => $request->tes_r2,
            'tes_r3' => $request->tes_r3,
            'reagen_r1' => $request->reaagen_r1,
            'reagen_r2' => $request->reaagen_r2,
            'reagen_r3' => $request->reaagen_r3,
            'hasil' => $request->hasil,
            'jenis_tes' => $request->jenis_tes,
            'tanggal_tes' => $request->tanggal_tes,
        ]);    

        return response()->json(['success'=>'Hasil Tes HIV berhasil disimpan.']);
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
     * @param  \App\Models\TesHivKonseling  $TesHivKonseling
     * @return \Illuminate\Http\Response
     */
    public function show(TesHivKonseling $TesHivKonseling)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TesHivKonseling  $TesHivKonseling
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = TesHivKonseling::find($id);
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
     * @param  \App\Models\TesHivKonseling  $TesHivKonseling
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TesHivKonseling $TesHivKonseling)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TesHivKonseling  $TesHivKonseling
     * @return \Illuminate\Http\Response
     */
    public function destroy(TesHivKonseling $TesHivKonseling)
    {
        //
    }
}
