<?php

namespace App\Livewire\ReffTipeTb;

use Livewire\Component;
use App\Models\TipeTb;

class Form extends Component
{
    public $id_tipe_tb;
    public $nama;
    public $deskripsi;

    protected $rules = [
        'nama' => 'required',
        'deskripsi' => 'nullable',
    ];

    public function mount($id = null)
    {
        if ($id) {
            $data = TipeTb::find($id);
            if ($data) {
                $this->id_tipe_tb = $data->id_tipe_tb;
                $this->nama = $data->nama;
                $this->deskripsi = $data->deskripsi;
            }
        }
    }

    public function save()
    {
        $this->validate();
        TipeTb::updateOrCreate(
            ['id_tipe_tb' => $this->id_tipe_tb],
            ['nama' => $this->nama, 'deskripsi' => $this->deskripsi, 'deleted' => 0]
        );
        session()->flash('success', 'Tipe TB berhasil disimpan.');
        $this->redirect(route('reff-tipe-tb.index'), navigate:true);
    }

    public function render()
    {
        return view('livewire.reff-tipe-tb.form');
    }
}
