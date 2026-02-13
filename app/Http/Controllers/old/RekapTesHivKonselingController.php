<?php

namespace App\Http\Controllers;

use App\Models\RekapTesHivKonseling;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DataTables;

class RekapTesHivKonselingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = RekapTesHivKonseling::orderBy('tanggal', 'ASC')->where(['deleted' => 0])->get();
        return view('admin.rekapTesHivKonseling.index',compact('data'));
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
                'id_konseling5' => 'integer|required',
                'hasil' => 'required',
                'tanggal' => 'required|date',
                'tempat_tes' => 'required'
            ],
            [],
            [
                'hasil' => 'Hasil',
                'tanggal' => 'Tanggal',
                'tempat_tes' => 'Tempat Tes'
            ]
        );

        if($validator->fails()){
            return response()->json([
                'error' => $validator->errors()->all()
            ]);
        }

        RekapTesHivKonseling::UpdateOrCreate([
            'id_rekap_tes_hiv_konseling' => $request->id_rekap_tes_hiv_konseling], [
            'id_konseling' => $request->id_konseling5,
            'hasil' => $request->hasil,
            'tempat_tes' => $request->tempat_tes,
            'tanggal' => $request->tanggal,
        ]);    

        return response()->json(['success'=>'Rekap Tes HIV berhasil disimpan.']);
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
     * @param  \App\Models\RekapTesHivKonseling  $RekapTesHivKonseling
     * @return \Illuminate\Http\Response
     */
    public function show(RekapTesHivKonseling $RekapTesHivKonseling)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RekapTesHivKonseling  $RekapTesHivKonseling
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = RekapTesHivKonseling::find($id);
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
     * @param  \App\Models\RekapTesHivKonseling  $RekapTesHivKonseling
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RekapTesHivKonseling $RekapTesHivKonseling)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RekapTesHivKonseling  $RekapTesHivKonseling
     * @return \Illuminate\Http\Response
     */
    public function destroy(RekapTesHivKonseling $RekapTesHivKonseling)
    {
        //
    }
}
