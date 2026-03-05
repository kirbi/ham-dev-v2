<?php

namespace App\Livewire\TesHivKonseling;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\TesHivKonseling;
use App\Models\KonselingHiv;

class Index extends Component
{
    use WithPagination;

    public $search = '';

    public function delete($id)
    {
        TesHivKonseling::where('id_tes_hiv_konseling', $id)->update(['deleted' => 1]);
        session()->flash('success', 'Data tes HIV berhasil dihapus.');
    }

    public function render()
    {
        $items = TesHivKonseling::where('deleted', 0)
            ->where(function ($q) {
                $q->where('jenis_tes', 'like', '%'.$this->search.'%')
                  ->orWhere('hasil', 'like', '%'.$this->search.'%');
            })
            ->orderBy('tanggal_tes', 'DESC')
            ->paginate(10);

        return view('livewire.tes-hiv-konseling.index', ['items' => $items]);
    }
}
