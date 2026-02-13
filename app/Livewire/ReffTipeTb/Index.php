<?php

namespace App\Livewire\ReffTipeTb;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\TipeTb;

class Index extends Component
{
    use WithPagination;

    public $search = '';

    public function render()
    {
        $tipeTbs = TipeTb::where('deleted', 0)
            ->where('nama', 'like', '%'.$this->search.'%')
            ->orderBy('nama', 'ASC')
            ->paginate(10);

        return view('livewire.reff-tipe-tb.index', [
            'tipeTbs' => $tipeTbs
        ]);
    }
}
