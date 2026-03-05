<?php

namespace App\Livewire\ReffKabupaten;

use Livewire\Component;
use App\Models\Kabupaten;
use App\Models\Provinsi;

class Form extends Component
{
    public $id_kabupaten;
    public $nama;
    public $id_provinsi;

    protected $rules = [
        'nama' => 'required|max:255',
        'id_provinsi' => 'required|integer',
    ];

    public function mount($id = null)
    {
        if ($id) {
            $data = Kabupaten::find($id);
            if ($data) {
                $this->id_kabupaten = $data->id;
                $this->nama = $data->nama;
                $this->id_provinsi = $data->provinsi_id;
            }
        }
    }

    public function save()
    {
        $this->validate();
        Kabupaten::updateOrCreate(
            ['id' => $this->id_kabupaten],
            ['nama' => $this->nama, 'provinsi_id' => $this->id_provinsi, 'deleted' => 0]
        );
        session()->flash('success', 'Kabupaten berhasil disimpan.');
        $this->redirect(route('reff-kabupaten.index'), navigate: true);
    }

    public function render()
    {
        $provinsis = Provinsi::where('deleted', 0)->orderBy('nama')->get();
        return view('livewire.reff-kabupaten.form', ['provinsis' => $provinsis]);
    }
}
