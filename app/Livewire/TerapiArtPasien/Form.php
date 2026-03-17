<?php

namespace App\Livewire\TerapiArtPasien;

use App\Models\AlasanSubstitusi;
use App\Models\PaduanArt;
use App\Models\Pasien;
use App\Models\TerapiArtPasien as TerapiArtPasienModel;
use Livewire\Component;

class Form extends Component
{
    public $id;
    public $pasien_id;
    public $tanggal_mulai;
    public $fase;
    public $alasan_id = '';
    public $penjelasan = '';
    public $paduan_art_id;

    public $pasiens       = [];
    public $paduanArtList = [];
    public $alasanList    = [];

    protected $rules = [
        'pasien_id'    => 'required|integer',
        'tanggal_mulai' => 'required|date',
        'fase'         => 'required|max:100',
        'alasan_id'    => 'required',
        'penjelasan'   => 'nullable|max:250',
        'paduan_art_id' => 'required|integer',
    ];

    public function mount($id = null)
    {
        $this->pasiens       = Pasien::where('deleted', 0)->orderBy('nama')->get();
        $this->paduanArtList = PaduanArt::where('deleted', 0)->orderBy('nama')->get();
        $this->alasanList    = AlasanSubstitusi::where('deleted', 0)->orderBy('nama')->get();

        if ($id) {
            $data = TerapiArtPasienModel::find($id);
            if ($data) {
                $this->id            = $data->id;
                $this->pasien_id     = $data->pasien_id;
                $this->tanggal_mulai = $data->tanggal_mulai;
                $this->fase          = $data->fase;
                $this->alasan_id     = $data->alasan_id;
                $this->penjelasan    = $data->penjelasan;
                $this->paduan_art_id = $data->paduan_art_id;
            }
        }
    }

    public function save()
    {
        $this->validate();
        TerapiArtPasienModel::updateOrCreate(
            ['id' => $this->id],
            [
                'pasien_id'    => $this->pasien_id,
                'tanggal_mulai' => $this->tanggal_mulai,
                'fase'         => $this->fase,
                'alasan_id'    => $this->alasan_id,
                'penjelasan'   => $this->penjelasan,
                'paduan_art_id' => $this->paduan_art_id,
                'deleted'      => 0,
            ]
        );
        session()->flash('success', 'Terapi ART Pasien berhasil disimpan.');
        $this->redirect(route('terapi-art-pasien.index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.terapi-art-pasien.form');
    }
}
