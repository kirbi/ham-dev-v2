<?php

namespace App\Livewire\ReffJenisKelamin;

use App\Models\JenisKelamin;
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
        JenisKelamin::where('id', $id)->update(['deleted' => 1]);
        session()->flash('success', 'Data berhasil dihapus.');
    }

    public function render()
    {
        $items = JenisKelamin::where('deleted', 0)
            ->where('inisial', 'like', '%' . $this->search . '%')
            ->orderBy('inisial', 'ASC')
            ->paginate(10);

        return view('livewire.reff-jenis-kelamin.index', compact('items'));
    }
}
