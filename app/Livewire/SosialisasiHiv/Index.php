<?php

namespace App\Livewire\SosialisasiHiv;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\SosialisasiHiv;
use App\Models\Kabupaten;
use App\Models\Kecamatan;

class Index extends Component
{
    use WithPagination;

    public $search = '';
    public $kabupaten = null;
    public $kecamatan = null;

    public function delete($id)
    {
        SosialisasiHiv::where('id_sosialisasi_hiv', $id)->update(['deleted' => 1]);
        session()->flash('success', 'Data sosialisasi berhasil dihapus.');
    }

    public function render()
    {
        $query = SosialisasiHiv::where('deleted', 0)
            ->where('nama_kegiatan', 'like', '%'.$this->search.'%')
            ->orderBy('tanggal_kegiatan', 'DESC');

        if ($this->kabupaten) {
            $query->where('id_kabupaten', $this->kabupaten);
        }
        if ($this->kecamatan) {
            $query->where('id_kecamatan', $this->kecamatan);
        }

        $items = $query->paginate(10);
        $kabupatens = Kabupaten::where('deleted', 0)->orderBy('nama')->get();
        $kecamatans = $this->kabupaten
            ? Kecamatan::where('id_kabupaten', $this->kabupaten)->where('deleted', 0)->orderBy('nama')->get()
            : collect();

        return view('livewire.sosialisasi-hiv.index', compact('items', 'kabupatens', 'kecamatans'));
    }
}
