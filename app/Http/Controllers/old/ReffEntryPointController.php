<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EntryPoint;
use Illuminate\Support\Facades\Validator;
use DataTables;

class ReffEntryPointController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = EntryPoint::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn = '<div class="btn-group"><a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id_entry_point.'" data-original-title="Ubah" class="edit btn btn-primary btn-sm editProduct">Ubah</a>';
                        $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id_entry_point.'" data-original-title="Hapus" class="btn btn-danger btn-sm deleteProduct">Hapus</a></div>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
      
        return view('admin.ref.entryPoint.index');
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

        EntryPoint::UpdateOrCreate([
            'id_entry_point' => $request->id_entry_point], [
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi
        ]);    

        return response()->json(['success'=>'Entry Point berhasil disimpan.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EntryPoint  $EntryPoint
     * @return \Illuminate\Http\Response
     */
    public function show(EntryPoint $EntryPoint)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EntryPoint  $EntryPoint
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = EntryPoint::find($id);
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EntryPoint  $EntryPoint
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EntryPoint $EntryPoint)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EntryPoint  $EntryPoint
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        EntryPoint::find($id)->update(['deleted' => 1]);
     
        return response()->json(['success'=>'Data referensi berhasil dihapus.']);
    }
}
