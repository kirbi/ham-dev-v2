<?php

namespace App\Livewire\ReffProvinsi;

use App\Models\Provinsi;
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
            $data = Provinsi::find($id);
            if ($data) {
                $this->id = $data->id;
                $this->nama        = $data->nama;
            }
        }
    }

    public function save()
    {
        $this->validate();
        Provinsi::updateOrCreate(
            ['id' => $this->id],
            ['nama' => $this->nama, 'deleted' => 0]
        );
        session()->flash('success', 'Provinsi berhasil disimpan.');
        $this->redirect(route('reff-provinsi.index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.reff-provinsi.form');
    }
}
