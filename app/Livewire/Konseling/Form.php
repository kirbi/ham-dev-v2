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
    public $pasien_id = '';
    public $tanggal_konseling = '';
    public $kabupaten_id = '';
    public $konselor_id = '';
    public $pendidikan_id = '';
    public $pekerjaan_id = '';
    public $status_pernikahan_id = '';
    public $alasan_tes_hiv_id = '';
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

    public function mount($pasien_id = null, $konselingId = null)
    {
        $this->kabupatens = Kabupaten::orderBy('nama', 'ASC')->where('deleted', 0)->get();
        $this->pekerjaans = Pekerjaan::orderBy('nama', 'ASC')->where('deleted', 0)->get();
        $this->pendidikans = Pendidikan::orderBy('nama', 'ASC')->where('deleted', 0)->get();
        $this->konselors = Konselor::orderBy('nama', 'ASC')->where('deleted', 0)->get();
        $this->alasanTesHivs = AlasanTesHiv::orderBy('nama', 'ASC')->where('deleted', 0)->get();
        $this->statusPernikahans = StatusPernikahan::orderBy('nama', 'ASC')->where('deleted', 0)->get();
        if ($pasien_id) {
            $this->pasien = Pasien::find($pasien_id);
            $this->pasien_id = $pasien_id;
        }
        if ($konselingId) {
            $konseling = KonselingHiv::find($konselingId);
            if ($konseling) {
                $this->konselingId = $konselingId;
                $this->pasien_id = $konseling->pasien_id;
                $this->tanggal_konseling = $konseling->tanggal_konseling;
                $this->kabupaten_id = $konseling->kabupaten_id;
                $this->konselor_id = $konseling->konselor_id;
                $this->pendidikan_id = $konseling->pendidikan_id;
                $this->pekerjaan_id = $konseling->pekerjaan_id;
                $this->status_pernikahan_id = $konseling->status_pernikahan_id;
                $this->alasan_tes_hiv_id = $konseling->alasan_tes_hiv_id;
                $this->alamat = $konseling->alamat;
                $this->no_registrasi = $konseling->no_registrasi;
                $this->status_pasien = $konseling->status_pasien;
            }
        }
    }

    public function save()
    {
        $this->validate([
            'pasien_id'           => 'required|integer',
            'tanggal_konseling'   => 'required|date',
            'kabupaten_id'        => 'required|integer',
            'konselor_id'         => 'required|integer',
            'pendidikan_id'       => 'nullable|integer',
            'pekerjaan_id'        => 'nullable|integer',
            'status_pernikahan_id' => 'nullable|integer',
            'alasan_tes_hiv_id'   => 'nullable|integer',
            'alamat'              => 'nullable|max:500',
            'no_registrasi'       => 'nullable|max:100',
            'status_pasien'       => 'nullable|max:50',
        ]);

        KonselingHiv::updateOrCreate(
            ['id' => $this->konselingId],
            [
                'pasien_id'            => $this->pasien_id,
                'tanggal_konseling'    => $this->tanggal_konseling,
                'kabupaten_id'         => $this->kabupaten_id,
                'konselor_id'          => $this->konselor_id,
                'pendidikan_id'        => $this->pendidikan_id ?: null,
                'pekerjaan_id'         => $this->pekerjaan_id ?: null,
                'status_pernikahan_id' => $this->status_pernikahan_id ?: null,
                'alasan_tes_hiv_id'    => $this->alasan_tes_hiv_id ?: null,
                'alamat'               => $this->alamat,
                'no_registrasi'        => $this->no_registrasi,
                'status_pasien'        => $this->status_pasien,
                'deleted'              => 0,
            ]
        );

        session()->flash('success', 'Data konseling berhasil disimpan.');
        $this->redirect(route('konseling.index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.konseling.form');
    }
}
