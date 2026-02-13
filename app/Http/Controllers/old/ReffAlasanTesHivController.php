<?php

namespace App\Http\Controllers;

use App\Models\AlasanTesHiv;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DataTables;

class ReffAlasanTesHivController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = AlasanTesHiv::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
   
                        $btn = '<div class="btn-group"><a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id_alasan_tes_hiv.'" data-original-title="Ubah" class="edit btn btn-primary btn-sm editProduct">Ubah</a>';
   
                        $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id_alasan_tes_hiv.'" data-original-title="Hapus" class="btn btn-danger btn-sm deleteProduct">Hapus</a></div>';
 
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
      
        return view('admin.ref.alasanTesHiv.index');
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
        
        $validator =  Validator::make($request->all(), [
            'nama' => 'required'
        ]);

        if($validator->fails()){
            return response()->json([
                'error' => $validator->errors()->all()
            ]);
        }

        AlasanTesHiv::UpdateOrCreate([
            'id_alasan_tes_hiv' => $request->id_alasan_tes_hiv], [
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi
        ]);    

        return response()->json(['success'=>'Alasan Tes HIV berhasil disimpan.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AlasanTesHiv  $AlasanTesHiv
     * @return \Illuminate\Http\Response
     */
    public function show(AlasanTesHiv $AlasanTesHiv)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AlasanTesHiv  $AlasanTesHiv
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = AlasanTesHiv::find($id);
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AlasanTesHiv  $AlasanTesHiv
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AlasanTesHiv $alasanTesHiv)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AlasanTesHiv  $AlasanTesHiv
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        AlasanTesHiv::find($id)->update(['deleted' => 1]);
     
        return response()->json(['success'=>'Data referensi berhasil dihapus.']);
    }
}
