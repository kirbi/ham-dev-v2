<?php

namespace App\Livewire\RiwayatTerapiArt;

use App\Models\Pasien;
use App\Models\RiwayatTerapiArt as RiwayatTerapiArtModel;
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
        RiwayatTerapiArtModel::where('id', $id)->update(['deleted' => 1]);
        session()->flash('success', 'Data berhasil dihapus.');
    }

    public function render()
    {
        $query = RiwayatTerapiArtModel::with(['pasien', 'paduanArt', 'jenisTerapi', 'tempatTerapi'])
            ->where('deleted', 0)
            ->where('pernah_menerima', 'Ya');

        if ($this->search) {
            $query->whereHas('pasien', function ($q) {
                $q->where('nama', 'like', '%' . $this->search . '%')
                  ->orWhere('no_rekam_medis', 'like', '%' . $this->search . '%');
            });
        }

        $items = $query->orderBy('id', 'DESC')->paginate(10);

        return view('livewire.riwayat-terapi-art.index', compact('items'));
    }
}
