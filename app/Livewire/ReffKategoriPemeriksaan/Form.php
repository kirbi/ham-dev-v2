<?php

namespace App\Livewire\ReffKategoriPemeriksaan;

use App\Models\KategoriPemeriksaan;
use Livewire\Component;

class Form extends Component
{
    public $id;
    public $nama;
    public $urutan;
    public $deskripsi;

    protected $rules = [
        'nama'    => 'required|max:255',
        'urutan'  => 'required|integer|min:1',
        'deskripsi' => 'nullable|max:500',
    ];

    public function mount($id = null)
    {
        if ($id) {
            $data = KategoriPemeriksaan::find($id);
            if ($data) {
                $this->id = $data->id;
                $this->nama                    = $data->nama;
                $this->urutan                  = $data->urutan;
                $this->deskripsi               = $data->deskripsi;
            }
        }
    }

    public function save()
    {
        $this->validate();
        KategoriPemeriksaan::updateOrCreate(
            ['id' => $this->id],
            ['nama' => $this->nama, 'urutan' => $this->urutan, 'deskripsi' => $this->deskripsi, 'deleted' => 0]
        );
        session()->flash('success', 'Kategori Pemeriksaan berhasil disimpan.');
        $this->redirect(route('reff-kategori-pemeriksaan.index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.reff-kategori-pemeriksaan.form');
    }
}
