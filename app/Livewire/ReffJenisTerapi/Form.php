<?php

namespace App\Livewire\ReffJenisTerapi;

use Livewire\Component;
use App\Models\JenisTerapi;

class Form extends Component
{
    public $id_jenis_terapi;
    public $nama;
    public $deskripsi;

    protected $rules = [
        'nama' => 'required|max:255',
        'deskripsi' => 'nullable',
    ];

    public function mount($id = null)
    {
        if ($id) {
            $data = JenisTerapi::find($id);
            if ($data) {
                $this->id_jenis_terapi = $data->id_jenis_terapi;
                $this->nama = $data->nama;
                $this->deskripsi = $data->deskripsi ?? null;
            }
        }
    }

    public function save()
    {
        $this->validate();
        JenisTerapi::updateOrCreate(
            ['id_jenis_terapi' => $this->id_jenis_terapi],
            ['nama' => $this->nama, 'deskripsi' => $this->deskripsi, 'deleted' => 0]
        );
        session()->flash('success', 'Jenis Terapi berhasil disimpan.');
        $this->redirect(route('reff-jenis-terapi.index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.reff-jenis-terapi.form');
    }
}
