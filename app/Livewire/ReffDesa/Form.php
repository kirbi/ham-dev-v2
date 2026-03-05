<?php

namespace App\Livewire\ReffDesa;

use Livewire\Component;
use App\Models\Desa;
use App\Models\Kecamatan;

class Form extends Component
{
    public $id_desa;
    public $nama;
    public $id_kecamatan;

    protected $rules = [
        'nama' => 'required|max:255',
        'id_kecamatan' => 'required|integer',
    ];

    public function mount($id = null)
    {
        if ($id) {
            $data = Desa::find($id);
            if ($data) {
                $this->id_desa = $data->id;
                $this->nama = $data->nama;
                $this->id_kecamatan = $data->kecamatan_id;
            }
        }
    }

    public function save()
    {
        $this->validate();
        Desa::updateOrCreate(
            ['id' => $this->id_desa],
            ['nama' => $this->nama, 'kecamatan_id' => $this->id_kecamatan, 'deleted' => 0]
        );
        session()->flash('success', 'Desa berhasil disimpan.');
        $this->redirect(route('reff-desa.index'), navigate: true);
    }

    public function render()
    {
        $kecamatans = Kecamatan::where('deleted', 0)->orderBy('nama')->get();
        return view('livewire.reff-desa.form', ['kecamatans' => $kecamatans]);
    }
}
