<?php

namespace App\Livewire\ReffAlasanTesHiv;

use App\Models\AlasanTesHiv;
use Livewire\Component;

class Form extends Component
{
    public $alasan_id_tes_hiv;
    public $nama;

    protected $rules = [
        'nama' => 'required|max:255',
    ];

    public function mount($id = null)
    {
        if ($id) {
            $data = AlasanTesHiv::find($id);
            if ($data) {
                $this->alasan_id_tes_hiv = $data->alasan_id_tes_hiv;
                $this->nama = $data->nama;
            }
        }
    }

    public function save()
    {
        $this->validate();
        AlasanTesHiv::updateOrCreate(
            ['alasan_id_tes_hiv' => $this->alasan_id_tes_hiv],
            ['nama' => $this->nama, 'deleted' => 0]
        );
        session()->flash('success', 'Alasan Tes HIV berhasil disimpan.');
        $this->redirect(route('reff-alasan-tes-hiv.index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.reff-alasan-tes-hiv.form');
    }
}
