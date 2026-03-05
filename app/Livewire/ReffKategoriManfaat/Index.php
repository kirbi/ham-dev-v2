<?php

namespace App\Livewire\ReffKategoriManfaat;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\KategoriManfaat;

class Index extends Component
{
    use WithPagination;

    public $search = '';

    public function delete($id)
    {
        KategoriManfaat::where('id', $id)->update(['deleted' => 1]);
        session()->flash('success', 'Kategori Manfaat berhasil dihapus.');
    }

    public function render()
    {
        $items = KategoriManfaat::where('deleted', 0)
            ->where('nama', 'like', '%'.$this->search.'%')
            ->orderBy('nama', 'ASC')
            ->paginate(10);

        return view('livewire.reff-kategori-manfaat.index', ['items' => $items]);
    }
}
