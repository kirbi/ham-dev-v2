<?php

namespace App\Http\Controllers;

use App\Models\EfekSamping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DataTables;


class ReffEfekSampingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = EfekSamping::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
   
                        $btn = '<div class="btn-group"><a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id_efek_samping.'" data-original-title="Ubah" class="edit btn btn-primary btn-sm editProduct">Ubah</a>';
   
                        $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id_efek_samping.'" data-original-title="Hapus" class="btn btn-danger btn-sm deleteProduct">Hapus</a></div>';
 
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
      
        return view('admin.ref.efekSamping.index');
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
            'nama' => 'required',
            'kode' => 'required'
        ]);

        if($validator->fails()){
            return response()->json([
                'error' => $validator->errors()->all()
            ]);
        }

        EfekSamping::UpdateOrCreate([
            'id_efek_samping' => $request->id_efek_samping], [
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'kode' => $request->kode
        ]);    

        return response()->json(['success'=>'Efek Samping berhasil disimpan.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EfekSamping  $efekSamping
     * @return \Illuminate\Http\Response
     */
    public function show(EfekSamping $efekSamping)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EfekSamping  $efekSamping
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = EfekSamping::find($id);
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EfekSamping  $efekSamping
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EfekSamping $efekSamping)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EfekSamping  $efekSamping
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //cek data sudah dipakai apa belum baru hapus
        EfekSamping::find($id)->update(['deleted' => 1]);
     
        return response()->json(['success'=>'Data referensi berhasil dihapus.']);
    }

}
