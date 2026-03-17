<?php

namespace App\Livewire\ReffAlasanSubstitusi;

use Livewire\Component;
use App\Models\AlasanSubstitusi;

class Form extends Component
{
    public $alasan_id_substitusi;
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
                $this->alasan_id_substitusi = $data->alasan_id_substitusi;
                $this->nama = $data->nama;
                $this->deskripsi = $data->deskripsi;
            }
        }
    }

    public function save()
    {
        $this->validate();
        AlasanSubstitusi::updateOrCreate(
            ['alasan_id_substitusi' => $this->alasan_id_substitusi],
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
