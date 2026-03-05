<?php

namespace App\Http\Controllers;

use App\Models\{
    AlasanTesHiv,
    InfoTesHiv,
    Kabupaten,
    KelompokResiko,
    KonselingHiv,
    Konselor,
    Pasien,
    Pekerjaan,
    Pendidikan,
    StatusPernikahan,
    TingkatResikoHiv
};
use Illuminate\Http\Request;

class KonselingHivController extends Controller
{

    public function index()
    {
        return view('konseling.index');
    }

    public function show($id)
    {
        $data = KonselingHiv::findOrFail($id);
        return view('konseling.detail', compact('data'));
    }

    public function create($idpasien)
    {
        $pasien = Pasien::findOrFail($idpasien);
        $kabupaten = Kabupaten::orderBy('nama', 'ASC')->where('deleted', 0)->get();
        $pekerjaan = Pekerjaan::orderBy('nama', 'ASC')->where('deleted', 0)->get();
        $pendidikan = Pendidikan::orderBy('nama', 'ASC')->where('deleted', 0)->get();
        $konselor = Konselor::orderBy('nama', 'ASC')->where('deleted', 0)->get();
        $alasanTesHiv = AlasanTesHiv::orderBy('nama', 'ASC')->where('deleted', 0)->get();
        $statusPernikahan = StatusPernikahan::orderBy('nama', 'ASC')->where('deleted', 0)->get();
        return view('konseling.form', compact('pasien','kabupaten','pekerjaan','pendidikan','konselor','alasanTesHiv','statusPernikahan'));
    }

    public function store(Request $request)
    {
        // Validasi dan simpan data konseling
        // ...implementasi validasi dan simpan seperti di controller lama...
    }

    public function edit($id)
    {
        $data = KonselingHiv::findOrFail($id);
        $kabupaten = Kabupaten::orderBy('nama', 'ASC')->where('deleted', 0)->get();
        $pekerjaan = Pekerjaan::orderBy('nama', 'ASC')->where('deleted', 0)->get();
        $pendidikan = Pendidikan::orderBy('nama', 'ASC')->where('deleted', 0)->get();
        $konselor = Konselor::orderBy('nama', 'ASC')->where('deleted', 0)->get();
        $alasanTesHiv = AlasanTesHiv::orderBy('nama', 'ASC')->where('deleted', 0)->get();
        $statusPernikahan = StatusPernikahan::orderBy('nama', 'ASC')->where('deleted', 0)->get();
        return view('konseling.form', compact('data','kabupaten','pekerjaan','pendidikan','konselor','alasanTesHiv','statusPernikahan'));
    }

    public function destroy($id)
    {
        $data = KonselingHiv::findOrFail($id);
        $data->deleted = 1;
        $data->save();
        return redirect()->route('konseling.index')->with('success', 'Data berhasil dihapus.');
    }
}
