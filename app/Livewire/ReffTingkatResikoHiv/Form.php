<?php

namespace App\Livewire\ReffTingkatResikoHiv;

use Livewire\Component;
use App\Models\TingkatResikoHiv;

class Form extends Component
{
    public $id_tingkat_resiko_hiv;
    public $nama;
    public $deskripsi;

    protected $rules = [
        'nama' => 'required|max:255',
        'deskripsi' => 'nullable',
    ];

    public function mount($id = null)
    {
        if ($id) {
            $data = TingkatResikoHiv::find($id);
            if ($data) {
                $this->id_tingkat_resiko_hiv = $data->id_tingkat_resiko_hiv;
                $this->nama = $data->nama;
                $this->deskripsi = $data->deskripsi ?? null;
            }
        }
    }

    public function save()
    {
        $this->validate();
        TingkatResikoHiv::updateOrCreate(
            ['id_tingkat_resiko_hiv' => $this->id_tingkat_resiko_hiv],
            ['nama' => $this->nama, 'deskripsi' => $this->deskripsi, 'deleted' => 0]
        );
        session()->flash('success', 'Tingkat Resiko HIV berhasil disimpan.');
        $this->redirect(route('reff-tingkat-resiko-hiv.index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.reff-tingkat-resiko-hiv.form');
    }
}
