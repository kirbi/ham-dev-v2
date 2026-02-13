<?php

namespace App\Livewire\RiwayatMitraSeksual;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\RiwayatMitraSeksual;
use App\Models\Pasien;
use App\Models\Hubungan;
use App\Models\StatusHiv;

class Index extends Component
{
    use WithPagination;

    public $search = '';

    public function render()
    {
        $query = RiwayatMitraSeksual::where('deleted', 0)->with(['pasien', 'hubungan', 'statusHiv']);
        if ($this->search) {
            $query->where('nama', 'like', '%'.$this->search.'%');
        }
        $items = $query->paginate(10);
        return view('livewire.riwayat-mitra-seksual.index', [
            'items' => $items
        ]);
    }
}
