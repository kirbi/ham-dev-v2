<?php

namespace App\Livewire\ReffPekerjaan;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Pekerjaan;

class Index extends Component
{
    use WithPagination;

    public $search = '';

    public function delete($id)
    {
        Pekerjaan::where('id_pekerjaan', $id)->update(['deleted' => 1]);
        session()->flash('success', 'Pekerjaan berhasil dihapus.');
    }

    public function render()
    {
        $items = Pekerjaan::where('deleted', 0)
            ->where('nama', 'like', '%'.$this->search.'%')
            ->orderBy('nama', 'ASC')
            ->paginate(10);

        return view('livewire.reff-pekerjaan.index', ['items' => $items]);
    }
}
