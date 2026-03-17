<?php

namespace App\Livewire\RekapTesHivKonseling;

use Livewire\Component;
use App\Models\RekapTesHivKonseling;

class Form extends Component
{
    public $id;
    public $konseling_hiv_id;
    public $hasil;
    public $tempat_tes;
    public $tanggal;

    protected $rules = [
        'konseling_hiv_id' => 'required|integer',
        'hasil' => 'required',
        'tempat_tes' => 'required',
        'tanggal' => 'required|date',
    ];

    public function mount($id = null)
    {
        if ($id) {
            $data = RekapTesHivKonseling::find($id);
            if ($data) {
                $this->id = $data->id;
                $this->konseling_hiv_id = $data->konseling_hiv_id;
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
            ['id' => $this->id],
            [
                'konseling_hiv_id' => $this->konseling_hiv_id,
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
