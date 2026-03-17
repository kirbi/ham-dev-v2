<?php

namespace App\Livewire\RiwayatTerapiArt;

use App\Models\JenisTerapi;
use App\Models\PaduanArt;
use App\Models\Pasien;
use App\Models\RiwayatTerapiArt as RiwayatTerapiArtModel;
use App\Models\TempatTerapi;
use Livewire\Component;

class Form extends Component
{
    public $id;
    public $pasien_id;
    public $pernah_menerima    = 'Tidak';
    public $jenis_terapi_id_art = '';
    public $tempat_terapi_id       = '';
    public $paduan_art_id       = '';
    public $dosis_art           = '';
    public $lama_penggunaan     = '';

    public $pasiens      = [];
    public $jenisTerapiList = [];
    public $tempatTerapiList = [];
    public $paduanArtList   = [];

    public function mount($id = null)
    {
        $this->pasiens         = Pasien::where('deleted', 0)->orderBy('nama')->get();
        $this->jenisTerapiList = JenisTerapi::where('deleted', 0)->orderBy('nama')->get();
        $this->tempatTerapiList = TempatTerapi::where('deleted', 0)->orderBy('nama')->get();
        $this->paduanArtList   = PaduanArt::where('deleted', 0)->orderBy('nama')->get();

        if ($id) {
            $data = RiwayatTerapiArtModel::find($id);
            if ($data) {
                $this->id = $data->id;
                $this->pasien_id             = $data->pasien_id;
                $this->pernah_menerima       = $data->pernah_menerima;
                $this->jenis_terapi_id_art   = $data->jenis_terapi_id_art;
                $this->tempat_terapi_id         = $data->tempat_terapi_id;
                $this->paduan_art_id         = $data->paduan_art_id;
                $this->dosis_art             = $data->dosis_art;
                $this->lama_penggunaan       = $data->lama_penggunaan;
            }
        }
    }

    public function save()
    {
        $rules = [
            'pasien_id'       => 'required|integer',
            'pernah_menerima' => 'required|in:Ya,Tidak',
        ];

        if ($this->pernah_menerima === 'Ya') {
            $rules['jenis_terapi_id_art'] = 'required|integer';
            $rules['tempat_terapi_id']       = 'required|integer';
            $rules['paduan_art_id']       = 'required|integer';
            $rules['dosis_art']           = 'required|max:100';
            $rules['lama_penggunaan']     = 'required|max:250';
        }

        $this->validate($rules);

        RiwayatTerapiArtModel::updateOrCreate(
            ['id' => $this->id],
            [
                'pasien_id'          => $this->pasien_id,
                'pernah_menerima'    => $this->pernah_menerima,
                'jenis_terapi_id_art' => $this->pernah_menerima === 'Ya' ? $this->jenis_terapi_id_art : null,
                'tempat_terapi_id'      => $this->pernah_menerima === 'Ya' ? $this->tempat_terapi_id : null,
                'paduan_art_id'      => $this->pernah_menerima === 'Ya' ? $this->paduan_art_id : null,
                'dosis_art'          => $this->pernah_menerima === 'Ya' ? $this->dosis_art : null,
                'lama_penggunaan'    => $this->pernah_menerima === 'Ya' ? $this->lama_penggunaan : null,
                'deleted'            => 0,
            ]
        );

        session()->flash('success', 'Riwayat Terapi ART berhasil disimpan.');
        $this->redirect(route('riwayat-terapi-art.index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.riwayat-terapi-art.form');
    }
}
