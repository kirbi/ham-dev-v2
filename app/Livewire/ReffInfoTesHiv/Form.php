<?php

namespace App\Livewire\ReffInfoTesHiv;

use App\Models\InfoTesHiv;
use Livewire\Component;

class Form extends Component
{
    public $id;
    public $nama;

    protected $rules = [
        'nama' => 'required|max:255',
    ];

    public function mount($id = null)
    {
        if ($id) {
            $data = InfoTesHiv::find($id);
            if ($data) {
                $this->id = $data->id;
                $this->nama            = $data->nama;
            }
        }
    }

    public function save()
    {
        $this->validate();
        InfoTesHiv::updateOrCreate(
            ['id' => $this->id],
            ['nama' => $this->nama, 'deleted' => 0]
        );
        session()->flash('success', 'Info Tes HIV berhasil disimpan.');
        $this->redirect(route('reff-info-tes-hiv.index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.reff-info-tes-hiv.form');
    }
}
