<?php

namespace App\Livewire\RiwayatTerapiArt;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\RiwayatTerapiArt;

class Index extends Component
{
    use WithPagination;

    public $search = '';

    public function delete($id)
    {
        RiwayatTerapiArt::where('id_riwayat_terapi_art', $id)->update(['deleted' => 1]);
        session()->flash('success', 'Riwayat terapi ART berhasil dihapus.');
    }

    public function render()
    {
        $items = RiwayatTerapiArt::with(['pasien', 'paduanArt', 'jenisTerapi'])
            ->where('deleted', 0)
            ->whereHas('pasien', function ($q) {
                $q->where('nama', 'like', '%'.$this->search.'%');
            })
            ->orderBy('created_at', 'DESC')
            ->paginate(10);

        return view('livewire.riwayat-terapi-art.index', ['items' => $items]);
    }
}
