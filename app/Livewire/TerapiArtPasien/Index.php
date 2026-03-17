<?php

namespace App\Livewire\TerapiArtPasien;

use App\Models\TerapiArtPasien as TerapiArtPasienModel;
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
        TerapiArtPasienModel::where('id', $id)->update(['deleted' => 1]);
        session()->flash('success', 'Data berhasil dihapus.');
    }

    public function render()
    {
        $query = TerapiArtPasienModel::with(['pasien', 'paduanArt', 'alasan'])
            ->where('deleted', 0);

        if ($this->search) {
            $query->whereHas('pasien', function ($q) {
                $q->where('nama', 'like', '%' . $this->search . '%')
                  ->orWhere('no_rekam_medis', 'like', '%' . $this->search . '%');
            });
        }

        $items = $query->orderBy('tanggal_mulai', 'DESC')->paginate(10);

        return view('livewire.terapi-art-pasien.index', compact('items'));
    }
}
