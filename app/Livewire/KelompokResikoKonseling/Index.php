<?php

namespace App\Livewire\KelompokResikoKonseling;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\KelompokResikoKonseling;
use App\Models\KelompokResiko;

class Index extends Component
{
    use WithPagination;

    public $search = '';

    public function render()
    {
        $query = KelompokResikoKonseling::where('deleted', 0)->with('kelompokResiko');
        if ($this->search) {
            $query->whereHas('kelompokResiko', function($q) {
                $q->where('nama', 'like', '%'.$this->search.'%');
            });
        }
        $items = $query->paginate(10);
        return view('livewire.kelompok-resiko-konseling.index', [
            'items' => $items
        ]);
    }
}
