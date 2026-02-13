<?php

namespace App\Livewire\ReffAdherenceArt;

use Livewire\Component;
use App\Models\AdherenceArt;

class Form extends Component
{
    public $id_adherence_art;
    public $nama;
    public $deskripsi;

    protected $rules = [
        'nama' => 'required',
        'deskripsi' => 'nullable',
    ];

    public function mount($id = null)
    {
        if ($id) {
            $data = AdherenceArt::find($id);
            if ($data) {
                $this->id_adherence_art = $data->id_adherence_art;
                $this->nama = $data->nama;
                $this->deskripsi = $data->deskripsi;
            }
        }
    }

    public function save()
    {
        $this->validate();
        AdherenceArt::updateOrCreate(
            ['id_adherence_art' => $this->id_adherence_art],
            ['nama' => $this->nama, 'deskripsi' => $this->deskripsi, 'deleted' => 0]
        );
        session()->flash('success', 'Adherence Art berhasil disimpan.');
        $this->redirect(route('reff-adherence-art.index'), navigate:true);
    }

    public function render()
    {
        return view('livewire.reff-adherence-art.form');
    }
}
