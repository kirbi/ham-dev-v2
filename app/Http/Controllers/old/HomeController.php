<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pasien;
use App\Models\PengobatanTbHiv;
use App\Models\RiwayatPerawatanPasien;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function adminHome()
    {
        $pasien = [
            'aktif' => Pasien::pasienAktif(),
            'tidakAktif' => Pasien::pasienTidakAktif(),
            'dirujuk' =>  Pasien::pasienDirujuk(),
            'meninggal' =>  Pasien::pasienMeninggal(),
            'telatFollowup' => RiwayatPerawatanPasien::jumlahPasienTelatFollowup(),
            'pasienTelatFollowup' => RiwayatPerawatanPasien::pasienTelatFollowup(),
            'hivtb' => PengobatanTbHiv::jumlahPasienSedangPengobatanTb(),
            'tb'  =>  PengobatanTbHiv::jumlahPasienTb(),
            'pasienRujukan' => Pasien::pasienRujukan(),
            'pasienBaru' => Pasien::pasienBaru(),
            'jumlahpPasienAkanFollowup' => RiwayatPerawatanPasien::jumlahPasienAkanFollowup(),
            'pasienAkanFollowup' => RiwayatPerawatanPasien::pasienAkanFollowup(),
            'jumlahPasienTelatFollowup' => RiwayatPerawatanPasien::jumlahPasienTelatFollowup(),
            'pasienTelatFollowup' => RiwayatPerawatanPasien::pasienTelatFollowup(),
        ];
        return view('admin.adminHome', compact('pasien'));
    }

    public function konselorHome()
    {
        $pasien = [
            'aktif' => Pasien::pasienAktif(),
            'tidakAktif' => Pasien::pasienTidakAktif(),
            'dirujuk' =>  Pasien::pasienDirujuk(),
            'meninggal' =>  Pasien::pasienMeninggal(),
            'telatFollowup' => RiwayatPerawatanPasien::jumlahPasienTelatFollowup(),
            'pasienTelatFollowup' => RiwayatPerawatanPasien::pasienTelatFollowup(),
            'hivtb' => PengobatanTbHiv::jumlahPasienSedangPengobatanTb(),
            'tb'  =>  PengobatanTbHiv::jumlahPasienTb(),
            'pasienRujukan' => Pasien::pasienRujukan(),
            'pasienBaru' => Pasien::pasienBaru(),
            'jumlahpPasienAkanFollowup' => RiwayatPerawatanPasien::jumlahPasienAkanFollowup(),
            'pasienAkanFollowup' => RiwayatPerawatanPasien::pasienAkanFollowup(),
            'jumlahPasienTelatFollowup' => RiwayatPerawatanPasien::jumlahPasienTelatFollowup(),
            'pasienTelatFollowup' => RiwayatPerawatanPasien::pasienTelatFollowup(),
        ];
        return view('konselor.konselorHome', compact('pasien'));
    }

    public function superadminHome()
    {
        return view('superadminHome');
    }
    
}
