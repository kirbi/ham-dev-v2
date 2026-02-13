<?php

namespace App\Http\Controllers;

use App\Models\{CheckHiv,
    Kabupaten,
    Kecamatan};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DataTables;

class CheckHivController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = CheckHiv::orderBy('tanggal_kegiatan', 'DESC')->where(['deleted' => 0])->get();
            return DataTables::of($data)
                        ->addColumn('kabupaten', function($data) {
                            if(!empty($data->id_kabupaten)){
                                return $data->kabupaten->nama;
                            }else{
                                return '-';
                            }
                        })
                        ->addColumn('kecamatan', function($data) {
                            if(!empty($data->id_kecamatan)){
                                return $data->kecamatan->nama;
                            }else{
                                return '-';
                            }
                        })
                        ->addColumn('action', function($row){
                            $btn = '<div class="btn-group"><a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id_check_hiv.'" data-original-title="Ubah" class="edit btn btn-primary btn-sm editProduct">Ubah</a>';
                            $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id_check_hiv.'" data-original-title="Hapus" class="btn btn-success btn-sm detailProduct">Detail</a></div>';
                            $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id_check_hiv.'" data-original-title="Hapus" class="btn btn-danger btn-sm deleteProduct">Hapus</a></div>';
                            return $btn;
                        })
                    ->rawColumns(['action'])
                    ->addIndexColumn()
                    ->make(true);
        }
        $kabupaten = Kabupaten::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        return view('admin.checkHiv.index', compact('kabupaten'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function konselorIndex(Request $request)
    {
        if ($request->ajax()) {
            $data = CheckHiv::orderBy('tanggal_kegiatan', 'DESC')->where(['deleted' => 0])->get();
            return DataTables::of($data)
                        ->addColumn('kabupaten', function($data) {
                            if(!empty($data->id_kabupaten)){
                                return $data->kabupaten->nama;
                            }else{
                                return '-';
                            }
                        })
                        ->addColumn('kecamatan', function($data) {
                            if(!empty($data->id_kecamatan)){
                                return $data->kecamatan->nama;
                            }else{
                                return '-';
                            }
                        })
                        ->addColumn('action', function($row){
                            $btn = '<div class="btn-group"><a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id_check_hiv.'" data-original-title="Ubah" class="edit btn btn-primary btn-sm editProduct">Ubah</a>';
                            $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id_check_hiv.'" data-original-title="Hapus" class="btn btn-success btn-sm detailProduct">Detail</a></div>';
                            return $btn;
                        })
                    ->rawColumns(['action'])
                    ->addIndexColumn()
                    ->make(true);
        }
        $kabupaten = Kabupaten::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        return view('konselor.checkHiv.index', compact('kabupaten'));
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
            'nama_kegiatan' => 'required|max:150' ,
            'nama_tempat' => 'required|max:250',
            'tanggal_kegiatan' => 'required|date',
            'hadir' => 'integer|required',
            'jumlah_positif' => 'integer|required',
            'jumlah_negatif' => 'integer|required',
            'id_kabupaten' => 'integer|required',
            'id_kecamatan' => 'integer|required',
            'nama_narahubung' => 'required|max:250',
            'kontak_narahubung' => 'required|max:50',
        ]);

        if($validator->fails()){
            return response()->json([
                'error' => $validator->errors()->all()
            ]);
        }

        CheckHiv::UpdateOrCreate([
            'id_check_hiv' => $request->id_check_hiv], [
            'nama_kegiatan' => $request->nama_kegiatan,
            'nama_tempat' => $request->nama_tempat,
            'deskripsi_kegiatan' => $request->deskripsi_kegiatan,
            'tanggal_kegiatan' => $request->tanggal_kegiatan,
            'hadir' => $request->hadir,
            'jumlah_positif' => $request->jumlah_positif,
            'jumlah_negatif' => $request->jumlah_negatif,
            'id_kabupaten' => $request->id_kabupaten,
            'id_kecamatan' => $request->id_kecamatan,
            'nama_narahubung' => $request->nama_narahubung,
            'kontak_narahubung' => $request->kontak_narahubung
        ]);    

        return response()->json(['success'=>'Kegiatan Check HIV berhasil disimpan.']);
    }

    public function konselorStore(Request $request){
        return $this->store($request);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = CheckHiv::with(['kabupaten', 'kecamatan'])->find($id);
        return response()->json($data);
    }
    public function konselorEdit($id){
        return $this->edit($id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CheckHiv  $CheckHiv
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = CheckHiv::with(['kabupaten', 'kecamatan'])->find($id);
        return response()->json($data);
    }
    public function konselorShow($id)
    {
        return $this->show($id);
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = CheckHiv::find($id);
        $data->deleted = 1;
        $data->save();
        return response()->json($data);
    }
}
