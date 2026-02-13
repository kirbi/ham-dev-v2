<?php

namespace App\Livewire\Konselor;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Konselor;
use App\Models\Pendidikan;
use App\Models\StatusPernikahan;

class Index extends Component
{
    use WithPagination;

    public $search = '';

    public function render()
    {
        $query = Konselor::where('deleted', 0)->with(['pendidikan', 'statusPernikahan']);
        if ($this->search) {
            $query->where('nama', 'like', '%'.$this->search.'%');
        }
        $items = $query->paginate(10);
        $pendidikan = Pendidikan::where('deleted', 0)->orderBy('nama')->get();
        $statusPernikahan = StatusPernikahan::where('deleted', 0)->orderBy('nama')->get();
        return view('livewire.konselor.index', [
            'items' => $items,
            'pendidikan' => $pendidikan,
            'statusPernikahan' => $statusPernikahan
        ]);
    }
}
