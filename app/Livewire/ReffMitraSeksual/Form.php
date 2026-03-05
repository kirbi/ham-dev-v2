<?php

namespace App\Livewire\ReffMitraSeksual;

use Livewire\Component;
use App\Models\MitraSeksual;

class Form extends Component
{
    public $id_mitra_seksual;
    public $nama;
    public $deskripsi;

    protected $rules = [
        'nama' => 'required|max:255',
        'deskripsi' => 'nullable',
    ];

    public function mount($id = null)
    {
        if ($id) {
            $data = MitraSeksual::find($id);
            if ($data) {
                $this->id_mitra_seksual = $data->id;
                $this->nama = $data->nama;
                $this->deskripsi = $data->deskripsi ?? null;
            }
        }
    }

    public function save()
    {
        $this->validate();
        MitraSeksual::updateOrCreate(
            ['id' => $this->id_mitra_seksual],
            ['nama' => $this->nama, 'deskripsi' => $this->deskripsi, 'deleted' => 0]
        );
        session()->flash('success', 'Mitra Seksual berhasil disimpan.');
        $this->redirect(route('reff-mitra-seksual.index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.reff-mitra-seksual.form');
    }
}
