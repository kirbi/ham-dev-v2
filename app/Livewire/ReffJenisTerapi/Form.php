<?php

namespace App\Livewire\ReffJenisTerapi;

use App\Models\JenisTerapi;
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
            $data = JenisTerapi::find($id);
            if ($data) {
                $this->id = $data->id;
                $this->nama            = $data->nama;
                $this->deskripsi       = $data->deskripsi;
            }
        }
    }

    public function save()
    {
        $this->validate();
        JenisTerapi::updateOrCreate(
            ['id' => $this->id],
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
