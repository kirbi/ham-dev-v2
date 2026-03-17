<?php

namespace App\Livewire\ReffStatusTb;

use Livewire\Component;
use App\Models\StatusTb;

class Form extends Component
{
    public $id;
    public $nama;
    public $deskripsi;

    protected $rules = [
        'nama' => 'required',
        'deskripsi' => 'nullable',
    ];

    public function mount($id = null)
    {
        if ($id) {
            $data = StatusTb::find($id);
            if ($data) {
                $this->id = $data->id;
                $this->nama = $data->nama;
                $this->deskripsi = $data->deskripsi;
            }
        }
    }

    public function save()
    {
        $this->validate();
        StatusTb::updateOrCreate(
            ['id' => $this->id],
            ['nama' => $this->nama, 'deskripsi' => $this->deskripsi, 'deleted' => 0]
        );
        session()->flash('success', 'Status TB berhasil disimpan.');
        $this->redirect(route('reff-status-tb.index'), navigate:true);
    }

    public function render()
    {
        return view('livewire.reff-status-tb.form');
    }
}
