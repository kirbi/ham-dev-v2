<?php

namespace App\Livewire\ReffTempatTerapi;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\TempatTerapi;

class Index extends Component
{
    use WithPagination;

    public $search = '';

    public function delete($id)
    {
        TempatTerapi::where('id', $id)->update(['deleted' => 1]);
        session()->flash('success', 'Tempat Terapi berhasil dihapus.');
    }

    public function render()
    {
        $items = TempatTerapi::where('deleted', 0)
            ->where('nama', 'like', '%'.$this->search.'%')
            ->orderBy('nama', 'ASC')
            ->paginate(10);

        return view('livewire.reff-tempat-terapi.index', ['items' => $items]);
    }
}
