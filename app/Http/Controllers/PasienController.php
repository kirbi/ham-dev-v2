<?php

namespace App\Http\Controllers;

use App\Models\{
    AlasanSubstitusi,
    Desa,
    EntryPoint,
    FaktorResiko,
    IndikasiInisiasiArt,
    JenisKelamin,
    JenisTerapi,
    Kecamatan,
    Kabupaten,
    Konselor,
    KategoriPemeriksaan,
    KlasifikasiTb,
    MitraSeksual,
    PaduanArt,
    PaduanTb,
    Pasien,
    Pekerjaan,
    Pendidikan,
    Provinsi,
    StatusFungsional,
    StatusPernikahan,
    StatusHiv,
    TempatTerapi,
    TipeTb,
    AdherenceArt,
    EfekSamping,
    InfeksiOportunistik,
    RiwayatPerawatanPasien,
    StatusTb,
};

use Illuminate\Http\Request;

class PasienController extends Controller
{
    /**
     * Constructor - Apply middleware
     */
    public function __construct()
    {
        $this->middleware(['auth', 'role:admin,konselor']);
    }

    /**
     * Display a listing of the resource.
     * This method is now shared by both admin and konselor roles.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('pasien.index');
    }

    /**
     * Show the detail view for a patient
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $data = Pasien::findOrFail($id);
        
        // Load all reference data
        $tempatTerapi = TempatTerapi::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        $jenisTerapi = JenisTerapi::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        $paduanArt = PaduanArt::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        $statusHiv = StatusHiv::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        $mitraSeksual = MitraSeksual::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        $tipeTb = TipeTb::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        $klasifikasiTb = KlasifikasiTb::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        $paduanTb = PaduanTb::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        $kabupaten = Kabupaten::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        $provinsi = Provinsi::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        $statusFungsional = StatusFungsional::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        $kategoriPemeriksaan = KategoriPemeriksaan::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        $iiArt = IndikasiInisiasiArt::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        $entryPoint = EntryPoint::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        $alasanSubstitusi = AlasanSubstitusi::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        $faktorResiko = FaktorResiko::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();

        return view('pasien.view', compact(
            'alasanSubstitusi',
            'data',
            'entryPoint',
            'faktorResiko',
            'iiArt',
            'jenisTerapi',
            'klasifikasiTb',
            'kabupaten',
            'kategoriPemeriksaan',
            'mitraSeksual',
            'paduanArt',
            'paduanTb',
            'provinsi',
            'statusHiv',
            'statusFungsional',
            'tempatTerapi',
            'tipeTb',
        ));
    }

    /**
     * Download patient data as PDF
     * Only accessible by admin role
     *
     * @param  int  $id
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function download($id)
    {
        // Check if user is admin
        if (auth()->user()->type !== 'admin') {
            abort(403, 'Only administrators can download patient data.');
        }

        $data = Pasien::findOrFail($id);
        $paduanArt = PaduanArt::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        $adherenceArt = AdherenceArt::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        $efekSamping = EfekSamping::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        $infeksiOportunistik = InfeksiOportunistik::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        $statusFungsional = StatusFungsional::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        $statusTb = StatusTb::orderBy('nama', 'ASC')->where(['deleted' => 0])->get();
        $followupArt = RiwayatPerawatanPasien::orderBy('tanggal_pengobatan', 'ASC')
            ->where(['id_pasien' => $id, 'deleted' => 0])
            ->get();

        $content = view('pasien.pdf', compact(
            'data',
            'followupArt',
            'paduanArt',
            'adherenceArt',
            'efekSamping',
            'infeksiOportunistik',
            'statusFungsional',
            'statusTb'
        ));

        $mpdf = new \Mpdf\Mpdf([
            'mode' => 'utf-8',
            'format' => 'A4',
            'default_font_size' => 0,
            'default_font' => '',
            'margin_left' => 15,
            'margin_right' => 15,
            'margin_top' => 5,
            'margin_bottom' => 16,
            'margin_header' => 9,
            'margin_footer' => 9,
            'orientation' => 'L'
        ]);

        $mpdf->setFooter('HKBP AIDS MINISTRY|{DATE d-m-Y}|Halaman {PAGENO}');
        $mpdf->WriteHTML($content);
        $mpdf->Output('Data Pasien HIV ' . $data->nama . '.pdf', "D");
        exit;
    }
}
