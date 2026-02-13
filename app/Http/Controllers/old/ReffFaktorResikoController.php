<?php

namespace App\Http\Controllers;

use App\Models\FaktorResiko;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DataTables;

class ReffFaktorResikoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = FaktorResiko::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn = '<div class="btn-group"><a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id_faktor_resiko.'" data-original-title="Ubah" class="edit btn btn-primary btn-sm editProduct">Ubah</a>';
                        $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id_faktor_resiko.'" data-original-title="Hapus" class="btn btn-danger btn-sm deleteProduct">Hapus</a></div>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
      
        return view('admin.ref.faktorResiko.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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

        FaktorResiko::UpdateOrCreate([
            'id_faktor_resiko' => $request->id_faktor_resiko], [
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi
        ]);    

        return response()->json(['success'=>'Faktor Resiko berhasil disimpan.']);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FaktorResiko  $faktorResiko
     * @return \Illuminate\Http\Response
     */
    public function show(FaktorResiko $faktorResiko)
    { 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FaktorResiko  $faktorResiko
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = FaktorResiko::find($id);
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FaktorResiko  $faktorResiko
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FaktorResiko $faktorResiko)
    { 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FaktorResiko  $faktorResiko
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        FaktorResiko::find($id)->update(['deleted' => 1]);
     
        return response()->json(['success'=>'Data referensi berhasil dihapus.']);
    }
}
