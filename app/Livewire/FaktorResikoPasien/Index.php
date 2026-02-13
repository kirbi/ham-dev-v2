<?php

namespace App\Livewire\FaktorResikoPasien;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\FaktorResikoPasien;
use App\Models\FaktorResiko;
use App\Models\Pasien;

class Index extends Component
{
    use WithPagination;

    public $search = '';

    public function render()
    {
        $query = FaktorResikoPasien::where('deleted', 0)
            ->with(['faktorResiko', 'pasien']);
        if ($this->search) {
            $query->whereHas('pasien', function($q) {
                $q->where('nama', 'like', '%'.$this->search.'%');
            });
        }
        $items = $query->paginate(10);
        return view('livewire.faktor-resiko-pasien.index', [
            'items' => $items
        ]);
    }
}
