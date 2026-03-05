<?php

namespace App\Livewire\ReffFaktorResiko;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\FaktorResiko;

class Index extends Component
{
    use WithPagination;

    public $search = '';

    public function delete($id)
    {
        FaktorResiko::where('id', $id)->update(['deleted' => 1]);
        session()->flash('success', 'Faktor Resiko berhasil dihapus.');
    }

    public function render()
    {
        $items = FaktorResiko::where('deleted', 0)
            ->where('nama', 'like', '%'.$this->search.'%')
            ->orderBy('nama', 'ASC')
            ->paginate(10);

        return view('livewire.reff-faktor-resiko.index', ['items' => $items]);
    }
}
