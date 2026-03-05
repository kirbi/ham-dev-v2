<?php

namespace App\Livewire\ReffKategoriPemeriksaan;

use Livewire\Component;
use App\Models\KategoriPemeriksaan;

class Form extends Component
{
    public $id_kategori_pemeriksaan;
    public $nama;
    public $deskripsi;

    protected $rules = [
        'nama' => 'required|max:255',
        'deskripsi' => 'nullable',
    ];

    public function mount($id = null)
    {
        if ($id) {
            $data = KategoriPemeriksaan::find($id);
            if ($data) {
                $this->id_kategori_pemeriksaan = $data->id;
                $this->nama = $data->nama;
                $this->deskripsi = $data->deskripsi ?? null;
            }
        }
    }

    public function save()
    {
        $this->validate();
        KategoriPemeriksaan::updateOrCreate(
            ['id' => $this->id_kategori_pemeriksaan],
            ['nama' => $this->nama, 'deskripsi' => $this->deskripsi, 'deleted' => 0]
        );
        session()->flash('success', 'Kategori Pemeriksaan berhasil disimpan.');
        $this->redirect(route('reff-kategori-pemeriksaan.index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.reff-kategori-pemeriksaan.form');
    }
}
