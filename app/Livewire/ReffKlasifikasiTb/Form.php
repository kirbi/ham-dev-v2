<?php

namespace App\Livewire\ReffKlasifikasiTb;

use Livewire\Component;
use App\Models\KlasifikasiTb;

class Form extends Component
{
    public $id_klasifikasi_tb;
    public $nama;
    public $deskripsi;

    protected $rules = [
        'nama' => 'required|max:255',
        'deskripsi' => 'nullable',
    ];

    public function mount($id = null)
    {
        if ($id) {
            $data = KlasifikasiTb::find($id);
            if ($data) {
                $this->id_klasifikasi_tb = $data->id_klasifikasi_tb;
                $this->nama = $data->nama;
                $this->deskripsi = $data->deskripsi ?? null;
            }
        }
    }

    public function save()
    {
        $this->validate();
        KlasifikasiTb::updateOrCreate(
            ['id_klasifikasi_tb' => $this->id_klasifikasi_tb],
            ['nama' => $this->nama, 'deskripsi' => $this->deskripsi, 'deleted' => 0]
        );
        session()->flash('success', 'Klasifikasi TB berhasil disimpan.');
        $this->redirect(route('reff-klasifikasi-tb.index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.reff-klasifikasi-tb.form');
    }
}
