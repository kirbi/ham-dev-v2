<?php

namespace App\Livewire\ReffInfoTesHiv;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\InfoTesHiv;

class Index extends Component
{
    use WithPagination;

    public $search = '';

    public function delete($id)
    {
        InfoTesHiv::where('id', $id)->update(['deleted' => 1]);
        session()->flash('success', 'Info Tes HIV berhasil dihapus.');
    }

    public function render()
    {
        $items = InfoTesHiv::where('deleted', 0)
            ->where('nama', 'like', '%'.$this->search.'%')
            ->orderBy('nama', 'ASC')
            ->paginate(10);

        return view('livewire.reff-info-tes-hiv.index', ['items' => $items]);
    }
}
