<?php

namespace App\Livewire\ReffKecamatan;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Kecamatan;
use App\Models\Kabupaten;

class Index extends Component
{
    use WithPagination;

    public $search = '';
    public $filterKabupaten = '';

    public function delete($id)
    {
        Kecamatan::where('id_kecamatan', $id)->update(['deleted' => 1]);
        session()->flash('success', 'Kecamatan berhasil dihapus.');
    }

    public function render()
    {
        $query = Kecamatan::where('deleted', 0)
            ->where('nama', 'like', '%'.$this->search.'%')
            ->orderBy('nama', 'ASC');

        if ($this->filterKabupaten) {
            $query->where('id_kabupaten', $this->filterKabupaten);
        }

        $items = $query->paginate(10);
        $kabupatens = Kabupaten::where('deleted', 0)->orderBy('nama')->get();

        return view('livewire.reff-kecamatan.index', [
            'items' => $items,
            'kabupatens' => $kabupatens,
        ]);
    }
}
