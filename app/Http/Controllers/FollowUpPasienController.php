<?php

namespace App\Http\Controllers;

use App\Models\{
    AdherenceArt,
    EfekSamping,
    InfeksiOportunistik,
    PaduanArt,
    Pasien,
    RiwayatPerawatanPasien,
    StatusTb,
    StatusFungsional
};
use Illuminate\Http\Request;

class FollowUpPasienController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:admin,konselor']);
    }

    public function index()
    {
        return view('followup.index');
    }

    public function show($id)
    {
        $data = RiwayatPerawatanPasien::findOrFail($id);
        return view('followup.detail', compact('data'));
    }

    public function create($idpasien)
    {
        $pasien = Pasien::findOrFail($idpasien);
        $adherenceArt = AdherenceArt::orderBy('nama', 'ASC')->where('deleted', 0)->get();
        $efekSamping = EfekSamping::orderBy('nama', 'ASC')->where('deleted', 0)->get();
        $infeksiOportunistik = InfeksiOportunistik::orderBy('nama', 'ASC')->where('deleted', 0)->get();
        $paduanArt = PaduanArt::orderBy('nama', 'ASC')->where('deleted', 0)->get();
        $statusFungsional = StatusFungsional::orderBy('nama', 'ASC')->where('deleted', 0)->get();
        $statusTb = StatusTb::orderBy('nama', 'ASC')->where('deleted', 0)->get();
        return view('followup.form', compact('pasien','adherenceArt','efekSamping','infeksiOportunistik','paduanArt','statusFungsional','statusTb'));
    }

    public function store(Request $request)
    {
        // Validasi dan simpan data follow up
        // ...implementasi validasi dan simpan seperti di controller lama...
    }

    public function edit($id)
    {
        $data = RiwayatPerawatanPasien::findOrFail($id);
        $adherenceArt = AdherenceArt::orderBy('nama', 'ASC')->where('deleted', 0)->get();
        $efekSamping = EfekSamping::orderBy('nama', 'ASC')->where('deleted', 0)->get();
        $infeksiOportunistik = InfeksiOportunistik::orderBy('nama', 'ASC')->where('deleted', 0)->get();
        $paduanArt = PaduanArt::orderBy('nama', 'ASC')->where('deleted', 0)->get();
        $statusFungsional = StatusFungsional::orderBy('nama', 'ASC')->where('deleted', 0)->get();
        $statusTb = StatusTb::orderBy('nama', 'ASC')->where('deleted', 0)->get();
        return view('followup.form', compact('data','adherenceArt','efekSamping','infeksiOportunistik','paduanArt','statusFungsional','statusTb'));
    }

    public function destroy($id)
    {
        $data = RiwayatPerawatanPasien::findOrFail($id);
        $data->deleted = 1;
        $data->save();
        return redirect()->route('followup.index')->with('success', 'Data berhasil dihapus.');
    }
}
