<?php

namespace App\Livewire\ReffAlasanTesHiv;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\AlasanTesHiv;

class Index extends Component
{
    use WithPagination;

    public $search = '';

    public function delete($id)
    {
        AlasanTesHiv::where('id', $id)->update(['deleted' => 1]);
        session()->flash('success', 'Alasan Tes HIV berhasil dihapus.');
    }

    public function render()
    {
        $items = AlasanTesHiv::where('deleted', 0)
            ->where('nama', 'like', '%'.$this->search.'%')
            ->orderBy('nama', 'ASC')
            ->paginate(10);

        return view('livewire.reff-alasan-tes-hiv.index', ['items' => $items]);
    }
}
