<?php

namespace App\Livewire\ReffPaduanTb;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\PaduanTb;

class Index extends Component
{
    use WithPagination;

    public $search = '';

    public function delete($id)
    {
        PaduanTb::where('id', $id)->update(['deleted' => 1]);
        session()->flash('success', 'Paduan TB berhasil dihapus.');
    }

    public function render()
    {
        $items = PaduanTb::where('deleted', 0)
            ->where('nama', 'like', '%'.$this->search.'%')
            ->orderBy('nama', 'ASC')
            ->paginate(10);

        return view('livewire.reff-paduan-tb.index', ['items' => $items]);
    }
}
