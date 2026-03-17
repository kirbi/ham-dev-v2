<?php

namespace App\Livewire\FaktorResikoPasien;

use Livewire\Component;
use App\Models\FaktorResikoPasien;
use App\Models\FaktorResiko;
use App\Models\Pasien;

class Form extends Component
{
    public $pasien_id;
    public $faktor_resiko_id;

    protected $rules = [
        'pasien_id' => 'required|integer',
        'faktor_resiko_id' => 'required|integer',
    ];

    public function mount($id = null)
    {
        if ($id) {
            $data = FaktorResikoPasien::find($id);
            if ($data) {
                $this->pasien_id = $data->pasien_id;
                $this->faktor_resiko_id = $data->faktor_resiko_id;
            }
        }
    }

    public function save()
    {
        $this->validate();
        FaktorResikoPasien::updateOrCreate(
            ['pasien_id' => $this->pasien_id, 'faktor_resiko_id' => $this->faktor_resiko_id],
            [
                'pasien_id' => $this->pasien_id,
                'faktor_resiko_id' => $this->faktor_resiko_id,
                'deleted' => 0
            ]
        );
        session()->flash('success', 'Faktor Resiko Pasien berhasil disimpan.');
        $this->redirect(route('faktor-resiko-pasien.index'), navigate: true);
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
