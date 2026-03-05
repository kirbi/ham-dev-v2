<div>
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-bold">Referensi Desa/Kelurahan</h2>
        <a href="{{ route('reff-desa.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Tambah Data</a>
    </div>
    @if (session()->has('success'))
        <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">{{ session('success') }}</div>
    @endif
    <div class="flex gap-2 mb-4">
        <input type="text" wire:model.live="search" placeholder="Cari nama..." class="border rounded px-3 py-2 w-full max-w-sm" />
        <select wire:model.live="filterKecamatan" class="border rounded px-3 py-2">
            <option value="">Semua Kecamatan</option>
            @foreach($kecamatans as $kec)
                <option value="{{ $kec->id_kecamatan }}">{{ $kec->nama }}</option>
            @endforeach
        </select>
    </div>
    <table class="min-w-full bg-white border rounded">
        <thead class="bg-gray-100">
            <tr>
                <th class="py-2 px-4 text-left">#</th>
                <th class="py-2 px-4 text-left">Nama Desa</th>
                <th class="py-2 px-4 text-left">Kecamatan</th>
                <th class="py-2 px-4 text-left">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($items as $i => $item)
            <tr class="border-t hover:bg-gray-50">
                <td class="py-2 px-4">{{ $items->firstItem() + $i }}</td>
                <td class="py-2 px-4">{{ $item->nama }}</td>
                <td class="py-2 px-4">{{ $item->kecamatan->nama ?? '-' }}</td>
                <td class="py-2 px-4 flex gap-2">
                    <a href="{{ route('reff-desa.edit', $item->id_desa) }}" class="text-blue-600 hover:underline">Ubah</a>
                    <button wire:click="delete({{ $item->id_desa }})" wire:confirm="Yakin hapus data ini?" class="text-red-600 hover:underline">Hapus</button>
                </td>
            </tr>
            @empty
            <tr><td colspan="4" class="py-4 px-4 text-center text-gray-500">Tidak ada data.</td></tr>
            @endforelse
        </tbody>
    </table>
    <div class="mt-4">{{ $items->links() }}</div>
</div>
