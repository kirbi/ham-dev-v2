<?php

namespace App\Livewire\KelompokResikoKonseling;

use Livewire\Component;
use App\Models\KelompokResikoKonseling;
use App\Models\KelompokResiko;

class Form extends Component
{
    public $konseling_hiv_id;
    public $kelompok_resiko_id;
    public $lama_tahun;
    public $lama_bulan;

    protected $rules = [
        'konseling_hiv_id' => 'required|integer',
        'kelompok_resiko_id' => 'required|integer',
        'lama_tahun' => 'required|integer',
        'lama_bulan' => 'required|integer',
    ];

    public function mount($id = null)
    {
        if ($id) {
            $data = KelompokResikoKonseling::find($id);
            if ($data) {
                $this->konseling_hiv_id = $data->konseling_hiv_id;
                $this->kelompok_resiko_id = $data->kelompok_resiko_id;
                $this->lama_tahun = $data->lama_tahun;
                $this->lama_bulan = $data->lama_bulan;
            }
        }
    }

    public function save()
    {
        $this->validate();
        KelompokResikoKonseling::updateOrCreate(
            ['konseling_hiv_id' => $this->konseling_hiv_id, 'kelompok_resiko_id' => $this->kelompok_resiko_id],
            [
                'konseling_hiv_id' => $this->konseling_hiv_id,
                'kelompok_resiko_id' => $this->kelompok_resiko_id,
                'lama_tahun' => $this->lama_tahun,
                'lama_bulan' => $this->lama_bulan,
                'deleted' => 0
            ]
        );
        session()->flash('success', 'Kelompok Resiko Konseling berhasil disimpan.');
        $this->redirect(route('kelompok-resiko-konseling.index'), navigate: true);
    }

    public function render()
    {
        $kelompokResikos = KelompokResiko::where('deleted', 0)->orderBy('nama')->get();
        return view('livewire.kelompok-resiko-konseling.form', [
            'kelompokResikos' => $kelompokResikos
        ]);
    }
}
