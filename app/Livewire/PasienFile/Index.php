<?php

namespace App\Livewire\PasienFile;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\PasienFile;
use App\Models\Pasien;

class Index extends Component
{
    use WithPagination;

    public $search = '';

    public function render()
    {
        $query = PasienFile::where('deleted', 0)->with('pasien');
        if ($this->search) {
            $query->where('nama', 'like', '%'.$this->search.'%');
        }
        $items = $query->paginate(10);
        return view('livewire.pasien-file.index', [
            'items' => $items
        ]);
    }
}
