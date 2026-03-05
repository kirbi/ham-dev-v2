<?php

namespace App\Livewire\ReffPekerjaan;

use Livewire\Component;
use App\Models\Pekerjaan;

class Form extends Component
{
    public $id_pekerjaan;
    public $nama;
    public $deskripsi;

    protected $rules = [
        'nama' => 'required|max:255',
        'deskripsi' => 'nullable',
    ];

    public function mount($id = null)
    {
        if ($id) {
            $data = Pekerjaan::find($id);
            if ($data) {
                $this->id_pekerjaan = $data->id_pekerjaan;
                $this->nama = $data->nama;
                $this->deskripsi = $data->deskripsi ?? null;
            }
        }
    }

    public function save()
    {
        $this->validate();
        Pekerjaan::updateOrCreate(
            ['id_pekerjaan' => $this->id_pekerjaan],
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
