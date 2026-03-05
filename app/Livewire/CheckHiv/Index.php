<?php

namespace App\Livewire\CheckHiv;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\CheckHiv;
use App\Models\Kabupaten;
use App\Models\Kecamatan;

class Index extends Component
{
    use WithPagination;

    public $search = '';
    public $kabupaten = null;
    public $kecamatan = null;

    public function render()
    {
        $query = CheckHiv::where('deleted', 0)
            ->where('nama_kegiatan', 'like', '%'.$this->search.'%')
            ->orderBy('tanggal_kegiatan', 'DESC');
        if ($this->kabupaten) {
            $query->where('kabupaten_id', $this->kabupaten);
        }
        if ($this->kecamatan) {
            $query->where('kecamatan_id', $this->kecamatan);
        }
        $checkHivs = $query->paginate(10);
        $kabupatens = Kabupaten::where('deleted', 0)->orderBy('nama')->get();
        $kecamatans = $this->kabupaten ? Kecamatan::where('kabupaten_id', $this->kabupaten)->where('deleted', 0)->orderBy('nama')->get() : collect();
        return view('livewire.check-hiv.index', [
            'checkHivs' => $checkHivs,
            'kabupatens' => $kabupatens,
            'kecamatans' => $kecamatans
        ]);
    }
}
