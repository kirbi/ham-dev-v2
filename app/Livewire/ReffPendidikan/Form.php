<?php

namespace App\Livewire\ReffPendidikan;

use App\Models\Pendidikan;
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
            $data = Pendidikan::find($id);
            if ($data) {
                $this->id = $data->id;
                $this->nama          = $data->nama;
                $this->deskripsi     = $data->deskripsi;
            }
        }
    }

    public function save()
    {
        $this->validate();
        Pendidikan::updateOrCreate(
            ['id' => $this->id],
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
