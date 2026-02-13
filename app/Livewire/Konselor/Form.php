<?php

namespace App\Livewire\Konselor;

use Livewire\Component;
use App\Models\Konselor;
use App\Models\Pendidikan;
use App\Models\StatusPernikahan;

class Form extends Component
{
    public $id_konselor;
    public $nama;
    public $email;
    public $alamat;
    public $no_hp;
    public $nik;
    public $nip;
    public $jenis_kelamin;
    public $tempat_lahir;
    public $tanggal_lahir;
    public $id_pendidikan;
    public $tanggal_sertifikasi;
    public $status_pegawai;
    public $id_status_pernikahan;

    protected $rules = [
        'nama' => 'required|max:250',
        'email' => 'required|max:100',
        'alamat' => 'required|max:250',
        'no_hp' => 'required|max:25',
        'nik' => 'required|max:30',
        'nip' => 'required|max:30',
        'jenis_kelamin' => 'required',
        'tempat_lahir' => 'required|max:250',
        'tanggal_lahir' => 'required|date',
        'id_pendidikan' => 'required|integer',
        'tanggal_sertifikasi' => 'required|date',
        'status_pegawai' => 'required',
        'id_status_pernikahan' => 'required|integer',
    ];

    public function mount($id = null)
    {
        if ($id) {
            $data = Konselor::find($id);
            if ($data) {
                $this->id_konselor = $data->id_konselor;
                $this->nama = $data->nama;
                $this->email = $data->email;
                $this->alamat = $data->alamat;
                $this->no_hp = $data->no_hp;
                $this->nik = $data->nik;
                $this->nip = $data->nip;
                $this->jenis_kelamin = $data->jenis_kelamin;
                $this->tempat_lahir = $data->tempat_lahir;
                $this->tanggal_lahir = $data->tanggal_lahir;
                $this->id_pendidikan = $data->id_pendidikan;
                $this->tanggal_sertifikasi = $data->tanggal_sertifikasi;
                $this->status_pegawai = $data->status_pegawai;
                $this->id_status_pernikahan = $data->id_status_pernikahan;
            }
        }
    }

    public function save()
    {
        $this->validate();
        Konselor::updateOrCreate(
            ['id_konselor' => $this->id_konselor],
            [
                'nama' => $this->nama,
                'email' => $this->email,
                'alamat' => $this->alamat,
                'no_hp' => $this->no_hp,
                'nik' => $this->nik,
                'nip' => $this->nip,
                'jenis_kelamin' => $this->jenis_kelamin,
                'tempat_lahir' => $this->tempat_lahir,
                'tanggal_lahir' => $this->tanggal_lahir,
                'id_pendidikan' => $this->id_pendidikan,
                'tanggal_sertifikasi' => $this->tanggal_sertifikasi,
                'status_pegawai' => $this->status_pegawai,
                'id_status_pernikahan' => $this->id_status_pernikahan,
                'deleted' => 0
            ]
        );
        session()->flash('success', 'Konselor berhasil disimpan.');
        $this->redirect(route('konselor.index'), navigate:true);
    }

    public function render()
    {
        $pendidikan = Pendidikan::where('deleted', 0)->orderBy('nama')->get();
        $statusPernikahan = StatusPernikahan::where('deleted', 0)->orderBy('nama')->get();
        return view('livewire.konselor.form', [
            'pendidikan' => $pendidikan,
            'statusPernikahan' => $statusPernikahan
        ]);
    }
}
