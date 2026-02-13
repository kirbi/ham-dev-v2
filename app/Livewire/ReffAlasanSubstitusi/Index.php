<?php

namespace App\Livewire\ReffAlasanSubstitusi;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\AlasanSubstitusi;

class Index extends Component
{
    use WithPagination;

    public $search = '';

    public function render()
    {
        $alasanSubstitusis = AlasanSubstitusi::where('deleted', 0)
            ->where('nama', 'like', '%'.$this->search.'%')
            ->orderBy('nama', 'ASC')
            ->paginate(10);

        return view('livewire.reff-alasan-substitusi.index', [
            'alasanSubstitusis' => $alasanSubstitusis
        ]);
    }
}
