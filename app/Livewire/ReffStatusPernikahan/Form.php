<?php

namespace App\Livewire\ReffStatusPernikahan;

use Livewire\Component;
use App\Models\StatusPernikahan;

class Form extends Component
{
    public $id_status_pernikahan;
    public $nama;
    public $deskripsi;

    protected $rules = [
        'nama' => 'required|max:255',
        'deskripsi' => 'nullable',
    ];

    public function mount($id = null)
    {
        if ($id) {
            $data = StatusPernikahan::find($id);
            if ($data) {
                $this->id_status_pernikahan = $data->id;
                $this->nama = $data->nama;
                $this->deskripsi = $data->deskripsi ?? null;
            }
        }
    }

    public function save()
    {
        $this->validate();
        StatusPernikahan::updateOrCreate(
            ['id' => $this->id_status_pernikahan],
            ['nama' => $this->nama, 'deskripsi' => $this->deskripsi, 'deleted' => 0]
        );
        session()->flash('success', 'Status Pernikahan berhasil disimpan.');
        $this->redirect(route('reff-status-pernikahan.index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.reff-status-pernikahan.form');
    }
}
