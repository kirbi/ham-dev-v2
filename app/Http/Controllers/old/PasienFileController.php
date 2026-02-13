<?php

namespace App\Http\Controllers;

use App\Models\{
    Pasien,
    PasienFile
};

use Mpdf\Mpdf;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;
use DataTables;

class PasienFileController extends Controller
{
    public function index(Request $request)
    {
        $data = PasienFile::get();
        return view('admin.terapiArt.index',compact('data'));
    }
    public function store(Request $request)
    {
        // $request->validate([
        //     'name' => 'required',
        //     'detail' => 'required',
        //     'berkas' => 'required|max:2048',
        // ]);
  
        // $input = $request->all();
  
        // if ($request->hasFile('berkas')) {
        //     $berkas = $request->file('berkas');
        //     $destinationPath = 'filepasien/';
        //     $profileImage = date('YmdHis') . "." . $berkas->getClientOriginalExtension();
        //     $berkas->move($destinationPath, $profileImage);
        //     $input['berkas'] = "$profileImage";
        // }
    
        // PasienFile::create($input);
     
        // return response()->json(['success'=>'Terapi ART Pasien berhasil disimpan.']);
    }
     
    public function addStore(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'id_pasien9' => 'integer|required',
        ]);
        if ($berkas = $request->file('berkas')) {
            $berkasLama = null;
            if($request->id_file){
                $filelama = PasienFile::find($request->id_file);
                $berkasLama = $filelama->berkas;
            }
            $destinationPath = 'filepasien/';
            $namaberkas = date('YmdHis') . "." . $berkas->getClientOriginalExtension();
            $berkas->move($destinationPath, $namaberkas);
            $path = "/$destinationPath$namaberkas";
           if( PasienFile::UpdateOrCreate([
                'id_file' => $request->id_file],[
                'nama' => $request->nama,
                'id_pasien' => $request->id_pasien9,
                'berkas' => $namaberkas,
                'path' => $path
                ]))
            {
                if($berkasLama){
                    unset($berkasLama);
                };
                return response()->json(['success'=>'File Pasien berhasil disimpan.']);
            }
           
        }else if($request->nama && $request->id_file){
            PasienFile::UpdateOrCreate([
                'id_file' => $request->id_file],[
                'nama' => $request->nama,
            ]);
            return response()->json(['success'=>'File Pasien berhasil disimpan.']);
        }

        return response()->json(['error'=>'File Pasien tidak berhasil disimpan.']);
     
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\PasienFile  $pasienFile
     * @return \Illuminate\Http\Response
     */
    public function show(PasienFile $pasienFile)
    {

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PasienFile  $pasienFile
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = PasienFile::find($id);
        return response()->json($data);
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PasienFile  $pasienFile
     * @return \Illuminate\Http\Response
     */
   
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PasienFile  $pasienFile
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $filelama = PasienFile::find($id);
        unset($filelama->berkas);
        $filelama->delete();
     
        return response()->json(['success'=>'File Pasien berhasil dihapus.']);
    }
}
