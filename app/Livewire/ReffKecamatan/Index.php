<?php

namespace App\Livewire\ReffKecamatan;

use App\Models\Kabupaten;
use App\Models\Kecamatan;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function delete($id)
    {
        Kecamatan::where('id', $id)->update(['deleted' => 1]);
        session()->flash('success', 'Data berhasil dihapus.');
    }

    public function render()
    {
        $items = Kecamatan::with('kabupaten')
            ->where('deleted', 0)
            ->where('nama', 'like', '%' . $this->search . '%')
            ->orderBy('nama', 'ASC')
            ->paginate(10);

        return view('livewire.reff-kecamatan.index', compact('items'));
    }
}
