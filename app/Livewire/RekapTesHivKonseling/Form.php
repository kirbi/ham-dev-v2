<?php

namespace App\Livewire\RekapTesHivKonseling;

use Livewire\Component;
use App\Models\RekapTesHivKonseling;

class Form extends Component
{
    public $id_rekap_tes_hiv_konseling;
    public $id_konseling;
    public $hasil;
    public $tempat_tes;
    public $tanggal;

    protected $rules = [
        'id_konseling' => 'required|integer',
        'hasil' => 'required',
        'tempat_tes' => 'required',
        'tanggal' => 'required|date',
    ];

    public function mount($id = null)
    {
        if ($id) {
            $data = RekapTesHivKonseling::find($id);
            if ($data) {
                $this->id_rekap_tes_hiv_konseling = $data->id_rekap_tes_hiv_konseling;
                $this->id_konseling = $data->id_konseling;
                $this->hasil = $data->hasil;
                $this->tempat_tes = $data->tempat_tes;
                $this->tanggal = $data->tanggal;
            }
        }
    }

    public function save()
    {
        $this->validate();
        RekapTesHivKonseling::updateOrCreate(
            ['id_rekap_tes_hiv_konseling' => $this->id_rekap_tes_hiv_konseling],
            [
                'id_konseling' => $this->id_konseling,
                'hasil' => $this->hasil,
                'tempat_tes' => $this->tempat_tes,
                'tanggal' => $this->tanggal,
                'deleted' => 0
            ]
        );
        session()->flash('success', 'Rekap Tes HIV berhasil disimpan.');
        $this->redirect(route('rekap-tes-hiv-konseling.index'), navigate:true);
    }

    public function render()
    {
        return view('livewire.rekap-tes-hiv-konseling.form');
    }
}
