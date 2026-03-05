<?php

namespace App\Livewire\KajianResikoHiv;

use Livewire\Component;
use App\Models\KajianResikoHiv;
use App\Models\TingkatResikoHiv;

class Form extends Component
{
    public $id_kajian_resiko_hiv;
    public $id_konseling;
    public $id_tingkat_resiko_hiv;
    public $tanggal;

    protected $rules = [
        'id_konseling' => 'required|integer',
        'id_tingkat_resiko_hiv' => 'required|integer',
        'tanggal' => 'required|date',
    ];

    public function mount($id = null)
    {
        if ($id) {
            $data = KajianResikoHiv::find($id);
            if ($data) {
                $this->id_kajian_resiko_hiv = $data->id;
                $this->id_konseling = $data->konseling_id;
                $this->id_tingkat_resiko_hiv = $data->tingkat_resiko_hiv_id;
                $this->tanggal = $data->tanggal;
            }
        }
    }

    public function save()
    {
        $this->validate();
        KajianResikoHiv::updateOrCreate(
            ['id' => $this->id_kajian_resiko_hiv],
            [
                'konseling_id' => $this->id_konseling,
                'tingkat_resiko_hiv_id' => $this->id_tingkat_resiko_hiv,
                'tanggal' => $this->tanggal,
                'deleted' => 0
            ]
        );
        session()->flash('success', 'Kajian Resiko HIV berhasil disimpan.');
        $this->redirect(route('kajian-resiko-hiv.index'), navigate:true);
    }

    public function render()
    {
        $tingkatResikoHivs = TingkatResikoHiv::where('deleted', 0)->orderBy('nama')->get();
        return view('livewire.kajian-resiko-hiv.form', [
            'tingkatResikoHivs' => $tingkatResikoHivs
        ]);
    }
}
