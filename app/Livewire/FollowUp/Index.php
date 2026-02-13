<?php

namespace App\Livewire\FollowUp;

use App\Models\RiwayatPerawatanPasien;
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

    public function render()
    {
        $query = RiwayatPerawatanPasien::where('deleted', 0)
            ->orderBy('tanggal_pengobatan', 'DESC');

        if ($this->search) {
            $query->whereHas('pasien', function ($q) {
                $q->where('nama', 'like', '%' . $this->search . '%')
                  ->orWhere('no_rekam_medis', 'like', '%' . $this->search . '%');
            });
        }

        $followups = $query->paginate($this->perPage);

        return view('livewire.followup.index', [
            'followups' => $followups,
        ]);
    }
}
