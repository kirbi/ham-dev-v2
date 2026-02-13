<?php

namespace App\Livewire\PengobatanTbHiv;

use Livewire\Component;
use App\Models\PengobatanTbHiv;
use App\Models\Pasien;
use App\Models\TipeTb;
use App\Models\KlasifikasiTb;
use App\Models\PaduanTb;
use App\Models\Kabupaten;

class Form extends Component
{
    public $id_pengobatan_tb_hiv;
    public $id_pasien;
    public $id_tipe_tb;
    public $id_klasifikasi_tb;
    public $id_paduan_tb;
    public $id_kabupaten_pengobatan;
    public $nama_sarana_kesehatan;
    public $no_reg_tb;
    public $tanggal_mulai_terapi;
    public $tanggal_selesai_terapi;
    public $lokasi_tb;

    protected $rules = [
        'id_pasien' => 'required|integer',
        'id_tipe_tb' => 'required|integer',
        'id_klasifikasi_tb' => 'required|integer',
        'id_paduan_tb' => 'required|integer',
        'id_kabupaten_pengobatan' => 'required|integer',
        'nama_sarana_kesehatan' => 'required|max:250',
        'no_reg_tb' => 'required|max:100',
        'tanggal_mulai_terapi' => 'required|date',
        'tanggal_selesai_terapi' => 'nullable|date',
        'lokasi_tb' => 'nullable|max:250',
    ];

    public function mount($id = null)
    {
        if ($id) {
            $data = PengobatanTbHiv::find($id);
            if ($data) {
                $this->id_pengobatan_tb_hiv = $data->id_pengobatan_tb_hiv;
                $this->id_pasien = $data->id_pasien;
                $this->id_tipe_tb = $data->id_tipe_tb;
                $this->id_klasifikasi_tb = $data->id_klasifikasi_tb;
                $this->id_paduan_tb = $data->id_paduan_tb;
                $this->id_kabupaten_pengobatan = $data->id_kabupaten_pengobatan;
                $this->nama_sarana_kesehatan = $data->nama_sarana_kesehatan;
                $this->no_reg_tb = $data->no_reg_tb;
                $this->tanggal_mulai_terapi = $data->tanggal_mulai_terapi;
                $this->tanggal_selesai_terapi = $data->tanggal_selesai_terapi;
                $this->lokasi_tb = $data->lokasi_tb;
            }
        }
    }

    public function save()
    {
        $this->validate();
        PengobatanTbHiv::updateOrCreate(
            ['id_pengobatan_tb_hiv' => $this->id_pengobatan_tb_hiv],
            [
                'id_pasien' => $this->id_pasien,
                'id_tipe_tb' => $this->id_tipe_tb,
                'id_klasifikasi_tb' => $this->id_klasifikasi_tb,
                'id_paduan_tb' => $this->id_paduan_tb,
                'id_kabupaten_pengobatan' => $this->id_kabupaten_pengobatan,
                'nama_sarana_kesehatan' => $this->nama_sarana_kesehatan,
                'no_reg_tb' => $this->no_reg_tb,
                'tanggal_mulai_terapi' => $this->tanggal_mulai_terapi,
                'tanggal_selesai_terapi' => $this->tanggal_selesai_terapi,
                'lokasi_tb' => $this->lokasi_tb,
                'deleted' => 0
            ]
        );
        session()->flash('success', 'Pengobatan TB Pasien berhasil disimpan.');
        $this->redirect(route('pengobatan-tb-hiv.index'), navigate:true);
    }

    public function render()
    {
        $pasiens = Pasien::where('deleted', 0)->orderBy('nama')->get();
        $tipeTbs = TipeTb::where('deleted', 0)->orderBy('nama')->get();
        $klasifikasiTbs = KlasifikasiTb::where('deleted', 0)->orderBy('nama')->get();
        $paduanTbs = PaduanTb::where('deleted', 0)->orderBy('nama')->get();
        $kabupatens = Kabupaten::where('deleted', 0)->orderBy('nama')->get();
        return view('livewire.pengobatan-tb-hiv.form', [
            'pasiens' => $pasiens,
            'tipeTbs' => $tipeTbs,
            'klasifikasiTbs' => $klasifikasiTbs,
            'paduanTbs' => $paduanTbs,
            'kabupatens' => $kabupatens
        ]);
    }
}
