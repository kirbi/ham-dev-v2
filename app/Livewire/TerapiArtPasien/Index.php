<?php

namespace App\Livewire\TerapiArtPasien;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\TerapiArtPasien;

class Index extends Component
{
    use WithPagination;

    public $search = '';

    public function delete($id)
    {
        TerapiArtPasien::where('id', $id)->update(['deleted' => 1]);
        session()->flash('success', 'Data terapi ART berhasil dihapus.');
    }

    public function render()
    {
        $items = TerapiArtPasien::with(['pasien', 'paduanArt', 'alasan'])
            ->where('deleted', 0)
            ->whereHas('pasien', function ($q) {
                $q->where('nama', 'like', '%'.$this->search.'%');
            })
            ->orderBy('tanggal_mulai', 'DESC')
            ->paginate(10);

        return view('livewire.terapi-art-pasien.index', ['items' => $items]);
    }
}
