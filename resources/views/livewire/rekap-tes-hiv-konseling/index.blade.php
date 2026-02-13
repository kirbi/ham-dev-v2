<div>
    <h2 class="text-xl font-bold mb-4">Rekap Tes HIV Konseling</h2>
    <input type="text" wire:model="search" placeholder="Cari tempat tes..." class="border rounded px-2 py-1 mb-4" />
    <a href="{{ route('rekap-tes-hiv-konseling.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Tambah Data</a>
    <table class="min-w-full bg-white">
        <thead>
            <tr>
                <th class="py-2">#</th>
                <th class="py-2">Tempat Tes</th>
                <th class="py-2">Tanggal</th>
                <th class="py-2">Hasil</th>
                <th class="py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $i => $item)
            <tr>
                <td class="py-2">{{ $items->firstItem() + $i }}</td>
                <td class="py-2">{{ $item->tempat_tes }}</td>
                <td class="py-2">{{ $item->tanggal }}</td>
                <td class="py-2">{{ $item->hasil }}</td>
                <td class="py-2">
                    <a href="{{ route('rekap-tes-hiv-konseling.edit', $item->id_rekap_tes_hiv_konseling) }}" class="text-blue-500">Ubah</a>
                    <button wire:click="$emit('delete', {{ $item->id_rekap_tes_hiv_konseling }})" class="text-red-500 ml-2">Hapus</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-4">
        {{ $items->links() }}
    </div>
</div>
