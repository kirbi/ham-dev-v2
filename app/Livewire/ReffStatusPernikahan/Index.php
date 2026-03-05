<?php

namespace App\Livewire\ReffStatusPernikahan;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\StatusPernikahan;

class Index extends Component
{
    use WithPagination;

    public $search = '';

    public function delete($id)
    {
        StatusPernikahan::where('id', $id)->update(['deleted' => 1]);
        session()->flash('success', 'Status Pernikahan berhasil dihapus.');
    }

    public function render()
    {
        $items = StatusPernikahan::where('deleted', 0)
            ->where('nama', 'like', '%'.$this->search.'%')
            ->orderBy('nama', 'ASC')
            ->paginate(10);

        return view('livewire.reff-status-pernikahan.index', ['items' => $items]);
    }
}
