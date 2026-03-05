<?php

namespace App\Livewire\SosialisasiHiv;

use Livewire\Component;
use App\Models\SosialisasiHiv;
use App\Models\Kabupaten;
use App\Models\Kecamatan;

class Form extends Component
{
    public $id_sosialisasi_hiv;
    public $nama_kegiatan;
    public $target_kegiatan;
    public $tempat_kegiatan;
    public $tanggal_kegiatan;
    public $peserta_hadir;
    public $id_kabupaten;
    public $id_kecamatan;
    public $nama_narahubung;
    public $kontak_narahubung;

    protected $rules = [
        'nama_kegiatan'     => 'required|max:255',
        'target_kegiatan'   => 'nullable|max:255',
        'tempat_kegiatan'   => 'required|max:255',
        'tanggal_kegiatan'  => 'required|date',
        'peserta_hadir'     => 'required|integer|min:0',
        'id_kabupaten'      => 'required|integer',
        'id_kecamatan'      => 'required|integer',
        'nama_narahubung'   => 'required|max:255',
        'kontak_narahubung' => 'required|max:50',
    ];

    public function mount($id = null)
    {
        if ($id) {
            $data = SosialisasiHiv::find($id);
            if ($data) {
                $this->fill($data->only([
                    'id_sosialisasi_hiv','nama_kegiatan','target_kegiatan','tempat_kegiatan',
                    'tanggal_kegiatan','peserta_hadir','id_kabupaten','id_kecamatan',
                    'nama_narahubung','kontak_narahubung',
                ]));
            }
        }
    }

    public function save()
    {
        $this->validate();
        SosialisasiHiv::updateOrCreate(
            ['id_sosialisasi_hiv' => $this->id_sosialisasi_hiv],
            [
                'nama_kegiatan'     => $this->nama_kegiatan,
                'target_kegiatan'   => $this->target_kegiatan,
                'tempat_kegiatan'   => $this->tempat_kegiatan,
                'tanggal_kegiatan'  => $this->tanggal_kegiatan,
                'peserta_hadir'     => $this->peserta_hadir,
                'id_kabupaten'      => $this->id_kabupaten,
                'id_kecamatan'      => $this->id_kecamatan,
                'nama_narahubung'   => $this->nama_narahubung,
                'kontak_narahubung' => $this->kontak_narahubung,
                'deleted' => 0,
            ]
        );
        session()->flash('success', 'Data sosialisasi HIV berhasil disimpan.');
        $this->redirect(route('sosialisasi-hiv.index'), navigate: true);
    }

    public function render()
    {
        $kabupatens = Kabupaten::where('deleted', 0)->orderBy('nama')->get();
        $kecamatans = $this->id_kabupaten
            ? Kecamatan::where('id_kabupaten', $this->id_kabupaten)->where('deleted', 0)->orderBy('nama')->get()
            : collect();
        return view('livewire.sosialisasi-hiv.form', compact('kabupatens', 'kecamatans'));
    }
}
