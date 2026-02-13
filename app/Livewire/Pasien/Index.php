<?php

namespace App\Livewire\Pasien;

use App\Models\{
    Konselor,
    Pasien,
    Pekerjaan,
    Pendidikan,
    Provinsi,
    StatusPernikahan
};
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search = '';
    public $statusFilter = '';
    public $perPage = 10;

    protected $queryString = [
        'search' => ['except' => ''],
        'statusFilter' => ['except' => ''],
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingStatusFilter()
    {
        $this->resetPage();
    }

    /**
     * Check if user has admin role
     */
    public function isAdmin()
    {
        return auth()->user()->type === 'admin';
    }

    /**
     * Delete patient (admin only)
     */
    public function delete($id)
    {
        if (!$this->isAdmin()) {
            $this->dispatch('alert', type: 'error', message: 'Unauthorized: Only admin can delete patients.');
            return;
        }

        try {
            $pasien = Pasien::findOrFail($id);
            $pasien->deleted = 1;
            $pasien->save();

            $this->dispatch('alert', type: 'success', message: 'Pasien berhasil dihapus.');
        } catch (\Exception $e) {
            $this->dispatch('alert', type: 'error', message: 'Gagal menghapus pasien: ' . $e->getMessage());
        }
    }

    public function render()
    {
        $query = Pasien::where('deleted', 0)
            ->orderBy('nama', 'ASC');

        // Search filter
        if ($this->search) {
            $query->where(function ($q) {
                $q->where('nama', 'like', '%' . $this->search . '%')
                    ->orWhere('no_rekam_medis', 'like', '%' . $this->search . '%')
                    ->orWhere('nik', 'like', '%' . $this->search . '%');
            });
        }

        // Status filter
        if ($this->statusFilter) {
            $query->where('status', $this->statusFilter);
        }

        $pasiens = $query->paginate($this->perPage);

        return view('livewire.pasien.index', [
            'pasiens' => $pasiens,
            'isAdmin' => $this->isAdmin(),
        ]);
    }
}
