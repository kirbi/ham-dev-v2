<?php

namespace App\Http\Controllers;

use App\Models\{SosialisasiHiv,
    Kabupaten,
    Kecamatan};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DataTables;

class SosialisasiHivController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = SosialisasiHiv::orderBy('tanggal_kegiatan', 'DESC')->where(['deleted' => 0])->get();
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
                            $btn = '<div class="btn-group"><a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id_sosialisasi_hiv.'" data-original-title="Ubah" class="edit btn btn-primary btn-sm editProduct">Ubah</a>';
                            $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id_sosialisasi_hiv.'" data-original-title="Hapus" class="btn btn-success btn-sm detailProduct">Detail</a></div>';
                            $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id_sosialisasi_hiv.'" data-original-title="Hapus" class="btn btn-danger btn-sm deleteProduct">Hapus</a></div>';
                            return $btn;
                        })
                    ->rawColumns(['action'])
                    ->addIndexColumn()
                    ->make(true);
        }
        $kabupaten = Kabupaten::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        return view('admin.sosialisasiHiv.index', compact('kabupaten'));
    }
    public function konselorIndex(Request $request)
    {
        if ($request->ajax()) {
            $data = SosialisasiHiv::orderBy('tanggal_kegiatan', 'DESC')->where(['deleted' => 0])->get();
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
                            $btn = '<div class="btn-group"><a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id_sosialisasi_hiv.'" data-original-title="Ubah" class="edit btn btn-primary btn-sm editProduct">Ubah</a>';
                            $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id_sosialisasi_hiv.'" data-original-title="Hapus" class="btn btn-success btn-sm detailProduct">Detail</a></div>';
                            return $btn;
                        })
                    ->rawColumns(['action'])
                    ->addIndexColumn()
                    ->make(true);
        }
        $kabupaten = Kabupaten::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        return view('konselor.sosialisasiHiv.index', compact('kabupaten'));
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
            'tempat_kegiatan' => 'required|max:250',
            'tanggal_kegiatan' => 'required|date',
            'peserta_hadir' => 'integer|required',
            'id_kabupaten' => 'integer|required',
            'id_kecamatan' => 'integer|required',
            'nama_narahubung' => 'required|max:250',
            'kontak_narahubung' => 'required|max:50'
        ]);

        if($validator->fails()){
            return response()->json([
                'error' => $validator->errors()->all()
            ]);
        }

        SosialisasiHiv::UpdateOrCreate([
            'id_sosialisasi_hiv' => $request->id_sosialisasi_hiv], [
            'nama_kegiatan' => $request->nama_kegiatan,
            'tempat_kegiatan' => $request->tempat_kegiatan,
            'target_kegiatan' => $request->target_kegiatan,
            'tanggal_kegiatan' => $request->tanggal_kegiatan,
            'peserta_hadir' => $request->peserta_hadir,
            'id_kabupaten' => $request->id_kabupaten,
            'id_kecamatan' => $request->id_kecamatan,
            'nama_narahubung' => $request->nama_narahubung,
            'kontak_narahubung' => $request->kontak_narahubung
        ]);    

        return response()->json(['success'=>'Kegiatan Sosialisasi HIV berhasil disimpan.']);
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
        $data = SosialisasiHiv::with(['kabupaten', 'kecamatan'])->find($id);
        return response()->json($data);
    }
    public function konselorEdit($id){
        return $this->edit($id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SosialisasiHiv  $SosialisasiHiv
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = SosialisasiHiv::with(['kabupaten', 'kecamatan'])->find($id);
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
        $data = SosialisasiHiv::find($id);
        $data->deleted = 1;
        $data->save();
        return response()->json($data);
    }
}
