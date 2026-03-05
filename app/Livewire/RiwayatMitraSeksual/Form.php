<?php

namespace App\Livewire\RiwayatMitraSeksual;

use Livewire\Component;
use App\Models\RiwayatMitraSeksual;
use App\Models\Pasien;
use App\Models\Hubungan;
use App\Models\StatusHiv;

class Form extends Component
{
    public $id_riwayat_mitra_seksual;
    public $id_pasien;
    public $nama;
    public $umur;
    public $umur_bulan;
    public $id_hubungan;
    public $komsumsi_art;
    public $id_status_hiv;
    public $no_reg_nasional;

    protected $rules = [
        'id_pasien' => 'required|integer',
        'nama' => 'required|max:100',
        'umur' => 'required',
        'umur_bulan' => 'required',
        'id_hubungan' => 'required|integer',
        'komsumsi_art' => 'required',
        'id_status_hiv' => 'required|integer',
        'no_reg_nasional' => 'nullable|string|max:50',
    ];

    public function mount($id = null)
    {
        if ($id) {
            $data = RiwayatMitraSeksual::find($id);
            if ($data) {
                $this->id_riwayat_mitra_seksual = $data->id;
                $this->id_pasien = $data->pasien_id;
                $this->nama = $data->nama;
                $this->umur = $data->umur;
                $this->umur_bulan = $data->umur_bulan;
                $this->id_hubungan = $data->hubungan_id;
                $this->komsumsi_art = $data->komsumsi_art;
                $this->id_status_hiv = $data->status_hiv_id;
                $this->no_reg_nasional = $data->no_reg_nasional;
            }
        }
    }

    public function save()
    {
        $this->validate();
        RiwayatMitraSeksual::updateOrCreate(
            ['id' => $this->id_riwayat_mitra_seksual],
            [
                'pasien_id' => $this->id_pasien,
                'nama' => $this->nama,
                'umur' => $this->umur,
                'umur_bulan' => $this->umur_bulan,
                'hubungan_id' => $this->id_hubungan,
                'komsumsi_art' => $this->komsumsi_art,
                'status_hiv_id' => $this->id_status_hiv,
                'no_reg_nasional' => $this->no_reg_nasional,
                'deleted' => 0
            ]
        );
        session()->flash('success', 'Riwayat Mitra Seksual berhasil disimpan.');
        $this->redirect(route('riwayat-mitra-seksual.index'), navigate:true);
    }

    public function render()
    {
        $pasiens = Pasien::where('deleted', 0)->orderBy('nama')->get();
        $hubungans = Hubungan::where('deleted', 0)->orderBy('nama')->get();
        $statusHivs = StatusHiv::where('deleted', 0)->orderBy('nama')->get();
        return view('livewire.riwayat-mitra-seksual.form', [
            'pasiens' => $pasiens,
            'hubungans' => $hubungans,
            'statusHivs' => $statusHivs
        ]);
    }
}
