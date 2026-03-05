<?php

namespace App\Livewire\ReffPendidikan;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Pendidikan;

class Index extends Component
{
    use WithPagination;

    public $search = '';

    public function delete($id)
    {
        Pendidikan::where('id_pendidikan', $id)->update(['deleted' => 1]);
        session()->flash('success', 'Pendidikan berhasil dihapus.');
    }

    public function render()
    {
        $items = Pendidikan::where('deleted', 0)
            ->where('nama', 'like', '%'.$this->search.'%')
            ->orderBy('nama', 'ASC')
            ->paginate(10);

        return view('livewire.reff-pendidikan.index', ['items' => $items]);
    }
}
