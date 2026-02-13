<?php

namespace App\Livewire\InfoTesHivKonseling;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\InfoTesHivKonseling;
use App\Models\InfoTesHiv;

class Index extends Component
{
    use WithPagination;

    public $search = '';

    public function render()
    {
        $query = InfoTesHivKonseling::where('deleted', 0)->with('infoTesHiv');
        if ($this->search) {
            $query->whereHas('infoTesHiv', function($q) {
                $q->where('nama', 'like', '%'.$this->search.'%');
            });
        }
        $items = $query->paginate(10);
        return view('livewire.info-tes-hiv-konseling.index', [
            'items' => $items
        ]);
    }
}
