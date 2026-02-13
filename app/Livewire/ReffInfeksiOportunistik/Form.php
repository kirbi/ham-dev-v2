<?php

namespace App\Livewire\ReffInfeksiOportunistik;

use Livewire\Component;
use App\Models\InfeksiOportunistik;

class Form extends Component
{
    public $id_infeksi_oportunistik;
    public $nama;
    public $deskripsi;
    public $kode;

    protected $rules = [
        'nama' => 'required',
        'deskripsi' => 'nullable',
        'kode' => 'required',
    ];

    public function mount($id = null)
    {
        if ($id) {
            $data = InfeksiOportunistik::find($id);
            if ($data) {
                $this->id_infeksi_oportunistik = $data->id_infeksi_oportunistik;
                $this->nama = $data->nama;
                $this->deskripsi = $data->deskripsi;
                $this->kode = $data->kode;
            }
        }
    }

    public function save()
    {
        $this->validate();
        InfeksiOportunistik::updateOrCreate(
            ['id_infeksi_oportunistik' => $this->id_infeksi_oportunistik],
            ['nama' => $this->nama, 'deskripsi' => $this->deskripsi, 'kode' => $this->kode, 'deleted' => 0]
        );
        session()->flash('success', 'Infeksi Oportunistik berhasil disimpan.');
        $this->redirect(route('reff-infeksi-oportunistik.index'), navigate:true);
    }

    public function render()
    {
        return view('livewire.reff-infeksi-oportunistik.form');
    }
}
