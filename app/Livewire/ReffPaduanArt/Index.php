<?php

namespace App\Livewire\ReffPaduanArt;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\PaduanArt;

class Index extends Component
{
    use WithPagination;

    public $search = '';

    public function render()
    {
        $paduanArts = PaduanArt::where('deleted', 0)
            ->where('nama', 'like', '%'.$this->search.'%')
            ->orderBy('nama', 'ASC')
            ->paginate(10);

        return view('livewire.reff-paduan-art.index', [
            'paduanArts' => $paduanArts
        ]);
    }
}
