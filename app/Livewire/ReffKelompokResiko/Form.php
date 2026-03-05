<?php

namespace App\Livewire\ReffKelompokResiko;

use Livewire\Component;
use App\Models\KelompokResiko;

class Form extends Component
{
    public $id_kelompok_resiko;
    public $nama;
    public $deskripsi;

    protected $rules = [
        'nama' => 'required|max:255',
        'deskripsi' => 'nullable',
    ];

    public function mount($id = null)
    {
        if ($id) {
            $data = KelompokResiko::find($id);
            if ($data) {
                $this->id_kelompok_resiko = $data->id_kelompok_resiko;
                $this->nama = $data->nama;
                $this->deskripsi = $data->deskripsi ?? null;
            }
        }
    }

    public function save()
    {
        $this->validate();
        KelompokResiko::updateOrCreate(
            ['id_kelompok_resiko' => $this->id_kelompok_resiko],
            ['nama' => $this->nama, 'deskripsi' => $this->deskripsi, 'deleted' => 0]
        );
        session()->flash('success', 'Kelompok Resiko berhasil disimpan.');
        $this->redirect(route('reff-kelompok-resiko.index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.reff-kelompok-resiko.form');
    }
}
