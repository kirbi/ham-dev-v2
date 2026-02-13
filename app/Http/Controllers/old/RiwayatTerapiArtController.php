<?php

namespace App\Http\Controllers;

use App\Models\JenisTerapi;
use App\Models\PaduanArt;
use App\Models\Pasien;
use App\Models\RiwayatTerapiArt;
use App\Models\TempatTerapi;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DataTables;

class RiwayatTerapiArtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $riwayatTerapiArt = RiwayatTerapiArt::orderBy('id_riwayat_terapi_art', 'DESC')->where(['deleted' => 0, 'pernah_menerima' => 'Ya'])->get();
        return view('admin.riwayatTerapiArt.index',compact('riwayatTerapiArt'));
    }

    public function konselorIndex(Request $request)
    {
        $riwayatTerapiArt = RiwayatTerapiArt::orderBy('id_riwayat_terapi_art', 'DESC')->where(['deleted' => 0, 'pernah_menerima' => 'Ya'])->get();
        return view('konselor.riwayatTerapiArt.index',compact('riwayatTerapiArt'));
    }

    public function getPasiens(Request $request){
        if ($request->has('q')) {
            $cari = $request->q;
            $data = RiwayatTerapiArt::select('id_pasien')->all();
            $empData['data'] = Pasien::orderby("name","asc")
                ->whereNotIn('id_pasien', $data)
                ->where('nama','LIKE','%'.$cari.'%')
                ->select('id_pasien','nama')
                ->get();
            return response()->json($empData);
        }
         
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add($id)
    {    $id = $id;
        return view('admin.riwayatTerapiArt.add', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addStore(Request $request)
    {
        if($request->pernah_menerima == 'Ya'){
            $validator =  Validator::make($request->all(), 
                [
                    'id_pasien' => 'integer|required',
                    'dosis_art' => 'required|max:100',
                    'lama_penggunaan' => 'required|max:250',
                    'pernah_menerima' => 'required|max:25',
                    'id_jenis_terapi_art' => 'integer|required',
                    'id_tempat_art' => 'integer|required',
                    'id_paduan_art' => 'integer|required'
                ],
                [],
                [
                    
                    'id_pasien' => 'Nama Pasien',
                    'dosis_art' => 'Dosis',
                    'lama_penggunaan' => 'Lama Penggunaan',
                    'pernah_menerima' => 'Pernah Menerima',
                    'id_jenis_terapi_art' => 'Jenis ART',
                    'id_tempat_art' => 'Tempat ART',
                    'id_paduan_art' => 'Paduan ART'
                ]
            );

            if($validator->fails()){
                return response()->json([
                    'error' => $validator->errors()->all()
                ]);
            }
        }
        RiwayatTerapiArt::UpdateOrCreate([
            'id_riwayat_terapi_art' => $request->id_riwayat_terapi_art], [
            'id_pasien' => $request->id_pasien,
            'pernah_menerima' => $request->pernah_menerima,
            'id_jenis_terapi_art' => $request->id_jenis_terapi_art,
            'id_tempat_art' => $request->id_tempat_art,
            'id_paduan_art' => $request->id_paduan_art,
            'dosis_art' => $request->dosis_art,
            'lama_penggunaan' => $request->lama_penggunaan
        ]);    

        return response()->json(['success'=>'Pasien berhasil disimpan.']);
    }
    
    public function konselorStore(Request $request)
    {
       return $this->addStore($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RiwayatTerapiArt  $riwayatTerapiArt
     * @return \Illuminate\Http\Response
     */
    public function show(RiwayatTerapiArt $riwayatTerapiArt)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RiwayatTerapiArt  $riwayatTerapiArt
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = RiwayatTerapiArt::find($id);
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
     * @param  \App\Models\RiwayatTerapiArt  $riwayatTerapiArt
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RiwayatTerapiArt $riwayatTerapiArt)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RiwayatTerapiArt  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = RiwayatTerapiArt::find($id);
        $data->deleted = 1;
        $data->save();
        return response()->json($data);
    }
}
