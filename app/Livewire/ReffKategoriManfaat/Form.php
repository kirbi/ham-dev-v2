<?php

namespace App\Livewire\ReffKategoriManfaat;

use Livewire\Component;
use App\Models\KategoriManfaat;

class Form extends Component
{
    public $id_kategori_manfaat;
    public $nama;
    public $deskripsi;

    protected $rules = [
        'nama' => 'required|max:255',
        'deskripsi' => 'nullable',
    ];

    public function mount($id = null)
    {
        if ($id) {
            $data = KategoriManfaat::find($id);
            if ($data) {
                $this->id_kategori_manfaat = $data->id;
                $this->nama = $data->nama;
                $this->deskripsi = $data->deskripsi ?? null;
            }
        }
    }

    public function save()
    {
        $this->validate();
        KategoriManfaat::updateOrCreate(
            ['id' => $this->id_kategori_manfaat],
            ['nama' => $this->nama, 'deskripsi' => $this->deskripsi, 'deleted' => 0]
        );
        session()->flash('success', 'Kategori Manfaat berhasil disimpan.');
        $this->redirect(route('reff-kategori-manfaat.index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.reff-kategori-manfaat.form');
    }
}
