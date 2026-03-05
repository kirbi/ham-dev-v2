<?php

namespace App\Livewire\KelompokResikoKonseling;

use Livewire\Component;
use App\Models\KelompokResikoKonseling;
use App\Models\KelompokResiko;

class Form extends Component
{
    public $id_kelompok_resiko_konseling;
    public $id_konseling;
    public $id_kelompok_resiko;
    public $lama_tahun;
    public $lama_bulan;

    protected $rules = [
        'id_konseling' => 'required|integer',
        'id_kelompok_resiko' => 'required|integer',
        'lama_tahun' => 'required|integer',
        'lama_bulan' => 'required|integer',
    ];

    public function mount($id = null)
    {
        if ($id) {
            $data = KelompokResikoKonseling::find($id);
            if ($data) {
                $this->id_kelompok_resiko_konseling = $data->id;
                $this->id_konseling = $data->konseling_id;
                $this->id_kelompok_resiko = $data->kelompok_resiko_id;
                $this->lama_tahun = $data->lama_tahun;
                $this->lama_bulan = $data->lama_bulan;
            }
        }
    }

    public function save()
    {
        $this->validate();
        KelompokResikoKonseling::updateOrCreate(
            ['id' => $this->id_kelompok_resiko_konseling],
            [
                'konseling_id' => $this->id_konseling,
                'kelompok_resiko_id' => $this->id_kelompok_resiko,
                'lama_tahun' => $this->lama_tahun,
                'lama_bulan' => $this->lama_bulan,
                'deleted' => 0
            ]
        );
        session()->flash('success', 'Kelompok Resiko Konseling berhasil disimpan.');
        $this->redirect(route('kelompok-resiko-konseling.index'), navigate:true);
    }

    public function render()
    {
        $kelompokResikos = KelompokResiko::where('deleted', 0)->orderBy('nama')->get();
        return view('livewire.kelompok-resiko-konseling.form', [
            'kelompokResikos' => $kelompokResikos
        ]);
    }
}
