<?php

namespace App\Livewire\ReffIndikasiInisiasiArt;

use App\Models\IndikasiInisiasiArt;
use Livewire\Component;

class Form extends Component
{
    public $id;
    public $nama;
    public $deskripsi;

    protected $rules = [
        'nama'     => 'required|max:255',
        'deskripsi' => 'nullable|max:500',
    ];

    public function mount($id = null)
    {
        if ($id) {
            $data = IndikasiInisiasiArt::find($id);
            if ($data) {
                $this->id  = $data->id;
                $this->nama      = $data->nama;
                $this->deskripsi = $data->deskripsi;
            }
        }
    }

    public function save()
    {
        $this->validate();
        IndikasiInisiasiArt::updateOrCreate(
            ['id' => $this->id],
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
