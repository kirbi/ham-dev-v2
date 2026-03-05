<?php

namespace App\Livewire\ReffTingkatResikoHiv;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\TingkatResikoHiv;

class Index extends Component
{
    use WithPagination;

    public $search = '';

    public function delete($id)
    {
        TingkatResikoHiv::where('id', $id)->update(['deleted' => 1]);
        session()->flash('success', 'Tingkat Resiko HIV berhasil dihapus.');
    }

    public function render()
    {
        $items = TingkatResikoHiv::where('deleted', 0)
            ->where('nama', 'like', '%'.$this->search.'%')
            ->orderBy('nama', 'ASC')
            ->paginate(10);

        return view('livewire.reff-tingkat-resiko-hiv.index', ['items' => $items]);
    }
}
