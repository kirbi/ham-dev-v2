<?php

namespace App\Livewire\ReffMitraSeksual;

use App\Models\MitraSeksual;
use Livewire\Component;

class Form extends Component
{
    public $id;
    public $nama;

    protected $rules = [
        'nama' => 'required|max:255',
    ];

    public function mount($id = null)
    {
        if ($id) {
            $data = MitraSeksual::find($id);
            if ($data) {
                $this->id = $data->id;
                $this->nama             = $data->nama;
            }
        }
    }

    public function save()
    {
        $this->validate();
        MitraSeksual::updateOrCreate(
            ['id' => $this->id],
            ['nama' => $this->nama, 'deleted' => 0]
        );
        session()->flash('success', 'Mitra Seksual berhasil disimpan.');
        $this->redirect(route('reff-mitra-seksual.index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.reff-mitra-seksual.form');
    }
}
