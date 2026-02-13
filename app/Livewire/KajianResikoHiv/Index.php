<?php

namespace App\Livewire\KajianResikoHiv;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\KajianResikoHiv;
use App\Models\TingkatResikoHiv;

class Index extends Component
{
    use WithPagination;

    public $search = '';

    public function render()
    {
        $query = KajianResikoHiv::where('deleted', 0)->with('tingkatResikoHiv');
        if ($this->search) {
            $query->whereHas('tingkatResikoHiv', function($q) {
                $q->where('nama', 'like', '%'.$this->search.'%');
            });
        }
        $items = $query->paginate(10);
        return view('livewire.kajian-resiko-hiv.index', [
            'items' => $items
        ]);
    }
}
