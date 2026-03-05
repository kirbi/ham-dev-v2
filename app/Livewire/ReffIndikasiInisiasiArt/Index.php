<?php

namespace App\Livewire\ReffIndikasiInisiasiArt;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\IndikasiInisiasiArt;

class Index extends Component
{
    use WithPagination;

    public $search = '';

    public function delete($id)
    {
        IndikasiInisiasiArt::where('id_iiart', $id)->update(['deleted' => 1]);
        session()->flash('success', 'Indikasi Inisiasi ART berhasil dihapus.');
    }

    public function render()
    {
        $items = IndikasiInisiasiArt::where('deleted', 0)
            ->where('nama', 'like', '%'.$this->search.'%')
            ->orderBy('nama', 'ASC')
            ->paginate(10);

        return view('livewire.reff-indikasi-inisiasi-art.index', ['items' => $items]);
    }
}
