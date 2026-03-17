<?php

namespace App\Livewire\KajianResikoHiv;

use Livewire\Component;
use App\Models\KajianResikoHiv;
use App\Models\TingkatResikoHiv;

class Form extends Component
{
    public $id;
    public $konseling_hiv_id;
    public $tingkat_resiko_hiv_id;
    public $tanggal;

    protected $rules = [
        'konseling_hiv_id' => 'required|integer',
        'tingkat_resiko_hiv_id' => 'required|integer',
        'tanggal' => 'required|date',
    ];

    public function mount($id = null)
    {
        if ($id) {
            $data = KajianResikoHiv::find($id);
            if ($data) {
                $this->id = $data->id;
                $this->konseling_hiv_id = $data->konseling_hiv_id;
                $this->tingkat_resiko_hiv_id = $data->tingkat_resiko_hiv_id;
                $this->tanggal = $data->tanggal;
            }
        }
    }

    public function save()
    {
        $this->validate();
        KajianResikoHiv::updateOrCreate(
            ['id' => $this->id],
            [
                'konseling_hiv_id' => $this->konseling_hiv_id,
                'tingkat_resiko_hiv_id' => $this->tingkat_resiko_hiv_id,
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
