<?php

namespace App\Livewire\ReffAlasanSubstitusi;

use Livewire\Component;
use App\Models\AlasanSubstitusi;

class Form extends Component
{
    public $id_alasan_substitusi;
    public $nama;
    public $deskripsi;

    protected $rules = [
        'nama' => 'required',
        'deskripsi' => 'nullable',
    ];

    public function mount($id = null)
    {
        if ($id) {
            $data = AlasanSubstitusi::find($id);
            if ($data) {
                $this->id_alasan_substitusi = $data->id_alasan_substitusi;
                $this->nama = $data->nama;
                $this->deskripsi = $data->deskripsi;
            }
        }
    }

    public function save()
    {
        $this->validate();
        AlasanSubstitusi::updateOrCreate(
            ['id_alasan_substitusi' => $this->id_alasan_substitusi],
            ['nama' => $this->nama, 'deskripsi' => $this->deskripsi, 'deleted' => 0]
        );
        session()->flash('success', 'Alasan Substitusi berhasil disimpan.');
        $this->redirect(route('reff-alasan-substitusi.index'), navigate:true);
    }

    public function render()
    {
        return view('livewire.reff-alasan-substitusi.form');
    }
}
