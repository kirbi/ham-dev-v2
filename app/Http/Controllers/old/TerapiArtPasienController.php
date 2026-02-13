<?php

namespace App\Http\Controllers;

use App\Models\TerapiArtPasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DataTables;

class TerapiArtPasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = TerapiArtPasien::orderBy('tanggal_mulai', 'DESC')->where(['deleted' => 0])->get();
        return view('admin.terapiArt.index',compact('data'));
    }
    public function konselorIndex(Request $request)
    {
        $data = TerapiArtPasien::orderBy('tanggal_mulai', 'DESC')->where(['deleted' => 0])->get();
        return view('konselor.terapiArt.index',compact('data'));
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
                'id_pasien6' => 'integer|required',
                'tanggal_mulai' => 'required',
                'fase' => 'required',
                'id_alasan' => 'required',
                'penjelasan' => 'max:250',
                'id_paduan_art6' => 'integer|required',
            ],
            [],
            [
                
                'id_pasien6' => 'Nama Pasien',
                'tanggal_mulai' => 'Tanggal Mulai',
                'fase' => 'Fase',
                'id_alasan' => 'Alasan',
                'penjelasan' => 'Penjelasan',
                'id_paduan_art6' => 'Paduan ART',
            ]
        );

        if($validator->fails()){
            return response()->json([
                'error' => $validator->errors()->all()
            ]);
        }

        TerapiArtPasien::UpdateOrCreate([
            'id_terapi_art_pasien' => $request->id_terapi_art_pasien], [
            'id_pasien' => $request->id_pasien6,
            'tanggal_mulai' => $request->tanggal_mulai,
            'fase' => $request->fase,
            'id_alasan' => $request->id_alasan,
            'penjelasan' => $request->penjelasan,
            'id_paduan_art' => $request->id_paduan_art6,
        ]);    

        return response()->json(['success'=>'Terapi ART Pasien berhasil disimpan.']);
    }
        
    public function konselorStore(Request $request)
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
     * @param  \App\Models\TerapiArtPasien  $terapiArt
     * @return \Illuminate\Http\Response
     */
    public function show(TerapiArtPasien $terapiArt)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TerapiArt  $terapiArt
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = TerapiArtPasien::find($id);
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
     * @param  \App\Models\TerapiArt  $terapiArt
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TerapiArtPasien $terapiArt)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TerapiArt  $terapiArt
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TerapiArtPasien::find($id)->update(['deleted' => 1]);
        return response()->json(['success'=>'Data berhasil dihapus.']);
    }
}
