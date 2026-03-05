<?php

namespace App\Livewire\ReffJenisKelamin;

use Livewire\Component;
use App\Models\JenisKelamin;

class Form extends Component
{
    public $id_jenis_kelamin;
    public $nama;
    public $deskripsi;

    protected $rules = [
        'nama' => 'required|max:255',
        'deskripsi' => 'nullable',
    ];

    public function mount($id = null)
    {
        if ($id) {
            $data = JenisKelamin::find($id);
            if ($data) {
                $this->id_jenis_kelamin = $data->id_jenis_kelamin;
                $this->nama = $data->nama;
                $this->deskripsi = $data->deskripsi ?? null;
            }
        }
    }

    public function save()
    {
        $this->validate();
        JenisKelamin::updateOrCreate(
            ['id_jenis_kelamin' => $this->id_jenis_kelamin],
            ['nama' => $this->nama, 'deskripsi' => $this->deskripsi, 'deleted' => 0]
        );
        session()->flash('success', 'Jenis Kelamin berhasil disimpan.');
        $this->redirect(route('reff-jenis-kelamin.index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.reff-jenis-kelamin.form');
    }
}
