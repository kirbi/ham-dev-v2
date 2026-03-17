{{-- filepath: resources/views/livewire/konseling/index.blade.php --}}
<div>
    <div class="mb-6 flex justify-between items-center">
        <h1 class="text-3xl font-bold">Manajemen Konseling HIV</h1>
        <a href="{{ route('konseling.create', ['pasien_id' => null]) }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg">Tambah Konseling</a>
    </div>
    <div class="mb-6">
        <input type="text" wire:model.live.debounce.300ms="search" placeholder="Cari pasien..." class="w-full px-4 py-2 border rounded-lg">
    </div>
    <div class="bg-white rounded-lg shadow overflow-x-auto">
        <table class="w-full text-sm text-left">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3">No</th>
                    <th class="px-6 py-3">Nama Pasien</th>
                    <th class="px-6 py-3">No. Rekam Medis</th>
                    <th class="px-6 py-3">Tanggal Konseling</th>
                    <th class="px-6 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($konselings as $index => $konseling)
                    <tr class="border-b">
                        <td class="px-6 py-4">{{ $konselings->firstItem() + $index }}</td>
                        <td class="px-6 py-4">{{ $konseling->pasien->nama ?? '-' }}</td>
                        <td class="px-6 py-4">{{ $konseling->pasien->no_rekam_medis ?? '-' }}</td>
                        <td class="px-6 py-4">{{ \Carbon\Carbon::parse($konseling->tanggal_konseling)->format('d/m/Y') }}</td>
                        <td class="px-6 py-4">
                            <a href="{{ route('konseling.show', $konseling->id) }}" class="text-blue-600">Detail</a>
                            <a href="{{ route('konseling.edit', $konseling->id) }}" class="text-yellow-600 ml-2">Edit</a>
                            @if(auth()->user()->type === 'admin')
                                <button wire:click="delete({{ $konseling->id }})" class="text-red-600 ml-2">Hapus</button>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-8 text-center text-gray-500">Tidak ada data konseling</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="px-6 py-4">
            {{ $konselings->links() }}
        </div>
    </div>
</div>
