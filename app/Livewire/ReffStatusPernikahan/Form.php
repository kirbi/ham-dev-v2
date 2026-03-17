<?php

namespace App\Livewire\ReffStatusPernikahan;

use App\Models\StatusPernikahan;
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
            $data = StatusPernikahan::find($id);
            if ($data) {
                $this->id = $data->id;
                $this->nama                 = $data->nama;
            }
        }
    }

    public function save()
    {
        $this->validate();
        StatusPernikahan::updateOrCreate(
            ['id' => $this->id],
            ['nama' => $this->nama, 'deleted' => 0]
        );
        session()->flash('success', 'Status Pernikahan berhasil disimpan.');
        $this->redirect(route('reff-status-pernikahan.index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.reff-status-pernikahan.form');
    }
}
