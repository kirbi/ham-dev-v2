<?php

namespace App\Livewire\ReffIndikasiInisiasiArt;

use App\Models\IndikasiInisiasiArt;
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
        IndikasiInisiasiArt::where('id', $id)->update(['deleted' => 1]);
        session()->flash('success', 'Data berhasil dihapus.');
    }

    public function render()
    {
        $items = IndikasiInisiasiArt::where('deleted', 0)
            ->where('nama', 'like', '%' . $this->search . '%')
            ->orderBy('nama', 'ASC')
            ->paginate(10);

        return view('livewire.reff-indikasi-inisiasi-art.index', compact('items'));
    }
}
