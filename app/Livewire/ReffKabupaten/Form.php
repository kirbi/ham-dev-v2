<?php

namespace App\Livewire\ReffKabupaten;

use App\Models\Kabupaten;
use App\Models\Provinsi;
use Livewire\Component;

class Form extends Component
{
    public $id;
    public $nama;
    public $provinsi_id;

    public $provinsis = [];

    protected $rules = [
        'nama'        => 'required|max:255',
        'provinsi_id' => 'required|integer',
    ];

    public function mount($id = null)
    {
        $this->provinsis = Provinsi::where('deleted', 0)->orderBy('nama')->get();

        if ($id) {
            $data = Kabupaten::find($id);
            if ($data) {
                $this->id = $data->id;
                $this->nama         = $data->nama;
                $this->provinsi_id  = $data->provinsi_id;
            }
        }
    }

    public function save()
    {
        $this->validate();
        Kabupaten::updateOrCreate(
            ['id' => $this->id],
            ['nama' => $this->nama, 'provinsi_id' => $this->provinsi_id, 'deleted' => 0]
        );
        session()->flash('success', 'Kabupaten/Kota berhasil disimpan.');
        $this->redirect(route('reff-kabupaten.index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.reff-kabupaten.form');
    }
}
