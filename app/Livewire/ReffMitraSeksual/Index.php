<?php

namespace App\Livewire\ReffMitraSeksual;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\MitraSeksual;

class Index extends Component
{
    use WithPagination;

    public $search = '';

    public function delete($id)
    {
        MitraSeksual::where('id_mitra_seksual', $id)->update(['deleted' => 1]);
        session()->flash('success', 'Mitra Seksual berhasil dihapus.');
    }

    public function render()
    {
        $items = MitraSeksual::where('deleted', 0)
            ->where('nama', 'like', '%'.$this->search.'%')
            ->orderBy('nama', 'ASC')
            ->paginate(10);

        return view('livewire.reff-mitra-seksual.index', ['items' => $items]);
    }
}
