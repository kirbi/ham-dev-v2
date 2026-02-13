<?php

namespace App\Livewire\RekapTesHivKonseling;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\RekapTesHivKonseling;

class Index extends Component
{
    use WithPagination;

    public $search = '';

    public function render()
    {
        $query = RekapTesHivKonseling::where('deleted', 0);
        if ($this->search) {
            $query->where('tempat_tes', 'like', '%'.$this->search.'%');
        }
        $items = $query->paginate(10);
        return view('livewire.rekap-tes-hiv-konseling.index', [
            'items' => $items
        ]);
    }
}
