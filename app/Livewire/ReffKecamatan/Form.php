<?php

namespace App\Livewire\ReffKecamatan;

use App\Models\Kabupaten;
use App\Models\Kecamatan;
use Livewire\Component;

class Form extends Component
{
    public $id;
    public $nama;
    public $kabupaten_id;

    public $kabupatens = [];

    protected $rules = [
        'nama'         => 'required|max:255',
        'kabupaten_id' => 'required|integer',
    ];

    public function mount($id = null)
    {
        $this->kabupatens = Kabupaten::where('deleted', 0)->orderBy('nama')->get();

        if ($id) {
            $data = Kecamatan::find($id);
            if ($data) {
                $this->id  = $data->id;
                $this->nama           = $data->nama;
                $this->kabupaten_id   = $data->kabupaten_id;
            }
        }
    }

    public function save()
    {
        $this->validate();
        Kecamatan::updateOrCreate(
            ['id' => $this->id],
            ['nama' => $this->nama, 'kabupaten_id' => $this->kabupaten_id, 'deleted' => 0]
        );
        session()->flash('success', 'Kecamatan berhasil disimpan.');
        $this->redirect(route('reff-kecamatan.index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.reff-kecamatan.form');
    }
}
