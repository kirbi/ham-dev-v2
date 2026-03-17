<?php

namespace App\Livewire\Pasien;

use App\Models\{
    Desa,
    Kabupaten,
    Kecamatan,
    Konselor,
    Pasien,
    Pekerjaan,
    Pendidikan,
    Provinsi,
    StatusPernikahan
};
use Livewire\Component;
use Livewire\Attributes\Validate;

class Form extends Component
{
    // Form fields
    public $pasienId = null;
    
    #[Validate('required|max:50')]
    public $no_reg_nasional = '';
    
    #[Validate('required|max:50')]
    public $no_rekam_medis = '';
    
    #[Validate('required|max:30')]
    public $nik = '';
    
    #[Validate('required|max:30')]
    public $no_kk = '';
    
    #[Validate('max:30')]
    public $no_bpjs = '';
    
    #[Validate('required|max:100')]
    public $nama = '';
    
    #[Validate('required|date')]
    public $tanggal_lahir = '';
    
    #[Validate('required|max:100')]
    public $tempat_lahir = '';
    
    #[Validate('required')]
    public $jenis_kelamin = 'L';
    
    #[Validate('required|max:250')]
    public $alamat = '';
    
    #[Validate('required|max:25')]
    public $no_hp = '';
    
    #[Validate('required|integer')]
    public $pendidikan_id_terakhir = '';
    
    #[Validate('required|integer')]
    public $pekerjaan_id = '';
    
    #[Validate('required|integer')]
    public $status_pernikahan_id = '';
    
    #[Validate('required|integer')]
    public $konselor_id = '';
    
    #[Validate('required')]
    public $agama = '';
    
    public $jenis_pasien = '';
    public $status_aktif = 'aktif';
    public $provinsi_id = '';
    public $kabupaten_id = '';
    public $kecamatan_id = '';
    public $desa_id = '';
    public $tempat_tinggal = '';
    public $ibu_kandung = '';
    public $tanggal_rujuk_masuk = '';
    public $tanggal_rujuk_keluar = '';
    public $tanggal_meninggal = '';
    public $tanggal_masuk = '';
    public $tempat_rujuk_keluar = '';

    // Options for select fields
    public $pekerjaans = [];
    public $pendidikans = [];
    public $konselors = [];
    public $statusPernikahans = [];
    public $provinsis = [];
    public $kabupatens = [];
    public $kecamatans = [];
    public $desas = [];

    public function mount($id = null)
    {
        // Load options
        $this->loadOptions();

        // Load existing data if editing
        if ($id) {
            $this->pasienId = $id;
            $this->loadPasien($id);
        }
    }

    public function loadOptions()
    {
        $this->pekerjaans = Pekerjaan::orderBy('nama', 'ASC')->where('deleted', 0)->get();
        $this->pendidikans = Pendidikan::orderBy('nama', 'ASC')->where('deleted', 0)->get();
        $this->konselors = Konselor::orderBy('nama', 'ASC')->where('deleted', 0)->get();
        $this->statusPernikahans = StatusPernikahan::orderBy('nama', 'ASC')->where('deleted', 0)->get();
        $this->provinsis = Provinsi::orderBy('nama', 'ASC')->where('deleted', 0)->get();
    }

    public function loadPasien($id)
    {
        $pasien = Pasien::findOrFail($id);
        
        $this->no_reg_nasional = $pasien->no_reg_nasional;
        $this->no_rekam_medis = $pasien->no_rekam_medis;
        $this->nik = $pasien->nik;
        $this->no_kk = $pasien->no_kk;
        $this->no_bpjs = $pasien->no_bpjs;
        $this->nama = $pasien->nama;
        $this->tanggal_lahir = $pasien->tanggal_lahir;
        $this->tempat_lahir = $pasien->tempat_lahir;
        $this->jenis_kelamin = $pasien->jenis_kelamin;
        $this->alamat = $pasien->alamat;
        $this->no_hp = $pasien->no_hp;
        $this->pendidikan_id_terakhir = $pasien->pendidikan_id_terakhir;
        $this->pekerjaan_id = $pasien->pekerjaan_id;
        $this->status_pernikahan_id = $pasien->status_pernikahan_id;
        $this->konselor_id = $pasien->konselor_id;
        $this->agama = $pasien->agama;
        $this->jenis_pasien = $pasien->jenis_pasien;
        $this->status_aktif = $pasien->status_aktif;
        $this->provinsi_id = $pasien->provinsi_id;
        $this->kabupaten_id = $pasien->kabupaten_id;
        $this->kecamatan_id = $pasien->kecamatan_id;
        $this->desa_id = $pasien->desa_id;
        $this->tempat_tinggal = $pasien->tempat_tinggal;
        $this->ibu_kandung = $pasien->ibu_kandung;
        $this->tanggal_rujuk_masuk = $pasien->tanggal_rujuk_masuk;
        $this->tanggal_rujuk_keluar = $pasien->tanggal_rujuk_keluar;
        $this->tanggal_meninggal = $pasien->tanggal_meninggal;
        $this->tanggal_masuk = $pasien->tanggal_masuk;
        $this->tempat_rujuk_keluar = $pasien->tempat_rujuk_keluar;

        // Load dependent dropdowns
        if ($this->provinsi_id) {
            $this->updatedIdProvinsi();
        }
        if ($this->kabupaten_id) {
            $this->updatedIdKabupaten();
        }
        if ($this->kecamatan_id) {
            $this->updatedIdKecamatan();
        }
    }

    // Cascading dropdown handlers
    public function updatedIdProvinsi()
    {
        $this->kabupatens = Kabupaten::where('provinsi_id', $this->provinsi_id)
            ->where('deleted', 0)
            ->orderBy('nama', 'ASC')
            ->get();
        $this->kabupaten_id = '';
        $this->kecamatans = [];
        $this->desas = [];
    }

    public function updatedIdKabupaten()
    {
        $this->kecamatans = Kecamatan::where('kabupaten_id', $this->kabupaten_id)
            ->where('deleted', 0)
            ->orderBy('nama', 'ASC')
            ->get();
        $this->kecamatan_id = '';
        $this->desas = [];
    }

    public function updatedIdKecamatan()
    {
        $this->desas = Desa::where('kecamatan_id', $this->kecamatan_id)
            ->where('deleted', 0)
            ->orderBy('nama', 'ASC')
            ->get();
        $this->desa_id = '';
    }

    public function save()
    {
        $this->validate();

        try {
            $data = [
                'no_reg_nasional' => $this->no_reg_nasional,
                'no_rekam_medis' => $this->no_rekam_medis,
                'nik' => $this->nik,
                'no_kk' => $this->no_kk,
                'no_bpjs' => $this->no_bpjs,
                'nama' => $this->nama,
                'tanggal_lahir' => $this->tanggal_lahir,
                'tempat_lahir' => $this->tempat_lahir,
                'jenis_kelamin' => $this->jenis_kelamin,
                'alamat' => $this->alamat,
                'no_hp' => $this->no_hp,
                'pendidikan_id_terakhir' => $this->pendidikan_id_terakhir,
                'pekerjaan_id' => $this->pekerjaan_id,
                'status_pernikahan_id' => $this->status_pernikahan_id,
                'konselor_id' => $this->konselor_id,
                'agama' => $this->agama,
                'jenis_pasien' => $this->jenis_pasien,
                'status_aktif' => $this->status_aktif,
                'provinsi_id' => $this->provinsi_id,
                'kabupaten_id' => $this->kabupaten_id,
                'kecamatan_id' => $this->kecamatan_id,
                'desa_id' => $this->desa_id,
                'tempat_tinggal' => $this->tempat_tinggal,
                'ibu_kandung' => $this->ibu_kandung,
                'tanggal_rujuk_masuk' => $this->tanggal_rujuk_masuk,
                'tanggal_rujuk_keluar' => $this->tanggal_rujuk_keluar,
                'tanggal_meninggal' => $this->tanggal_meninggal,
                'tanggal_masuk' => $this->tanggal_masuk,
                'tempat_rujuk_keluar' => $this->tempat_rujuk_keluar,
            ];

            if ($this->pasienId) {
                $pasien = Pasien::findOrFail($this->pasienId);
                $pasien->update($data);
                $message = 'Data pasien berhasil diupdate.';
            } else {
                Pasien::create($data);
                $message = 'Data pasien berhasil disimpan.';
            }

            $this->dispatch('alert', type: 'success', message: $message);
            return redirect()->route('pasien.index');
            
        } catch (\Exception $e) {
            $this->dispatch('alert', type: 'error', message: 'Gagal menyimpan data: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.pasien.form');
    }
}
