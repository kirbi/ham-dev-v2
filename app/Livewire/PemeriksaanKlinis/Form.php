<?php

namespace App\Livewire\PemeriksaanKlinis;

use Livewire\Component;
use App\Models\PemeriksaanKlinis;
use App\Models\Pasien;
use App\Models\StatusFungsional;
use App\Models\KategoriPemeriksaan;

class Form extends Component
{
    public $id;
    public $pasien_id;
    public $standar_klinis;
    public $jumlah_cd4;
    public $viral_load;
    public $tanggal_pemeriksaan;
    public $tanggal_pemeriksaan_selanjutnya;
    public $status_fungsional_id;
    public $lain_lain;
    public $berat_badan;
    public $kategori_pemeriksaan_id;

    protected $rules = [
        'pasien_id' => 'required|integer',
        'standar_klinis' => 'required',
        'tanggal_pemeriksaan' => 'required|date',
        'status_fungsional_id' => 'required|integer',
        'berat_badan' => 'required',
        'kategori_pemeriksaan_id' => 'required|integer',
        'jumlah_cd4' => 'nullable|integer',
        'viral_load' => 'nullable|integer',
    ];

    public function mount($id = null)
    {
        if ($id) {
            $data = PemeriksaanKlinis::find($id);
            if ($data) {
                $this->id = $data->id;
                $this->pasien_id = $data->pasien_id;
                $this->standar_klinis = $data->standar_klinis;
                $this->jumlah_cd4 = $data->jumlah_cd4;
                $this->viral_load = $data->viral_load;
                $this->tanggal_pemeriksaan = $data->tanggal_pemeriksaan;
                $this->tanggal_pemeriksaan_selanjutnya = $data->tanggal_pemeriksaan_selanjutnya;
                $this->status_fungsional_id = $data->status_fungsional_id;
                $this->lain_lain = $data->lain_lain;
                $this->berat_badan = $data->berat_badan;
                $this->kategori_pemeriksaan_id = $data->kategori_pemeriksaan_id;
            }
        }
    }

    public function save()
    {
        $this->validate();
        PemeriksaanKlinis::updateOrCreate(
            ['id' => $this->id],
            [
                'pasien_id' => $this->pasien_id,
                'standar_klinis' => $this->standar_klinis,
                'jumlah_cd4' => $this->jumlah_cd4,
                'viral_load' => $this->viral_load,
                'tanggal_pemeriksaan' => $this->tanggal_pemeriksaan,
                'tanggal_pemeriksaan_selanjutnya' => $this->tanggal_pemeriksaan_selanjutnya,
                'status_fungsional_id' => $this->status_fungsional_id,
                'lain_lain' => $this->lain_lain,
                'berat_badan' => $this->berat_badan,
                'kategori_pemeriksaan_id' => $this->kategori_pemeriksaan_id,
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
