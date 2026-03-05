<?php

namespace App\Livewire\ReffEfekSamping;

use Livewire\Component;
use App\Models\EfekSamping;

class Form extends Component
{
    public $id_efek_samping;
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
            $data = EfekSamping::find($id);
            if ($data) {
                $this->id_efek_samping = $data->id;
                $this->nama = $data->nama;
                $this->deskripsi = $data->deskripsi;
                $this->kode = $data->kode;
            }
        }
    }

    public function save()
    {
        $this->validate();
        EfekSamping::updateOrCreate(
            ['id' => $this->id_efek_samping],
            ['nama' => $this->nama, 'deskripsi' => $this->deskripsi, 'kode' => $this->kode, 'deleted' => 0]
        );
        session()->flash('success', 'Efek Samping berhasil disimpan.');
        $this->redirect(route('reff-efek-samping.index'), navigate:true);
    }

    public function render()
    {
        return view('livewire.reff-efek-samping.form');
    }
}
