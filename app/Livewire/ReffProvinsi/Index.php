<?php

namespace App\Livewire\ReffProvinsi;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Provinsi;

class Index extends Component
{
    use WithPagination;

    public $search = '';

    public function delete($id)
    {
        Provinsi::where('id', $id)->update(['deleted' => 1]);
        session()->flash('success', 'Provinsi berhasil dihapus.');
    }

    public function render()
    {
        $items = Provinsi::where('deleted', 0)
            ->where('nama', 'like', '%'.$this->search.'%')
            ->orderBy('nama', 'ASC')
            ->paginate(10);

        return view('livewire.reff-provinsi.index', ['items' => $items]);
    }
}
