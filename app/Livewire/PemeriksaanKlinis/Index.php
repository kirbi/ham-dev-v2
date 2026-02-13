<?php

namespace App\Livewire\PemeriksaanKlinis;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\PemeriksaanKlinis;
use App\Models\Pasien;
use App\Models\StatusFungsional;
use App\Models\KategoriPemeriksaan;

class Index extends Component
{
    use WithPagination;

    public $search = '';

    public function render()
    {
        $query = PemeriksaanKlinis::where('deleted', 0)->with(['pasien', 'statusFungsional', 'kategoriPemeriksaan']);
        if ($this->search) {
            $query->whereHas('pasien', function($q) {
                $q->where('nama', 'like', '%'.$this->search.'%');
            });
        }
        $items = $query->paginate(10);
        return view('livewire.pemeriksaan-klinis.index', [
            'items' => $items
        ]);
    }
}
