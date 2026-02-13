<?php

namespace App\Livewire\ReffInfeksiOportunistik;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\InfeksiOportunistik;

class Index extends Component
{
    use WithPagination;

    public $search = '';

    public function render()
    {
        $infeksiOportunistiks = InfeksiOportunistik::where('deleted', 0)
            ->where('nama', 'like', '%'.$this->search.'%')
            ->orderBy('nama', 'ASC')
            ->paginate(10);

        return view('livewire.reff-infeksi-oportunistik.index', [
            'infeksiOportunistiks' => $infeksiOportunistiks
        ]);
    }
}
