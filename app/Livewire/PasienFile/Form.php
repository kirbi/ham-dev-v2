<?php

namespace App\Livewire\PasienFile;

use Livewire\Component;
use App\Models\PasienFile;
use App\Models\Pasien;

class Form extends Component
{
    public $id_file;
    public $nama;
    public $id_pasien;
    public $berkas;
    public $path;

    protected $rules = [
        'nama' => 'required',
        'id_pasien' => 'required|integer',
    ];

    public function mount($id = null)
    {
        if ($id) {
            $data = PasienFile::find($id);
            if ($data) {
                $this->id_file = $data->id;
                $this->nama = $data->nama;
                $this->id_pasien = $data->pasien_id;
                $this->berkas = $data->berkas;
                $this->path = $data->path;
            }
        }
    }

    public function save()
    {
        $this->validate();
        PasienFile::updateOrCreate(
            ['id' => $this->id_file],
            [
                'nama' => $this->nama,
                'pasien_id' => $this->id_pasien,
                'berkas' => $this->berkas,
                'path' => $this->path,
                'deleted' => 0
            ]
        );
        session()->flash('success', 'File Pasien berhasil disimpan.');
        $this->redirect(route('pasien-file.index'), navigate:true);
    }

    public function render()
    {
        $pasiens = Pasien::where('deleted', 0)->orderBy('nama')->get();
        return view('livewire.pasien-file.form', [
            'pasiens' => $pasiens
        ]);
    }
}
