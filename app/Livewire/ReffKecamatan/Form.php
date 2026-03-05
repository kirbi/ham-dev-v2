<?php

namespace App\Livewire\ReffKecamatan;

use Livewire\Component;
use App\Models\Kecamatan;
use App\Models\Kabupaten;

class Form extends Component
{
    public $id_kecamatan;
    public $nama;
    public $id_kabupaten;

    protected $rules = [
        'nama' => 'required|max:255',
        'id_kabupaten' => 'required|integer',
    ];

    public function mount($id = null)
    {
        if ($id) {
            $data = Kecamatan::find($id);
            if ($data) {
                $this->id_kecamatan = $data->id_kecamatan;
                $this->nama = $data->nama;
                $this->id_kabupaten = $data->id_kabupaten;
            }
        }
    }

    public function save()
    {
        $this->validate();
        Kecamatan::updateOrCreate(
            ['id_kecamatan' => $this->id_kecamatan],
            ['nama' => $this->nama, 'id_kabupaten' => $this->id_kabupaten, 'deleted' => 0]
        );
        session()->flash('success', 'Kecamatan berhasil disimpan.');
        $this->redirect(route('reff-kecamatan.index'), navigate: true);
    }

    public function render()
    {
        $kabupatens = Kabupaten::where('deleted', 0)->orderBy('nama')->get();
        return view('livewire.reff-kecamatan.form', ['kabupatens' => $kabupatens]);
    }
}
