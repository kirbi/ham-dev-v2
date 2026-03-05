<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use App\Models\Pasien;
use App\Models\PengobatanTbHiv;
use App\Models\RiwayatPerawatanPasien;

class Index extends Component
{
    public function render()
    {
        $stats = [
            'aktif'                       => Pasien::pasienAktif(),
            'tidakAktif'                  => Pasien::pasienTidakAktif(),
            'dirujuk'                     => Pasien::pasienDirujuk(),
            'meninggal'                   => Pasien::pasienMeninggal(),
            'pasienBaru'                  => Pasien::pasienBaru(),
            'pasienRujukan'               => Pasien::pasienRujukan(),
            'hivtb'                       => PengobatanTbHiv::jumlahPasienSedangPengobatanTb(),
            'tb'                          => PengobatanTbHiv::jumlahPasienTb(),
            'jumlahPasienAkanFollowup'    => RiwayatPerawatanPasien::jumlahPasienAkanFollowup(),
            'pasienAkanFollowup'          => RiwayatPerawatanPasien::pasienAkanFollowup(),
            'jumlahPasienTelatFollowup'   => RiwayatPerawatanPasien::jumlahPasienTelatFollowup(),
            'pasienTelatFollowup'         => RiwayatPerawatanPasien::pasienTelatFollowup(),
        ];

        return view('livewire.dashboard.index', ['stats' => $stats]);
    }
}
