<?php

namespace App\Livewire\RiwayatMitraSeksual;

use Livewire\Component;
use App\Models\RiwayatMitraSeksual;
use App\Models\Pasien;
use App\Models\Hubungan;
use App\Models\StatusHiv;

class Form extends Component
{
    public $id;
    public $pasien_id;
    public $nama;
    public $umur;
    public $umur_bulan;
    public $mitra_seksual_id;
    public $komsumsi_art;
    public $status_hiv_id;
    public $no_reg_nasional;

    protected $rules = [
        'pasien_id' => 'required|integer',
        'nama' => 'required|max:100',
        'umur' => 'required',
        'umur_bulan' => 'required',
        'mitra_seksual_id' => 'required|integer',
        'komsumsi_art' => 'required',
        'status_hiv_id' => 'required|integer',
        'no_reg_nasional' => 'nullable|string|max:50',
    ];

    public function mount($id = null)
    {
        if ($id) {
            $data = RiwayatMitraSeksual::find($id);
            if ($data) {
                $this->id = $data->id;
                $this->pasien_id = $data->pasien_id;
                $this->nama = $data->nama;
                $this->umur = $data->umur;
                $this->umur_bulan = $data->umur_bulan;
                $this->mitra_seksual_id = $data->mitra_seksual_id;
                $this->komsumsi_art = $data->komsumsi_art;
                $this->status_hiv_id = $data->status_hiv_id;
                $this->no_reg_nasional = $data->no_reg_nasional;
            }
        }
    }

    public function save()
    {
        $this->validate();
        RiwayatMitraSeksual::updateOrCreate(
            ['id' => $this->id],
            [
                'pasien_id' => $this->pasien_id,
                'nama' => $this->nama,
                'umur' => $this->umur,
                'umur_bulan' => $this->umur_bulan,
                'mitra_seksual_id' => $this->mitra_seksual_id,
                'komsumsi_art' => $this->komsumsi_art,
                'status_hiv_id' => $this->status_hiv_id,
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
