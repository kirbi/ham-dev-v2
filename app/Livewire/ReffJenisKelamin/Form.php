<?php

namespace App\Livewire\ReffJenisKelamin;

use App\Models\JenisKelamin;
use Livewire\Component;

class Form extends Component
{
    public $id;
    public $inisial;
    public $deskripsi;

    protected $rules = [
        'inisial'  => 'required|max:10',
        'deskripsi' => 'nullable|max:255',
    ];

    public function mount($id = null)
    {
        if ($id) {
            $data = JenisKelamin::find($id);
            if ($data) {
                $this->id = $data->id;
                $this->inisial          = $data->inisial;
                $this->deskripsi        = $data->deskripsi;
            }
        }
    }

    public function save()
    {
        $this->validate();
        JenisKelamin::updateOrCreate(
            ['id' => $this->id],
            ['inisial' => $this->inisial, 'deskripsi' => $this->deskripsi, 'deleted' => 0]
        );
        session()->flash('success', 'Jenis Kelamin berhasil disimpan.');
        $this->redirect(route('reff-jenis-kelamin.index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.reff-jenis-kelamin.form');
    }
}
