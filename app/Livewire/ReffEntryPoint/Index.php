<?php

namespace App\Livewire\ReffEntryPoint;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\EntryPoint;

class Index extends Component
{
    use WithPagination;

    public $search = '';

    public function delete($id)
    {
        EntryPoint::where('id', $id)->update(['deleted' => 1]);
        session()->flash('success', 'Entry Point berhasil dihapus.');
    }

    public function render()
    {
        $items = EntryPoint::where('deleted', 0)
            ->where('nama', 'like', '%'.$this->search.'%')
            ->orderBy('nama', 'ASC')
            ->paginate(10);

        return view('livewire.reff-entry-point.index', ['items' => $items]);
    }
}
