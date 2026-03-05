<?php

namespace App\Livewire\TesHivKonseling;

use Livewire\Component;
use App\Models\TesHivKonseling;
use App\Models\KonselingHiv;

class Form extends Component
{
    public $id_tes_hiv_konseling;
    public $id_konseling;
    public $jenis_tes;
    public $tanggal_tes;
    public $tes_r1;
    public $tes_r2;
    public $tes_r3;
    public $reagen_r1;
    public $reagen_r2;
    public $reagen_r3;
    public $hasil;

    protected $rules = [
        'id_konseling' => 'required|integer',
        'jenis_tes'    => 'required|max:100',
        'tanggal_tes'  => 'required|date',
        'hasil'        => 'required|max:100',
    ];

    public function mount($id = null)
    {
        if ($id) {
            $data = TesHivKonseling::find($id);
            if ($data) {
                $this->fill($data->only([
                    'id_tes_hiv_konseling','id_konseling','jenis_tes','tanggal_tes',
                    'tes_r1','tes_r2','tes_r3','reagen_r1','reagen_r2','reagen_r3','hasil',
                ]));
            }
        }
    }

    public function save()
    {
        $this->validate();
        TesHivKonseling::updateOrCreate(
            ['id_tes_hiv_konseling' => $this->id_tes_hiv_konseling],
            [
                'id_konseling' => $this->id_konseling,
                'jenis_tes'    => $this->jenis_tes,
                'tanggal_tes'  => $this->tanggal_tes,
                'tes_r1'       => $this->tes_r1,
                'tes_r2'       => $this->tes_r2,
                'tes_r3'       => $this->tes_r3,
                'reagen_r1'    => $this->reagen_r1,
                'reagen_r2'    => $this->reagen_r2,
                'reagen_r3'    => $this->reagen_r3,
                'hasil'        => $this->hasil,
                'deleted'      => 0,
            ]
        );
        session()->flash('success', 'Data tes HIV berhasil disimpan.');
        $this->redirect(route('tes-hiv-konseling.index'), navigate: true);
    }

    public function render()
    {
        $konselings = KonselingHiv::where('deleted', 0)->orderBy('tanggal_konseling', 'DESC')->get();
        return view('livewire.tes-hiv-konseling.form', ['konselings' => $konselings]);
    }
}
