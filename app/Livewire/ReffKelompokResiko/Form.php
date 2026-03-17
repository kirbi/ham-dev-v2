<?php

namespace App\Livewire\ReffKelompokResiko;

use App\Models\KelompokResiko;
use Livewire\Component;

class Form extends Component
{
    public $id;
    public $nama;
    public $deskripsi;

    protected $rules = [
        'nama'     => 'required|max:255',
        'deskripsi' => 'nullable|max:500',
    ];

    public function mount($id = null)
    {
        if ($id) {
            $data = KelompokResiko::find($id);
            if ($data) {
                $this->id = $data->id;
                $this->nama               = $data->nama;
                $this->deskripsi          = $data->deskripsi;
            }
        }
    }

    public function save()
    {
        $this->validate();
        KelompokResiko::updateOrCreate(
            ['id' => $this->id],
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
