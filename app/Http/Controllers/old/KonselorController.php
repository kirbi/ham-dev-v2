<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DataTables;

use App\Models\{
    Konselor,
    Pendidikan,
    StatusPernikahan,
    User
};
class KonselorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Konselor::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
   
                        $btn = '<div class="btn-group"><a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id_konselor.'" data-original-title="Ubah" class="edit btn btn-primary btn-sm editProduct">Ubah</a>';
                        $btn = $btn.' <a href="/admin/konselor/detail/'.$row->id_konselor.'" class="btn btn-success btn-sm">Detail</a></div>';
                        $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id_konselor.'" data-original-title="Hapus" class="btn btn-danger btn-sm deleteProduct">Hapus</a></div>';
 
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        $pendidikan = Pendidikan::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        $statusPernikahan = StatusPernikahan::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        return view('admin.konselor.index', compact('pendidikan', 'statusPernikahan'));
    }
    public function KonselorIndex(Request $request)
    {
        if ($request->ajax()) {
            $data = Konselor::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn = ' <a href="/konselor/konselor/detail/'.$row->id_konselor.'" class="btn btn-success btn-sm">Detail</a></div>';
 
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('konselor.konselor.index');
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
            'nama' => 'required|max:250',
            'email' => 'required|max:100',
            'alamat' => 'required|max:250',
            'no_hp' => 'required|max:25',
            'nik' => 'required|max:30',
            'nip' => 'required|max:30',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required|max:250',
            'tanggal_lahir' => 'required|DATE',
            'id_pendidikan' => 'required|integer',
            'tanggal_sertifikasi' => 'required|date',
            'status_pegawai' => 'required',
            'id_status_pernikahan' => 'required|integer'
        ]);

        if($validator->fails()){
            return response()->json([
                'error' => $validator->errors()->all()
            ]);
        }

        Konselor::UpdateOrCreate([
            'id_konselor' => $request->id_konselor], [
            'nama' => $request->nama,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp, 
            'nik' => $request->nik,
            'nip' => $request->nip,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'id_pendidikan' => $request->id_pendidikan,
            'tanggal_sertifikasi' => $request->tanggal_sertifikasi,
            'status_pegawai' => $request->status_pegawai,
            'id_status_pernikahan' => $request->id_status_pernikahan
        ]);    

        return response()->json(['success'=>'Konselor berhasil disimpan.']);
    }
/**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeAkun(Request $request)
    {
        $datauser =[
            'id' => $request->id,
            'email' => $request->email,
            'name' => $request->name,
            'password' => $request->password];
       
        $validator =  Validator::make($datauser, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        if($validator->fails()){
            return response()->json([
                'error' => $validator->errors()->all()
            ]);
        }

        User::UpdateOrCreate([
            'id' => $datauser['id']], [
            'name' => $datauser['name'],
            'email' => $datauser['email'],
            'password' => Hash::make($datauser['password']),
            'type' => 2, 
        ]);    
        return response()->json(['success'=>'Akun Konselor berhasil disimpan.']);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Konselor  $konselor
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Konselor::find($id);
        $user = User::select('*')->where('email',$data->email)->first();
        return view('admin.konselor.view', compact('data', 'user'));

    }

    public function konselorShow($id)
    {
        $data = Konselor::find($id);
        $user = User::select('*')->where('email',$data->email)->first();
        return view('konselor.konselor.view', compact('data', 'user'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Konselor  $konselor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Konselor::find($id);
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Konselor  $konselor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Konselor $konselor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Konselor  $konselor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Konselor::find($id)->update(['deleted' => 1]);
     
        return response()->json(['success'=>'Data referensi berhasil dihapus.']);
    }
}
