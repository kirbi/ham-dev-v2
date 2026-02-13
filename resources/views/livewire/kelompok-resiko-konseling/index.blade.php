<div>
    <h2 class="text-xl font-bold mb-4">Kelompok Resiko Konseling</h2>
    <input type="text" wire:model="search" placeholder="Cari kelompok resiko..." class="border rounded px-2 py-1 mb-4" />
    <a href="{{ route('kelompok-resiko-konseling.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Tambah Data</a>
    <table class="min-w-full bg-white">
        <thead>
            <tr>
                <th class="py-2">#</th>
                <th class="py-2">Kelompok Resiko</th>
                <th class="py-2">Lama Tahun</th>
                <th class="py-2">Lama Bulan</th>
                <th class="py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $i => $item)
            <tr>
                <td class="py-2">{{ $items->firstItem() + $i }}</td>
                <td class="py-2">{{ $item->kelompokResiko->nama ?? '-' }}</td>
                <td class="py-2">{{ $item->lama_tahun }}</td>
                <td class="py-2">{{ $item->lama_bulan }}</td>
                <td class="py-2">
                    <a href="{{ route('kelompok-resiko-konseling.edit', $item->id_kelompok_resiko_konseling) }}" class="text-blue-500">Ubah</a>
                    <button wire:click="$emit('delete', {{ $item->id_kelompok_resiko_konseling }})" class="text-red-500 ml-2">Hapus</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-4">
        {{ $items->links() }}
    </div>
</div>
