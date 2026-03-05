<?php

namespace App\Livewire\ReffFaktorResiko;

use Livewire\Component;
use App\Models\FaktorResiko;

class Form extends Component
{
    public $id_faktor_resiko;
    public $nama;
    public $deskripsi;

    protected $rules = [
        'nama' => 'required|max:255',
        'deskripsi' => 'nullable',
    ];

    public function mount($id = null)
    {
        if ($id) {
            $data = FaktorResiko::find($id);
            if ($data) {
                $this->id_faktor_resiko = $data->id;
                $this->nama = $data->nama;
                $this->deskripsi = $data->deskripsi ?? null;
            }
        }
    }

    public function save()
    {
        $this->validate();
        FaktorResiko::updateOrCreate(
            ['id' => $this->id_faktor_resiko],
            ['nama' => $this->nama, 'deskripsi' => $this->deskripsi, 'deleted' => 0]
        );
        session()->flash('success', 'Faktor Resiko berhasil disimpan.');
        $this->redirect(route('reff-faktor-resiko.index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.reff-faktor-resiko.form');
    }
}
