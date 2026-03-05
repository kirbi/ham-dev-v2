<?php

namespace App\Livewire\ReffIndikasiInisiasiArt;

use Livewire\Component;
use App\Models\IndikasiInisiasiArt;

class Form extends Component
{
    public $id_iiart;
    public $nama;
    public $deskripsi;

    protected $rules = [
        'nama' => 'required|max:255',
        'deskripsi' => 'nullable',
    ];

    public function mount($id = null)
    {
        if ($id) {
            $data = IndikasiInisiasiArt::find($id);
            if ($data) {
                $this->id_iiart = $data->id_iiart;
                $this->nama = $data->nama;
                $this->deskripsi = $data->deskripsi ?? null;
            }
        }
    }

    public function save()
    {
        $this->validate();
        IndikasiInisiasiArt::updateOrCreate(
            ['id_iiart' => $this->id_iiart],
            ['nama' => $this->nama, 'deskripsi' => $this->deskripsi, 'deleted' => 0]
        );
        session()->flash('success', 'Indikasi Inisiasi ART berhasil disimpan.');
        $this->redirect(route('reff-indikasi-inisiasi-art.index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.reff-indikasi-inisiasi-art.form');
    }
}
