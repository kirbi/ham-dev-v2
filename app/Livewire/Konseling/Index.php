<?php

namespace App\Livewire\Konseling;

use App\Models\KonselingHiv;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 10;

    protected $queryString = [
        'search' => ['except' => ''],
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function delete($id)
    {
        KonselingHiv::where('id', $id)->update(['deleted' => 1]);
        session()->flash('success', 'Data konseling berhasil dihapus.');
    }

    public function render()
    {
        $query = KonselingHiv::where('deleted', 0)
            ->orderBy('tanggal_konseling', 'DESC');

        if ($this->search) {
            $query->whereHas('pasien', function ($q) {
                $q->where('nama', 'like', '%' . $this->search . '%')
                  ->orWhere('no_rekam_medis', 'like', '%' . $this->search . '%');
            });
        }

        $konselings = $query->paginate($this->perPage);

        return view('livewire.konseling.index', [
            'konselings' => $konselings,
        ]);
    }
}
