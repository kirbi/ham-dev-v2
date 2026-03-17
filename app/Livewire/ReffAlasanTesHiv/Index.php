<?php

namespace App\Livewire\ReffAlasanTesHiv;

use App\Models\AlasanTesHiv;
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
        AlasanTesHiv::where('alasan_id_tes_hiv', $id)->update(['deleted' => 1]);
        session()->flash('success', 'Data berhasil dihapus.');
    }

    public function render()
    {
        $items = AlasanTesHiv::where('deleted', 0)
            ->where('nama', 'like', '%' . $this->search . '%')
            ->orderBy('nama', 'ASC')
            ->paginate(10);

        return view('livewire.reff-alasan-tes-hiv.index', compact('items'));
    }
}
