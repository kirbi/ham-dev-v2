<?php

namespace App\Livewire\PengobatanTbHiv;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\PengobatanTbHiv;
use App\Models\Pasien;
use App\Models\TipeTb;
use App\Models\KlasifikasiTb;
use App\Models\PaduanTb;
use App\Models\Kabupaten;

class Index extends Component
{
    use WithPagination;

    public $search = '';

    public function render()
    {
        $query = PengobatanTbHiv::where('deleted', 0)->with(['pasien', 'tipeTb', 'klasifikasiTb', 'paduanTb', 'kabupaten']);
        if ($this->search) {
            $query->whereHas('pasien', function($q) {
                $q->where('nama', 'like', '%'.$this->search.'%');
            });
        }
        $items = $query->paginate(10);
        return view('livewire.pengobatan-tb-hiv.index', [
            'items' => $items
        ]);
    }
}
