<?php

namespace App\Livewire\ReffJenisTerapi;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\JenisTerapi;

class Index extends Component
{
    use WithPagination;

    public $search = '';

    public function delete($id)
    {
        JenisTerapi::where('id', $id)->update(['deleted' => 1]);
        session()->flash('success', 'Jenis Terapi berhasil dihapus.');
    }

    public function render()
    {
        $items = JenisTerapi::where('deleted', 0)
            ->where('nama', 'like', '%'.$this->search.'%')
            ->orderBy('nama', 'ASC')
            ->paginate(10);

        return view('livewire.reff-jenis-terapi.index', ['items' => $items]);
    }
}
