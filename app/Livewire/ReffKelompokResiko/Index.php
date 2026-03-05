<?php

namespace App\Livewire\ReffKelompokResiko;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\KelompokResiko;

class Index extends Component
{
    use WithPagination;

    public $search = '';

    public function delete($id)
    {
        KelompokResiko::where('id', $id)->update(['deleted' => 1]);
        session()->flash('success', 'Kelompok Resiko berhasil dihapus.');
    }

    public function render()
    {
        $items = KelompokResiko::where('deleted', 0)
            ->where('nama', 'like', '%'.$this->search.'%')
            ->orderBy('nama', 'ASC')
            ->paginate(10);

        return view('livewire.reff-kelompok-resiko.index', ['items' => $items]);
    }
}
