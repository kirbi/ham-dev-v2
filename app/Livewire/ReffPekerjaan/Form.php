<?php

namespace App\Livewire\ReffPekerjaan;

use App\Models\Pekerjaan;
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
            $data = Pekerjaan::find($id);
            if ($data) {
                $this->id = $data->id;
                $this->nama         = $data->nama;
                $this->deskripsi    = $data->deskripsi;
            }
        }
    }

    public function save()
    {
        $this->validate();
        Pekerjaan::updateOrCreate(
            ['id' => $this->id],
            ['nama' => $this->nama, 'deskripsi' => $this->deskripsi, 'deleted' => 0]
        );
        session()->flash('success', 'Pekerjaan berhasil disimpan.');
        $this->redirect(route('reff-pekerjaan.index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.reff-pekerjaan.form');
    }
}
