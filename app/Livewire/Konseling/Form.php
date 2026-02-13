<?php

namespace App\Livewire\Konseling;

use App\Models\{
    AlasanTesHiv,
    Kabupaten,
    KonselingHiv,
    Konselor,
    Pasien,
    Pekerjaan,
    Pendidikan,
    StatusPernikahan
};
use Livewire\Component;
use Livewire\Attributes\Validate;

class Form extends Component
{
    public $konselingId = null;
    public $id_pasien = '';
    public $tanggal_konseling = '';
    public $id_kabupaten = '';
    public $id_konselor = '';
    public $id_pendidikan = '';
    public $id_pekerjaan = '';
    public $id_status_pernikahan = '';
    public $id_alasan_tes_hiv = '';
    public $alamat = '';
    public $no_registrasi = '';
    public $status_pasien = '';

    public $kabupatens = [];
    public $pekerjaans = [];
    public $pendidikans = [];
    public $konselors = [];
    public $alasanTesHivs = [];
    public $statusPernikahans = [];
    public $pasien = null;

    public function mount($id_pasien = null, $konselingId = null)
    {
        $this->kabupatens = Kabupaten::orderBy('nama', 'ASC')->where('deleted', 0)->get();
        $this->pekerjaans = Pekerjaan::orderBy('nama', 'ASC')->where('deleted', 0)->get();
        $this->pendidikans = Pendidikan::orderBy('nama', 'ASC')->where('deleted', 0)->get();
        $this->konselors = Konselor::orderBy('nama', 'ASC')->where('deleted', 0)->get();
        $this->alasanTesHivs = AlasanTesHiv::orderBy('nama', 'ASC')->where('deleted', 0)->get();
        $this->statusPernikahans = StatusPernikahan::orderBy('nama', 'ASC')->where('deleted', 0)->get();
        if ($id_pasien) {
            $this->pasien = Pasien::find($id_pasien);
            $this->id_pasien = $id_pasien;
        }
        if ($konselingId) {
            $konseling = KonselingHiv::find($konselingId);
            if ($konseling) {
                $this->konselingId = $konselingId;
                $this->id_pasien = $konseling->id_pasien;
                $this->tanggal_konseling = $konseling->tanggal_konseling;
                $this->id_kabupaten = $konseling->id_kabupaten;
                $this->id_konselor = $konseling->id_konselor;
                $this->id_pendidikan = $konseling->id_pendidikan;
                $this->id_pekerjaan = $konseling->id_pekerjaan;
                $this->id_status_pernikahan = $konseling->id_status_pernikahan;
                $this->id_alasan_tes_hiv = $konseling->id_alasan_tes_hiv;
                $this->alamat = $konseling->alamat;
                $this->no_registrasi = $konseling->no_registrasi;
                $this->status_pasien = $konseling->status_pasien;
            }
        }
    }

    public function save()
    {
        // Validasi dan simpan data konseling
        // ...implementasi validasi dan simpan seperti di controller lama...
    }

    public function render()
    {
        return view('livewire.konseling.form');
    }
}
