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
                $this->id_kabupaten = $data->id_kabupaten;
                $this->nama = $data->nama;
                $this->id_provinsi = $data->id_provinsi;
            }
        }
    }

    public function save()
    {
        $this->validate();
        Kabupaten::updateOrCreate(
            ['id_kabupaten' => $this->id_kabupaten],
            ['nama' => $this->nama, 'id_provinsi' => $this->id_provinsi, 'deleted' => 0]
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
