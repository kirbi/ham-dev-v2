<?php

namespace App\Livewire\ReffKategoriPemeriksaan;

use App\Models\KategoriPemeriksaan;
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
        KategoriPemeriksaan::where('id', $id)->update(['deleted' => 1]);
        session()->flash('success', 'Data berhasil dihapus.');
    }

    public function render()
    {
        $items = KategoriPemeriksaan::where('deleted', 0)
            ->where('nama', 'like', '%' . $this->search . '%')
            ->orderBy('urutan', 'ASC')
            ->paginate(10);

        return view('livewire.reff-kategori-pemeriksaan.index', compact('items'));
    }
}
