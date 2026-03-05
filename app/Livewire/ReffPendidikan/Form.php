<?php

namespace App\Livewire\ReffPendidikan;

use Livewire\Component;
use App\Models\Pendidikan;

class Form extends Component
{
    public $id_pendidikan;
    public $nama;
    public $deskripsi;

    protected $rules = [
        'nama' => 'required|max:255',
        'deskripsi' => 'nullable',
    ];

    public function mount($id = null)
    {
        if ($id) {
            $data = Pendidikan::find($id);
            if ($data) {
                $this->id_pendidikan = $data->id;
                $this->nama = $data->nama;
                $this->deskripsi = $data->deskripsi ?? null;
            }
        }
    }

    public function save()
    {
        $this->validate();
        Pendidikan::updateOrCreate(
            ['id' => $this->id_pendidikan],
            ['nama' => $this->nama, 'deskripsi' => $this->deskripsi, 'deleted' => 0]
        );
        session()->flash('success', 'Pendidikan berhasil disimpan.');
        $this->redirect(route('reff-pendidikan.index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.reff-pendidikan.form');
    }
}
