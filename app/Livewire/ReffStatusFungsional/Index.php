<?php

namespace App\Livewire\ReffStatusFungsional;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\StatusFungsional;

class Index extends Component
{
    use WithPagination;

    public $search = '';

    public function render()
    {
        $statusFungsionals = StatusFungsional::where('deleted', 0)
            ->where('nama', 'like', '%'.$this->search.'%')
            ->orderBy('nama', 'ASC')
            ->paginate(10);

        return view('livewire.reff-status-fungsional.index', [
            'statusFungsionals' => $statusFungsionals
        ]);
    }
}
