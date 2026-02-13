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
    public $id_pasien = '';
    public $tanggal_pengobatan = '';
    public $rencana_kunjungan_selanjutnya = '';
    public $sisa_obat = '';
    public $berat_badan = '';
    public $id_status_tb = '';
    public $id_paduan_art = '';
    public $diberi_kondom = '';
    public $id_status_fungsional = '';
    public $jumlah_cd4 = '';
    public $viral_load = '';

    public $adherenceArts = [];
    public $efekSampings = [];
    public $infeksiOportunistiks = [];
    public $paduanArts = [];
    public $statusFungsionals = [];
    public $statusTbs = [];
    public $pasien = null;

    public function mount($id_pasien = null, $followupId = null)
    {
        $this->adherenceArts = AdherenceArt::orderBy('nama', 'ASC')->where('deleted', 0)->get();
        $this->efekSampings = EfekSamping::orderBy('nama', 'ASC')->where('deleted', 0)->get();
        $this->infeksiOportunistiks = InfeksiOportunistik::orderBy('nama', 'ASC')->where('deleted', 0)->get();
        $this->paduanArts = PaduanArt::orderBy('nama', 'ASC')->where('deleted', 0)->get();
        $this->statusFungsionals = StatusFungsional::orderBy('nama', 'ASC')->where('deleted', 0)->get();
        $this->statusTbs = StatusTb::orderBy('nama', 'ASC')->where('deleted', 0)->get();
        if ($id_pasien) {
            $this->pasien = Pasien::find($id_pasien);
            $this->id_pasien = $id_pasien;
        }
        if ($followupId) {
            $followup = RiwayatPerawatanPasien::find($followupId);
            if ($followup) {
                $this->followupId = $followupId;
                $this->id_pasien = $followup->id_pasien;
                $this->tanggal_pengobatan = $followup->tanggal_pengobatan;
                $this->rencana_kunjungan_selanjutnya = $followup->rencana_kunjungan_selanjutnya;
                $this->sisa_obat = $followup->sisa_obat;
                $this->berat_badan = $followup->berat_badan;
                $this->id_status_tb = $followup->id_status_tb;
                $this->id_paduan_art = $followup->id_paduan_art;
                $this->diberi_kondom = $followup->diberi_kondom;
                $this->id_status_fungsional = $followup->id_status_fungsional;
                $this->jumlah_cd4 = $followup->jumlah_cd4;
                $this->viral_load = $followup->viral_load;
            }
        }
    }

    public function save()
    {
        // Validasi dan simpan data follow up
        // ...implementasi validasi dan simpan seperti di controller lama...
    }

    public function render()
    {
        return view('livewire.followup.form');
    }
}
