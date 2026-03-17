<?php

namespace App\Livewire\CheckHiv;

use Livewire\Component;
use App\Models\CheckHiv;
use App\Models\Kabupaten;
use App\Models\Kecamatan;

class Form extends Component
{
    public $id;
    public $nama_kegiatan;
    public $nama_tempat;
    public $deskripsi_kegiatan;
    public $tanggal_kegiatan;
    public $hadir;
    public $jumlah_positif;
    public $jumlah_negatif;
    public $kabupaten_id;
    public $kecamatan_id;
    public $nama_narahubung;
    public $kontak_narahubung;

    protected $rules = [
        'nama_kegiatan' => 'required|max:150',
        'nama_tempat' => 'required|max:250',
        'tanggal_kegiatan' => 'required|date',
        'hadir' => 'integer|required',
        'jumlah_positif' => 'integer|required',
        'jumlah_negatif' => 'integer|required',
        'kabupaten_id' => 'integer|required',
        'kecamatan_id' => 'integer|required',
        'nama_narahubung' => 'required|max:250',
        'kontak_narahubung' => 'required|max:50',
    ];

    public function mount($id = null)
    {
        if ($id) {
            $data = CheckHiv::find($id);
            if ($data) {
                $this->id = $data->id;
                $this->nama_kegiatan = $data->nama_kegiatan;
                $this->nama_tempat = $data->nama_tempat;
                $this->deskripsi_kegiatan = $data->deskripsi_kegiatan;
                $this->tanggal_kegiatan = $data->tanggal_kegiatan;
                $this->hadir = $data->hadir;
                $this->jumlah_positif = $data->jumlah_positif;
                $this->jumlah_negatif = $data->jumlah_negatif;
                $this->kabupaten_id = $data->kabupaten_id;
                $this->kecamatan_id = $data->kecamatan_id;
                $this->nama_narahubung = $data->nama_narahubung;
                $this->kontak_narahubung = $data->kontak_narahubung;
            }
        }
    }

    public function save()
    {
        $this->validate();
        CheckHiv::updateOrCreate(
            ['id' => $this->id],
            [
                'nama_kegiatan' => $this->nama_kegiatan,
                'nama_tempat' => $this->nama_tempat,
                'deskripsi_kegiatan' => $this->deskripsi_kegiatan,
                'tanggal_kegiatan' => $this->tanggal_kegiatan,
                'hadir' => $this->hadir,
                'jumlah_positif' => $this->jumlah_positif,
                'jumlah_negatif' => $this->jumlah_negatif,
                'kabupaten_id' => $this->kabupaten_id,
                'kecamatan_id' => $this->kecamatan_id,
                'nama_narahubung' => $this->nama_narahubung,
                'kontak_narahubung' => $this->kontak_narahubung,
                'deleted' => 0
            ]
        );
        session()->flash('success', 'Kegiatan Check HIV berhasil disimpan.');
        $this->redirect(route('check-hiv.index'), navigate:true);
    }

    public function render()
    {
        $kabupatens = Kabupaten::where('deleted', 0)->orderBy('nama')->get();
        $kecamatans = $this->kabupaten_id ? Kecamatan::where('kabupaten_id', $this->kabupaten_id)->where('deleted', 0)->orderBy('nama')->get() : collect();
        return view('livewire.check-hiv.form', [
            'kabupatens' => $kabupatens,
            'kecamatans' => $kecamatans
        ]);
    }
}
