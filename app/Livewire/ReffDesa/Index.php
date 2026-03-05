<?php

namespace App\Livewire\ReffDesa;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Desa;
use App\Models\Kecamatan;

class Index extends Component
{
    use WithPagination;

    public $search = '';
    public $filterKecamatan = '';

    public function delete($id)
    {
        Desa::where('id_desa', $id)->update(['deleted' => 1]);
        session()->flash('success', 'Desa berhasil dihapus.');
    }

    public function render()
    {
        $query = Desa::where('deleted', 0)
            ->where('nama', 'like', '%'.$this->search.'%')
            ->orderBy('nama', 'ASC');

        if ($this->filterKecamatan) {
            $query->where('id_kecamatan', $this->filterKecamatan);
        }

        $items = $query->paginate(10);
        $kecamatans = Kecamatan::where('deleted', 0)->orderBy('nama')->get();

        return view('livewire.reff-desa.index', [
            'items' => $items,
            'kecamatans' => $kecamatans,
        ]);
    }
}
