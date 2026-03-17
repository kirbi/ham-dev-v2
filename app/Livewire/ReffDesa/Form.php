<?php

namespace App\Livewire\ReffDesa;

use App\Models\Desa;
use App\Models\Kecamatan;
use Livewire\Component;

class Form extends Component
{
    public $id;
    public $nama;
    public $kecamatan_id;

    public $kecamatans = [];

    protected $rules = [
        'nama'          => 'required|max:255',
        'kecamatan_id'  => 'required|integer',
    ];

    public function mount($id = null)
    {
        $this->kecamatans = Kecamatan::where('deleted', 0)->orderBy('nama')->get();

        if ($id) {
            $data = Desa::find($id);
            if ($data) {
                $this->id       = $data->id;
                $this->nama          = $data->nama;
                $this->kecamatan_id  = $data->kecamatan_id;
            }
        }
    }

    public function save()
    {
        $this->validate();
        Desa::updateOrCreate(
            ['id' => $this->id],
            ['nama' => $this->nama, 'kecamatan_id' => $this->kecamatan_id, 'deleted' => 0]
        );
        session()->flash('success', 'Desa/Kelurahan berhasil disimpan.');
        $this->redirect(route('reff-desa.index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.reff-desa.form');
    }
}
