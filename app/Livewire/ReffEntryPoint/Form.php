<?php

namespace App\Livewire\ReffEntryPoint;

use Livewire\Component;
use App\Models\EntryPoint;

class Form extends Component
{
    public $id_entry_point;
    public $nama;
    public $deskripsi;

    protected $rules = [
        'nama' => 'required|max:255',
        'deskripsi' => 'nullable',
    ];

    public function mount($id = null)
    {
        if ($id) {
            $data = EntryPoint::find($id);
            if ($data) {
                $this->id_entry_point = $data->id;
                $this->nama = $data->nama;
                $this->deskripsi = $data->deskripsi ?? null;
            }
        }
    }

    public function save()
    {
        $this->validate();
        EntryPoint::updateOrCreate(
            ['id' => $this->id_entry_point],
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
