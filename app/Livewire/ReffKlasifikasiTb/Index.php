<?php

namespace App\Livewire\ReffKlasifikasiTb;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\KlasifikasiTb;

class Index extends Component
{
    use WithPagination;

    public $search = '';

    public function delete($id)
    {
        KlasifikasiTb::where('id', $id)->update(['deleted' => 1]);
        session()->flash('success', 'Klasifikasi TB berhasil dihapus.');
    }

    public function render()
    {
        $items = KlasifikasiTb::where('deleted', 0)
            ->where('nama', 'like', '%'.$this->search.'%')
            ->orderBy('nama', 'ASC')
            ->paginate(10);

        return view('livewire.reff-klasifikasi-tb.index', ['items' => $items]);
    }
}
