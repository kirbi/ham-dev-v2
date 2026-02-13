<?php

namespace App\Http\Controllers;

use App\Models\KelompokResikoKonseling;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DataTables;

class KelompokResikoKonselingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = KelompokResikoKonseling::orderBy('tanggal_mulai', 'DESC')->where(['deleted' => 0])->get();
        return view('admin.KelompokResikoKonseling.index',compact('data'));
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
                'id_konseling1' => 'integer|required',
                'lama_tahun' => 'required',
                'lama_bulan' => 'required',
                'id_kelompok_resiko' => 'required'
            ],
            [],
            [
                'id_kelompok_resiko1' => 'Kelompok Resiko',
                'lama_tahun' => 'Lama Tahun',
                'lama_bulan' => 'Lama Bulan',
            ]
        );

        if($validator->fails()){
            return response()->json([
                'error' => $validator->errors()->all()
            ]);
        }

        KelompokResikoKonseling::UpdateOrCreate([
            'id_kelompok_resiko_konseling' => $request->id_kelompok_resiko_konseling], [
            'id_konseling' => $request->id_konseling1,
            'id_kelompok_resiko' => $request->id_kelompok_resiko,
            'lama_tahun' => $request->lama_tahun,
            'lama_bulan' => $request->lama_bulan
        ]);    

        return response()->json(['success'=>'Kelompok resiko pasien berhasil disimpan.']);
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
     * @param  \App\Models\KelompokResikoKonseling  $kelompokResikoKonseling
     * @return \Illuminate\Http\Response
     */
    public function show(KelompokResikoKonseling $kelompokResikoKonseling)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KelompokResikoKonseling  $kelompokResikoKonseling
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = KelompokResikoKonseling::find($id);
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
     * @param  \App\Models\KelompokResikoKonseling  $kelompokResikoKonseling
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KelompokResikoKonseling $kelompokResikoKonseling)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KelompokResikoKonseling  $kelompokResikoKonseling
     * @return \Illuminate\Http\Response
     */
    public function destroy(KelompokResikoKonseling $kelompokResikoKonseling)
    {
        //
    }
}
