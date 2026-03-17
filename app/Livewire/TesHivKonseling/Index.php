<?php

namespace App\Livewire\TesHivKonseling;

use App\Models\KonselingHiv;
use App\Models\TesHivKonseling as TesHivKonselingModel;
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
        TesHivKonselingModel::where('id', $id)->update(['deleted' => 1]);
        session()->flash('success', 'Data berhasil dihapus.');
    }

    public function render()
    {
        $query = TesHivKonselingModel::with('konseling.pasien')
            ->where('deleted', 0);

        if ($this->search) {
            $query->whereHas('konseling.pasien', function ($q) {
                $q->where('nama', 'like', '%' . $this->search . '%')
                  ->orWhere('no_rekam_medis', 'like', '%' . $this->search . '%');
            });
        }

        $items = $query->orderBy('tanggal_tes', 'DESC')->paginate(10);

        return view('livewire.tes-hiv-konseling.index', compact('items'));
    }
}
