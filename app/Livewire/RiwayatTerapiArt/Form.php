<?php

namespace App\Livewire\RiwayatTerapiArt;

use Livewire\Component;
use App\Models\RiwayatTerapiArt;
use App\Models\Pasien;
use App\Models\PaduanArt;
use App\Models\JenisTerapi;
use App\Models\TempatTerapi;

class Form extends Component
{
    public $id_riwayat_terapi_art;
    public $id_pasien;
    public $pernah_menerima;
    public $id_jenis_terapi_art;
    public $id_tempat_art;
    public $id_paduan_art;
    public $dosis_art;
    public $lama_penggunaan;

    protected $rules = [
        'id_pasien'         => 'required|integer',
        'pernah_menerima'   => 'nullable',
        'id_jenis_terapi_art' => 'nullable|integer',
        'id_tempat_art'     => 'nullable|integer',
        'id_paduan_art'     => 'nullable|integer',
        'dosis_art'         => 'nullable|max:255',
        'lama_penggunaan'   => 'nullable|max:255',
    ];

    public function mount($id = null)
    {
        if ($id) {
            $data = RiwayatTerapiArt::find($id);
            if ($data) {
                $this->id_riwayat_terapi_art = $data->id;
                $this->id_pasien = $data->pasien_id;
                $this->pernah_menerima = $data->pernah_menerima;
                $this->id_jenis_terapi_art = $data->jenis_terapi_art_id;
                $this->id_tempat_art = $data->tempat_art_id;
                $this->id_paduan_art = $data->paduan_art_id;
                $this->dosis_art = $data->dosis_art;
                $this->lama_penggunaan = $data->lama_penggunaan;
            }
        }
    }

    public function save()
    {
        $this->validate();
        RiwayatTerapiArt::updateOrCreate(
            ['id' => $this->id_riwayat_terapi_art],
            [
                'pasien_id'          => $this->id_pasien,
                'pernah_menerima'    => $this->pernah_menerima,
                'jenis_terapi_art_id' => $this->id_jenis_terapi_art,
                'tempat_art_id'      => $this->id_tempat_art,
                'paduan_art_id'      => $this->id_paduan_art,
                'dosis_art'          => $this->dosis_art,
                'lama_penggunaan'    => $this->lama_penggunaan,
                'deleted'            => 0,
            ]
        );
        session()->flash('success', 'Riwayat terapi ART berhasil disimpan.');
        $this->redirect(route('riwayat-terapi-art.index'), navigate: true);
    }

    public function render()
    {
        $pasiens       = Pasien::where('deleted', 0)->orderBy('nama')->get();
        $paduanArts    = PaduanArt::where('deleted', 0)->orderBy('nama')->get();
        $jenisTerapiList = JenisTerapi::where('deleted', 0)->orderBy('nama')->get();
        $tempatTerapis = TempatTerapi::where('deleted', 0)->orderBy('nama')->get();
        return view('livewire.riwayat-terapi-art.form', compact('pasiens','paduanArts','jenisTerapiList','tempatTerapis'));
    }
}
