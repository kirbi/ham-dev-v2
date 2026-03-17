<?php

namespace App\Livewire\ReffStatusHiv;

use App\Models\StatusHiv;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function delete($id)
    {
        StatusHiv::where('id', $id)->update(['deleted' => 1]);
        session()->flash('success', 'Data berhasil dihapus.');
    }

    public function render()
    {
        $items = StatusHiv::where('deleted', 0)
            ->where('nama', 'like', '%' . $this->search . '%')
            ->orderBy('nama', 'ASC')
            ->paginate(10);

        return view('livewire.reff-status-hiv.index', compact('items'));
    }
}
