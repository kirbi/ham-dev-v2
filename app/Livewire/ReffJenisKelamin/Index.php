<?php

namespace App\Livewire\ReffJenisKelamin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\JenisKelamin;

class Index extends Component
{
    use WithPagination;

    public $search = '';

    public function delete($id)
    {
        JenisKelamin::where('id', $id)->update(['deleted' => 1]);
        session()->flash('success', 'Jenis Kelamin berhasil dihapus.');
    }

    public function render()
    {
        $items = JenisKelamin::where('deleted', 0)
            ->where('nama', 'like', '%'.$this->search.'%')
            ->orderBy('nama', 'ASC')
            ->paginate(10);

        return view('livewire.reff-jenis-kelamin.index', ['items' => $items]);
    }
}
