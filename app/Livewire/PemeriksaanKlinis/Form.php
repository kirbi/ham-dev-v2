<?php

namespace App\Livewire\PemeriksaanKlinis;

use Livewire\Component;
use App\Models\PemeriksaanKlinis;
use App\Models\Pasien;
use App\Models\StatusFungsional;
use App\Models\KategoriPemeriksaan;

class Form extends Component
{
    public $id_pemeriksaan_klinis;
    public $id_pasien;
    public $standar_klinis;
    public $jumlah_cd4;
    public $viral_load;
    public $tanggal_pemeriksaan;
    public $tanggal_pemeriksaan_selanjutnya;
    public $id_status_fungsional;
    public $lain_lain;
    public $berat_badan;
    public $id_kategori_pemeriksaan;

    protected $rules = [
        'id_pasien' => 'required|integer',
        'standar_klinis' => 'required',
        'tanggal_pemeriksaan' => 'required|date',
        'id_status_fungsional' => 'required|integer',
        'berat_badan' => 'required',
        'id_kategori_pemeriksaan' => 'required|integer',
        'jumlah_cd4' => 'nullable|integer',
        'viral_load' => 'nullable|integer',
    ];

    public function mount($id = null)
    {
        if ($id) {
            $data = PemeriksaanKlinis::find($id);
            if ($data) {
                $this->id_pemeriksaan_klinis = $data->id;
                $this->id_pasien = $data->pasien_id;
                $this->standar_klinis = $data->standar_klinis;
                $this->jumlah_cd4 = $data->jumlah_cd4;
                $this->viral_load = $data->viral_load;
                $this->tanggal_pemeriksaan = $data->tanggal_pemeriksaan;
                $this->tanggal_pemeriksaan_selanjutnya = $data->tanggal_pemeriksaan_selanjutnya;
                $this->id_status_fungsional = $data->status_fungsional_id;
                $this->lain_lain = $data->lain_lain;
                $this->berat_badan = $data->berat_badan;
                $this->id_kategori_pemeriksaan = $data->kategori_pemeriksaan_id;
            }
        }
    }

    public function save()
    {
        $this->validate();
        PemeriksaanKlinis::updateOrCreate(
            ['id' => $this->id_pemeriksaan_klinis],
            [
                'pasien_id' => $this->id_pasien,
                'standar_klinis' => $this->standar_klinis,
                'jumlah_cd4' => $this->jumlah_cd4,
                'viral_load' => $this->viral_load,
                'tanggal_pemeriksaan' => $this->tanggal_pemeriksaan,
                'tanggal_pemeriksaan_selanjutnya' => $this->tanggal_pemeriksaan_selanjutnya,
                'status_fungsional_id' => $this->id_status_fungsional,
                'lain_lain' => $this->lain_lain,
                'berat_badan' => $this->berat_badan,
                'kategori_pemeriksaan_id' => $this->id_kategori_pemeriksaan,
                'deleted' => 0
            ]
        );
        session()->flash('success', 'Pemeriksaan Klinis berhasil disimpan.');
        $this->redirect(route('pemeriksaan-klinis.index'), navigate:true);
    }

    public function render()
    {
        $pasiens = Pasien::where('deleted', 0)->orderBy('nama')->get();
        $statusFungsionals = StatusFungsional::where('deleted', 0)->orderBy('nama')->get();
        $kategoriPemeriksaans = KategoriPemeriksaan::where('deleted', 0)->orderBy('nama')->get();
        return view('livewire.pemeriksaan-klinis.form', [
            'pasiens' => $pasiens,
            'statusFungsionals' => $statusFungsionals,
            'kategoriPemeriksaans' => $kategoriPemeriksaans
        ]);
    }
}
