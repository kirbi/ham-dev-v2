<?php

namespace App\Livewire\ReffStatusTb;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\StatusTb;

class Index extends Component
{
    use WithPagination;

    public $search = '';

    public function render()
    {
        $statusTbs = StatusTb::where('deleted', 0)
            ->where('nama', 'like', '%'.$this->search.'%')
            ->orderBy('nama', 'ASC')
            ->paginate(10);

        return view('livewire.reff-status-tb.index', [
            'statusTbs' => $statusTbs
        ]);
    }
}
