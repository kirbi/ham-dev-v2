<?php

namespace App\Livewire\TerapiArtPasien;

use Livewire\Component;
use App\Models\TerapiArtPasien;
use App\Models\Pasien;
use App\Models\PaduanArt;
use App\Models\AlasanSubstitusi;

class Form extends Component
{
    public $id_terapi_art_pasien;
    public $id_pasien;
    public $tanggal_mulai;
    public $fase;
    public $id_alasan;
    public $penjelasan;
    public $id_paduan_art;

    protected $rules = [
        'id_pasien'     => 'required|integer',
        'tanggal_mulai' => 'required|date',
        'fase'          => 'nullable|max:100',
        'id_alasan'     => 'nullable|integer',
        'penjelasan'    => 'nullable',
        'id_paduan_art' => 'nullable|integer',
    ];

    public function mount($id = null)
    {
        if ($id) {
            $data = TerapiArtPasien::find($id);
            if ($data) {
                $this->id_terapi_art_pasien = $data->id;
                $this->id_pasien = $data->pasien_id;
                $this->tanggal_mulai = $data->tanggal_mulai;
                $this->fase = $data->fase;
                $this->id_alasan = $data->alasan_id;
                $this->penjelasan = $data->penjelasan;
                $this->id_paduan_art = $data->paduan_art_id;
            }
        }
    }

    public function save()
    {
        $this->validate();
        TerapiArtPasien::updateOrCreate(
            ['id' => $this->id_terapi_art_pasien],
            [
                'pasien_id'     => $this->id_pasien,
                'tanggal_mulai' => $this->tanggal_mulai,
                'fase'          => $this->fase,
                'alasan_id'     => $this->id_alasan,
                'penjelasan'    => $this->penjelasan,
                'paduan_art_id' => $this->id_paduan_art,
                'deleted'       => 0,
            ]
        );
        session()->flash('success', 'Data terapi ART berhasil disimpan.');
        $this->redirect(route('terapi-art-pasien.index'), navigate: true);
    }

    public function render()
    {
        $pasiens    = Pasien::where('deleted', 0)->orderBy('nama')->get();
        $paduanArts = PaduanArt::where('deleted', 0)->orderBy('nama')->get();
        $alasans    = AlasanSubstitusi::where('deleted', 0)->orderBy('nama')->get();
        return view('livewire.terapi-art-pasien.form', compact('pasiens','paduanArts','alasans'));
    }
}
