<?php

namespace App\Livewire\ReffAlasanTesHiv;

use Livewire\Component;
use App\Models\AlasanTesHiv;

class Form extends Component
{
    public $id_alasan_tes_hiv;
    public $nama;
    public $deskripsi;

    protected $rules = [
        'nama' => 'required|max:255',
        'deskripsi' => 'nullable',
    ];

    public function mount($id = null)
    {
        if ($id) {
            $data = AlasanTesHiv::find($id);
            if ($data) {
                $this->id_alasan_tes_hiv = $data->id;
                $this->nama = $data->nama;
                $this->deskripsi = $data->deskripsi ?? null;
            }
        }
    }

    public function save()
    {
        $this->validate();
        AlasanTesHiv::updateOrCreate(
            ['id' => $this->id_alasan_tes_hiv],
            ['nama' => $this->nama, 'deskripsi' => $this->deskripsi, 'deleted' => 0]
        );
        session()->flash('success', 'Alasan Tes HIV berhasil disimpan.');
        $this->redirect(route('reff-alasan-tes-hiv.index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.reff-alasan-tes-hiv.form');
    }
}
