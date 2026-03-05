<?php

namespace App\Livewire\ReffTempatTerapi;

use Livewire\Component;
use App\Models\TempatTerapi;

class Form extends Component
{
    public $id_tempat_terapi;
    public $nama;
    public $deskripsi;

    protected $rules = [
        'nama' => 'required|max:255',
        'deskripsi' => 'nullable',
    ];

    public function mount($id = null)
    {
        if ($id) {
            $data = TempatTerapi::find($id);
            if ($data) {
                $this->id_tempat_terapi = $data->id_tempat_terapi;
                $this->nama = $data->nama;
                $this->deskripsi = $data->deskripsi ?? null;
            }
        }
    }

    public function save()
    {
        $this->validate();
        TempatTerapi::updateOrCreate(
            ['id_tempat_terapi' => $this->id_tempat_terapi],
            ['nama' => $this->nama, 'deskripsi' => $this->deskripsi, 'deleted' => 0]
        );
        session()->flash('success', 'Tempat Terapi berhasil disimpan.');
        $this->redirect(route('reff-tempat-terapi.index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.reff-tempat-terapi.form');
    }
}
