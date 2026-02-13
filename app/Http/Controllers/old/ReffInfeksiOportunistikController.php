<?php

namespace App\Http\Controllers;

use App\Models\InfeksiOportunistik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DataTables;

class ReffInfeksiOportunistikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = InfeksiOportunistik::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
   
                        $btn = '<div class="btn-group"><a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id_infeksi_oportunistik.'" data-original-title="Ubah" class="edit btn btn-primary btn-sm editProduct">Ubah</a>';
   
                        $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id_infeksi_oportunistik.'" data-original-title="Hapus" class="btn btn-danger btn-sm deleteProduct">Hapus</a></div>';
 
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
      
        return view('admin.ref.infeksiOportunistik.index');
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

        InfeksiOportunistik::UpdateOrCreate([
            'id_infeksi_oportunistik' => $request->id_infeksi_oportunistik], [
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'kode' => $request->kode
        ]);    

        return response()->json(['success'=>'Infeksi Oportunistik berhasil disimpan.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InfeksiOportunistik  $infeksiOportunistik
     * @return \Illuminate\Http\Response
     */
    public function show(InfeksiOportunistik $infeksiOportunistik)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InfeksiOportunistik  $infeksiOportunistik
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = InfeksiOportunistik::find($id);
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\InfeksiOportunistik  $infeksiOportunistik
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InfeksiOportunistik $infeksiOportunistik)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InfeksiOportunistik  $infeksiOportunistik
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        InfeksiOportunistik::find($id)->update(['deleted' => 1]);
     
        return response()->json(['success'=>'Data referensi berhasil dihapus.']);
    }
}
