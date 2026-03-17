<?php

namespace App\Livewire\InfoTesHivKonseling;

use Livewire\Component;
use App\Models\InfoTesHivKonseling;
use App\Models\InfoTesHiv;

class Form extends Component
{
    public $konseling_hiv_id;
    public $info_tes_hiv_id;

    protected $rules = [
        'konseling_hiv_id' => 'required|integer',
        'info_tes_hiv_id' => 'required|integer',
    ];

    public function mount($id = null)
    {
        if ($id) {
            $data = InfoTesHivKonseling::find($id);
            if ($data) {
                $this->konseling_hiv_id = $data->konseling_hiv_id;
                $this->info_tes_hiv_id = $data->info_tes_hiv_id;
            }
        }
    }

    public function save()
    {
        $this->validate();
        InfoTesHivKonseling::updateOrCreate(
            ['konseling_hiv_id' => $this->konseling_hiv_id, 'info_tes_hiv_id' => $this->info_tes_hiv_id],
            [
                'konseling_hiv_id' => $this->konseling_hiv_id,
                'info_tes_hiv_id' => $this->info_tes_hiv_id,
                'deleted' => 0
            ]
        );
        session()->flash('success', 'Sumber Info Tes HIV berhasil disimpan.');
        $this->redirect(route('info-tes-hiv-konseling.index'), navigate: true);
    }

    public function render()
    {
        $infoTesHivs = InfoTesHiv::where('deleted', 0)->orderBy('nama')->get();
        return view('livewire.info-tes-hiv-konseling.form', [
            'infoTesHivs' => $infoTesHivs
        ]);
    }
}
