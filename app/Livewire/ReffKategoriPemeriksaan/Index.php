<?php

namespace App\Livewire\ReffKategoriPemeriksaan;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\KategoriPemeriksaan;

class Index extends Component
{
    use WithPagination;

    public $search = '';

    public function delete($id)
    {
        KategoriPemeriksaan::where('id', $id)->update(['deleted' => 1]);
        session()->flash('success', 'Kategori Pemeriksaan berhasil dihapus.');
    }

    public function render()
    {
        $items = KategoriPemeriksaan::where('deleted', 0)
            ->where('nama', 'like', '%'.$this->search.'%')
            ->orderBy('nama', 'ASC')
            ->paginate(10);

        return view('livewire.reff-kategori-pemeriksaan.index', ['items' => $items]);
    }
}
