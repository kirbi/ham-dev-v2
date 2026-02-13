<div>
    <h2 class="text-xl font-bold mb-4">Referensi Efek Samping</h2>
    <input type="text" wire:model="search" placeholder="Cari nama..." class="border rounded px-2 py-1 mb-4" />
    <a href="{{ route('reff-efek-samping.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Tambah Data</a>
    <table class="min-w-full bg-white">
        <thead>
            <tr>
                <th class="py-2">#</th>
                <th class="py-2">Nama</th>
                <th class="py-2">Deskripsi</th>
                <th class="py-2">Kode</th>
                <th class="py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($efekSampings as $i => $item)
            <tr>
                <td class="py-2">{{ $efekSampings->firstItem() + $i }}</td>
                <td class="py-2">{{ $item->nama }}</td>
                <td class="py-2">{{ $item->deskripsi }}</td>
                <td class="py-2">{{ $item->kode }}</td>
                <td class="py-2">
                    <a href="{{ route('reff-efek-samping.edit', $item->id_efek_samping) }}" class="text-blue-500">Ubah</a>
                    <button wire:click="$emit('delete', {{ $item->id_efek_samping }})" class="text-red-500 ml-2">Hapus</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-4">
        {{ $efekSampings->links() }}
    </div>
</div>
