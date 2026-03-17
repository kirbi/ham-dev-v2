<?php

namespace App\Livewire\ReffInfoTesHiv;

use App\Models\InfoTesHiv;
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
        InfoTesHiv::where('id', $id)->update(['deleted' => 1]);
        session()->flash('success', 'Data berhasil dihapus.');
    }

    public function render()
    {
        $items = InfoTesHiv::where('deleted', 0)
            ->where('nama', 'like', '%' . $this->search . '%')
            ->orderBy('nama', 'ASC')
            ->paginate(10);

        return view('livewire.reff-info-tes-hiv.index', compact('items'));
    }
}
