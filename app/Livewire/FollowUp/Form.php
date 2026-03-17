<?php

namespace App\Livewire\FollowUp;

use App\Models\{
    AdherenceArt,
    EfekSamping,
    InfeksiOportunistik,
    PaduanArt,
    Pasien,
    RiwayatPerawatanPasien,
    StatusTb,
    StatusFungsional
};
use Livewire\Component;
use Livewire\Attributes\Validate;

class Form extends Component
{
    public $followupId = null;
    public $pasien_id = '';
    public $tanggal_pengobatan = '';
    public $rencana_kunjungan_selanjutnya = '';
    public $sisa_obat = '';
    public $berat_badan = '';
    public $status_tb_id = '';
    public $paduan_art_id = '';
    public $diberi_kondom = '';
    public $status_fungsional_id = '';
    public $jumlah_cd4 = '';
    public $viral_load = '';

    public $adherenceArts = [];
    public $efekSampings = [];
    public $infeksiOportunistiks = [];
    public $paduanArts = [];
    public $statusFungsionals = [];
    public $statusTbs = [];
    public $pasien = null;

    public function mount($pasien_id = null, $followupId = null)
    {
        $this->adherenceArts = AdherenceArt::orderBy('nama', 'ASC')->where('deleted', 0)->get();
        $this->efekSampings = EfekSamping::orderBy('nama', 'ASC')->where('deleted', 0)->get();
        $this->infeksiOportunistiks = InfeksiOportunistik::orderBy('nama', 'ASC')->where('deleted', 0)->get();
        $this->paduanArts = PaduanArt::orderBy('nama', 'ASC')->where('deleted', 0)->get();
        $this->statusFungsionals = StatusFungsional::orderBy('nama', 'ASC')->where('deleted', 0)->get();
        $this->statusTbs = StatusTb::orderBy('nama', 'ASC')->where('deleted', 0)->get();
        if ($pasien_id) {
            $this->pasien = Pasien::find($pasien_id);
            $this->pasien_id = $pasien_id;
        }
        if ($followupId) {
            $followup = RiwayatPerawatanPasien::find($followupId);
            if ($followup) {
                $this->followupId = $followupId;
                $this->pasien_id = $followup->pasien_id;
                $this->tanggal_pengobatan = $followup->tanggal_pengobatan;
                $this->rencana_kunjungan_selanjutnya = $followup->rencana_kunjungan_selanjutnya;
                $this->sisa_obat = $followup->sisa_obat;
                $this->berat_badan = $followup->berat_badan;
                $this->status_tb_id = $followup->status_tb_id;
                $this->paduan_art_id = $followup->paduan_art_id;
                $this->diberi_kondom = $followup->diberi_kondom;
                $this->status_fungsional_id = $followup->status_fungsional_id;
                $this->jumlah_cd4 = $followup->jumlah_cd4;
                $this->viral_load = $followup->viral_load;
            }
        }
    }

    public function save()
    {
        $this->validate([
            'pasien_id'                       => 'required|integer',
            'tanggal_pengobatan'              => 'required|date',
            'rencana_kunjungan_selanjutnya'   => 'nullable|date',
            'sisa_obat'                       => 'nullable|integer|min:0',
            'berat_badan'                     => 'nullable|numeric|min:0',
            'status_tb_id'                    => 'nullable|integer',
            'paduan_art_id'                   => 'nullable|integer',
            'diberi_kondom'                   => 'nullable|in:Ya,Tidak',
            'status_fungsional_id'            => 'nullable|integer',
            'jumlah_cd4'                      => 'nullable|integer|min:0',
            'viral_load'                      => 'nullable|numeric|min:0',
        ]);

        RiwayatPerawatanPasien::updateOrCreate(
            ['id' => $this->followupId],
            [
                'pasien_id'                     => $this->pasien_id,
                'tanggal_pengobatan'            => $this->tanggal_pengobatan,
                'rencana_kunjungan_selanjutnya' => $this->rencana_kunjungan_selanjutnya,
                'sisa_obat'                     => $this->sisa_obat,
                'berat_badan'                   => $this->berat_badan,
                'status_tb_id'                  => $this->status_tb_id ?: null,
                'paduan_art_id'                 => $this->paduan_art_id ?: null,
                'diberi_kondom'                 => $this->diberi_kondom,
                'status_fungsional_id'          => $this->status_fungsional_id ?: null,
                'jumlah_cd4'                    => $this->jumlah_cd4,
                'viral_load'                    => $this->viral_load,
                'deleted'                       => 0,
            ]
        );

        session()->flash('success', 'Data follow up berhasil disimpan.');
        $this->redirect(route('followup.index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.followup.form');
    }
}
