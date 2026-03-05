<?php

namespace App\Livewire\ReffPaduanTb;

use Livewire\Component;
use App\Models\PaduanTb;

class Form extends Component
{
    public $id_paduan_tb;
    public $nama;
    public $deskripsi;

    protected $rules = [
        'nama' => 'required|max:255',
        'deskripsi' => 'nullable',
    ];

    public function mount($id = null)
    {
        if ($id) {
            $data = PaduanTb::find($id);
            if ($data) {
                $this->id_paduan_tb = $data->id_paduan_tb;
                $this->nama = $data->nama;
                $this->deskripsi = $data->deskripsi ?? null;
            }
        }
    }

    public function save()
    {
        $this->validate();
        PaduanTb::updateOrCreate(
            ['id_paduan_tb' => $this->id_paduan_tb],
            ['nama' => $this->nama, 'deskripsi' => $this->deskripsi, 'deleted' => 0]
        );
        session()->flash('success', 'Paduan TB berhasil disimpan.');
        $this->redirect(route('reff-paduan-tb.index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.reff-paduan-tb.form');
    }
}
