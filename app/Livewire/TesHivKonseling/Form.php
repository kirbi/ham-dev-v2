<?php

namespace App\Livewire\TesHivKonseling;

use App\Models\KonselingHiv;
use App\Models\TesHivKonseling as TesHivKonselingModel;
use Livewire\Component;

class Form extends Component
{
    public $id;
    public $konseling_hiv_id;
    public $tes_r1     = '';
    public $tes_r2     = '';
    public $tes_r3     = '';
    public $reagen_r1  = '';
    public $reagen_r2  = '';
    public $reagen_r3  = '';
    public $hasil;
    public $jenis_tes;
    public $tanggal_tes;

    public $konselingList = [];

    protected $rules = [
        'konseling_hiv_id' => 'required|integer',
        'hasil'        => 'required|max:100',
        'jenis_tes'    => 'required|max:100',
        'tanggal_tes'  => 'required|date',
        'tes_r1'       => 'nullable|max:100',
        'tes_r2'       => 'nullable|max:100',
        'tes_r3'       => 'nullable|max:100',
        'reagen_r1'    => 'nullable|max:100',
        'reagen_r2'    => 'nullable|max:100',
        'reagen_r3'    => 'nullable|max:100',
    ];

    public function mount($id = null)
    {
        $this->konselingList = KonselingHiv::with('pasien')
            ->where('deleted', 0)
            ->orderBy('tanggal_konseling', 'DESC')
            ->get();

        if ($id) {
            $data = TesHivKonselingModel::find($id);
            if ($data) {
                $this->id = $data->id;
                $this->konseling_hiv_id         = $data->konseling_hiv_id;
                $this->tes_r1               = $data->tes_r1;
                $this->tes_r2               = $data->tes_r2;
                $this->tes_r3               = $data->tes_r3;
                $this->reagen_r1            = $data->reagen_r1;
                $this->reagen_r2            = $data->reagen_r2;
                $this->reagen_r3            = $data->reagen_r3;
                $this->hasil                = $data->hasil;
                $this->jenis_tes            = $data->jenis_tes;
                $this->tanggal_tes          = $data->tanggal_tes;
            }
        }
    }

    public function save()
    {
        $this->validate();
        TesHivKonselingModel::updateOrCreate(
            ['id' => $this->id],
            [
                'konseling_hiv_id' => $this->konseling_hiv_id,
                'tes_r1'       => $this->tes_r1,
                'tes_r2'       => $this->tes_r2,
                'tes_r3'       => $this->tes_r3,
                'reagen_r1'    => $this->reagen_r1,
                'reagen_r2'    => $this->reagen_r2,
                'reagen_r3'    => $this->reagen_r3,
                'hasil'        => $this->hasil,
                'jenis_tes'    => $this->jenis_tes,
                'tanggal_tes'  => $this->tanggal_tes,
                'deleted'      => 0,
            ]
        );
        session()->flash('success', 'Tes HIV Konseling berhasil disimpan.');
        $this->redirect(route('tes-hiv-konseling.index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.tes-hiv-konseling.form');
    }
}
