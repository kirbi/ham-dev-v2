<?php

namespace App\Livewire\ReffAdherenceArt;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\AdherenceArt;

class Index extends Component
{
    use WithPagination;

    public $search = '';

    public function render()
    {
        $adherenceArts = AdherenceArt::where('deleted', 0)
            ->where('nama', 'like', '%'.$this->search.'%')
            ->orderBy('nama', 'ASC')
            ->paginate(10);

        return view('livewire.reff-adherence-art.index', [
            'adherenceArts' => $adherenceArts
        ]);
    }
}
