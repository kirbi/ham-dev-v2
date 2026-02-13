<?php

namespace App\Livewire\ReffEfekSamping;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\EfekSamping;

class Index extends Component
{
    use WithPagination;

    public $search = '';

    public function render()
    {
        $efekSampings = EfekSamping::where('deleted', 0)
            ->where('nama', 'like', '%'.$this->search.'%')
            ->orderBy('nama', 'ASC')
            ->paginate(10);

        return view('livewire.reff-efek-samping.index', [
            'efekSampings' => $efekSampings
        ]);
    }
}
