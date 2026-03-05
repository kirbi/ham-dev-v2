<?php

namespace App\Livewire\ReffPaduanArt;

use Livewire\Component;
use App\Models\PaduanArt;

class Form extends Component
{
    public $id_paduan_art;
    public $nama;
    public $deskripsi;

    protected $rules = [
        'nama' => 'required',
        'deskripsi' => 'nullable',
    ];

    public function mount($id = null)
    {
        if ($id) {
            $data = PaduanArt::find($id);
            if ($data) {
                $this->id_paduan_art = $data->id;
                $this->nama = $data->nama;
                $this->deskripsi = $data->deskripsi;
            }
        }
    }

    public function save()
    {
        $this->validate();
        PaduanArt::updateOrCreate(
            ['id' => $this->id_paduan_art],
            ['nama' => $this->nama, 'deskripsi' => $this->deskripsi, 'deleted' => 0]
        );
        session()->flash('success', 'Paduan Terapi berhasil disimpan.');
        $this->redirect(route('reff-paduan-art.index'), navigate:true);
    }

    public function render()
    {
        return view('livewire.reff-paduan-art.form');
    }
}
