<?php

namespace App\Http\Controllers;

use App\Models\InfoTesHivKonseling;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DataTables;

class InfoTesHivKonselingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = InfoTesHivKonseling::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        return view('admin.infoTesHivKonseling.index',compact('data'));
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
                'id_konseling2' => 'integer|required',
                'id_info_tes_hiv' => 'required'
            ],
            [],
            [
                'id_info_tes_hiv' => 'Sumber Info Tes HIV'
            ]
        );

        if($validator->fails()){
            return response()->json([
                'error' => $validator->errors()->all()
            ]);
        }

        InfoTesHivKonseling::UpdateOrCreate([
            'id_info_tes_hiv_konseling' => $request->id_info_tes_hiv_konseling], [
            'id_konseling' => $request->id_konseling2,
            'id_info_tes_hiv' => $request->id_info_tes_hiv
        ]);    

        return response()->json(['success'=>'Sumber Info Tes HIV berhasil disimpan.']);
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
     * @param  \App\Models\InfoTesHivKonseling  $InfoTesHivKonseling
     * @return \Illuminate\Http\Response
     */
    public function show(InfoTesHivKonseling $InfoTesHivKonseling)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InfoTesHivKonseling  $InfoTesHivKonseling
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = InfoTesHivKonseling::find($id);
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
     * @param  \App\Models\InfoTesHivKonseling  $InfoTesHivKonseling
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InfoTesHivKonseling $InfoTesHivKonseling)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InfoTesHivKonseling  $InfoTesHivKonseling
     * @return \Illuminate\Http\Response
     */
    public function destroy(InfoTesHivKonseling $InfoTesHivKonseling)
    {
        //
    }
}
