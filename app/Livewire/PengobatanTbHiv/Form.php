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
    public $id;
    public $pasien_id;
    public $tipe_tb_id;
    public $klasifikasi_tb_id;
    public $paduan_tb_id;
    public $kabupaten_id_pengobatan;
    public $nama_sarana_kesehatan;
    public $no_reg_tb;
    public $tanggal_mulai_terapi;
    public $tanggal_selesai_terapi;
    public $lokasi_tb;

    protected $rules = [
        'pasien_id' => 'required|integer',
        'tipe_tb_id' => 'required|integer',
        'klasifikasi_tb_id' => 'required|integer',
        'paduan_tb_id' => 'required|integer',
        'kabupaten_id_pengobatan' => 'required|integer',
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
                $this->id = $data->id;
                $this->pasien_id = $data->pasien_id;
                $this->tipe_tb_id = $data->tipe_tb_id;
                $this->klasifikasi_tb_id = $data->klasifikasi_tb_id;
                $this->paduan_tb_id = $data->paduan_tb_id;
                $this->kabupaten_id_pengobatan = $data->kabupaten_id_pengobatan;
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
            ['id' => $this->id],
            [
                'pasien_id' => $this->pasien_id,
                'tipe_tb_id' => $this->tipe_tb_id,
                'klasifikasi_tb_id' => $this->klasifikasi_tb_id,
                'paduan_tb_id' => $this->paduan_tb_id,
                'kabupaten_id_pengobatan' => $this->kabupaten_id_pengobatan,
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
