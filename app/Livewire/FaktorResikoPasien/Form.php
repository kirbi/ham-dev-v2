<?php

namespace App\Livewire\FaktorResikoPasien;

use Livewire\Component;
use App\Models\FaktorResikoPasien;
use App\Models\FaktorResiko;
use App\Models\Pasien;

class Form extends Component
{
    public $id_faktor_resiko_pasien;
    public $id_pasien;
    public $id_faktor_resiko;

    protected $rules = [
        'id_pasien' => 'required|integer',
        'id_faktor_resiko' => 'required|integer',
    ];

    public function mount($id = null)
    {
        if ($id) {
            $data = FaktorResikoPasien::find($id);
            if ($data) {
                $this->id_faktor_resiko_pasien = $data->id_faktor_resiko_pasien;
                $this->id_pasien = $data->id_pasien;
                $this->id_faktor_resiko = $data->id_faktor_resiko;
            }
        }
    }

    public function save()
    {
        $this->validate();
        FaktorResikoPasien::updateOrCreate(
            ['id_faktor_resiko_pasien' => $this->id_faktor_resiko_pasien],
            [
                'id_pasien' => $this->id_pasien,
                'id_faktor_resiko' => $this->id_faktor_resiko,
                'deleted' => 0
            ]
        );
        session()->flash('success', 'Faktor Resiko Pasien berhasil disimpan.');
        $this->redirect(route('faktor-resiko-pasien.index'), navigate:true);
    }

    public function render()
    {
        $pasiens = Pasien::where('deleted', 0)->orderBy('nama')->get();
        $faktorResikos = FaktorResiko::where('deleted', 0)->orderBy('nama')->get();
        return view('livewire.faktor-resiko-pasien.form', [
            'pasiens' => $pasiens,
            'faktorResikos' => $faktorResikos
        ]);
    }
}
