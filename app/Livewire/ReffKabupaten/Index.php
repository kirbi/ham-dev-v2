<?php

namespace App\Livewire\ReffKabupaten;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Kabupaten;
use App\Models\Provinsi;

class Index extends Component
{
    use WithPagination;

    public $search = '';
    public $filterProvinsi = '';

    public function delete($id)
    {
        Kabupaten::where('id', $id)->update(['deleted' => 1]);
        session()->flash('success', 'Kabupaten berhasil dihapus.');
    }

    public function render()
    {
        $query = Kabupaten::where('deleted', 0)
            ->where('nama', 'like', '%'.$this->search.'%')
            ->orderBy('nama', 'ASC');

        if ($this->filterProvinsi) {
            $query->where('provinsi_id', $this->filterProvinsi);
        }

        $items = $query->paginate(10);
        $provinsis = Provinsi::where('deleted', 0)->orderBy('nama')->get();

        return view('livewire.reff-kabupaten.index', [
            'items' => $items,
            'provinsis' => $provinsis,
        ]);
    }
}
