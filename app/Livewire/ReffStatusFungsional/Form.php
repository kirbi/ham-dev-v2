<?php

namespace App\Livewire\ReffStatusFungsional;

use Livewire\Component;
use App\Models\StatusFungsional;

class Form extends Component
{
    public $id;
    public $nama;
    public $kode;
    public $deskripsi;

    protected $rules = [
        'nama' => 'required',
        'kode' => 'nullable',
        'deskripsi' => 'nullable',
    ];

    public function mount($id = null)
    {
        if ($id) {
            $data = StatusFungsional::find($id);
            if ($data) {
                $this->id = $data->id;
                $this->nama = $data->nama;
                $this->kode = $data->kode;
                $this->deskripsi = $data->deskripsi;
            }
        }
    }

    public function save()
    {
        $this->validate();
        StatusFungsional::updateOrCreate(
            ['id' => $this->id],
            ['nama' => $this->nama, 'kode' => $this->kode, 'deskripsi' => $this->deskripsi, 'deleted' => 0]
        );
        session()->flash('success', 'Status Fungsional berhasil disimpan.');
        $this->redirect(route('reff-status-fungsional.index'), navigate:true);
    }

    public function render()
    {
        return view('livewire.reff-status-fungsional.form');
    }
}
