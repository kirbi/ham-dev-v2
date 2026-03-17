<?php

namespace App\Livewire\ReffEntryPoint;

use App\Models\EntryPoint;
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
            $data = EntryPoint::find($id);
            if ($data) {
                $this->id = $data->id;
                $this->nama           = $data->nama;
                $this->deskripsi      = $data->deskripsi;
            }
        }
    }

    public function save()
    {
        $this->validate();
        EntryPoint::updateOrCreate(
            ['id' => $this->id],
            ['nama' => $this->nama, 'deskripsi' => $this->deskripsi, 'deleted' => 0]
        );
        session()->flash('success', 'Entry Point berhasil disimpan.');
        $this->redirect(route('reff-entry-point.index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.reff-entry-point.form');
    }
}
