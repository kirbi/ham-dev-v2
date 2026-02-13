<?php

namespace App\Livewire\InfoTesHivKonseling;

use Livewire\Component;
use App\Models\InfoTesHivKonseling;
use App\Models\InfoTesHiv;

class Form extends Component
{
    public $id_info_tes_hiv_konseling;
    public $id_konseling;
    public $id_info_tes_hiv;

    protected $rules = [
        'id_konseling' => 'required|integer',
        'id_info_tes_hiv' => 'required|integer',
    ];

    public function mount($id = null)
    {
        if ($id) {
            $data = InfoTesHivKonseling::find($id);
            if ($data) {
                $this->id_info_tes_hiv_konseling = $data->id_info_tes_hiv_konseling;
                $this->id_konseling = $data->id_konseling;
                $this->id_info_tes_hiv = $data->id_info_tes_hiv;
            }
        }
    }

    public function save()
    {
        $this->validate();
        InfoTesHivKonseling::updateOrCreate(
            ['id_info_tes_hiv_konseling' => $this->id_info_tes_hiv_konseling],
            [
                'id_konseling' => $this->id_konseling,
                'id_info_tes_hiv' => $this->id_info_tes_hiv,
                'deleted' => 0
            ]
        );
        session()->flash('success', 'Sumber Info Tes HIV berhasil disimpan.');
        $this->redirect(route('info-tes-hiv-konseling.index'), navigate:true);
    }

    public function render()
    {
        $infoTesHivs = InfoTesHiv::where('deleted', 0)->orderBy('nama')->get();
        return view('livewire.info-tes-hiv-konseling.form', [
            'infoTesHivs' => $infoTesHivs
        ]);
    }
}
