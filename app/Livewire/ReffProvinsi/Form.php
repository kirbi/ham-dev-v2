<?php

namespace App\Livewire\ReffProvinsi;

use Livewire\Component;
use App\Models\Provinsi;

class Form extends Component
{
    public $id_provinsi;
    public $nama;
    public $deskripsi;

    protected $rules = [
        'nama' => 'required|max:255',
        'deskripsi' => 'nullable',
    ];

    public function mount($id = null)
    {
        if ($id) {
            $data = Provinsi::find($id);
            if ($data) {
                $this->id_provinsi = $data->id_provinsi;
                $this->nama = $data->nama;
                $this->deskripsi = $data->deskripsi ?? null;
            }
        }
    }

    public function save()
    {
        $this->validate();
        Provinsi::updateOrCreate(
            ['id_provinsi' => $this->id_provinsi],
            ['nama' => $this->nama, 'deskripsi' => $this->deskripsi, 'deleted' => 0]
        );
        session()->flash('success', 'Provinsi berhasil disimpan.');
        $this->redirect(route('reff-provinsi.index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.reff-provinsi.form');
    }
}
