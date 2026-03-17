<div>
    <div class="mb-4 flex flex-wrap items-center justify-between gap-2">
        <h2 class="text-xl font-semibold text-gray-800">Referensi Provinsi</h2>
        <a href="{{ route('reff-provinsi.create') }}" class="px-3 py-2 bg-blue-600 text-white text-sm rounded-lg hover:bg-blue-700">+ Tambah</a>
    </div>
    <div class="bg-white rounded-lg shadow">
        <div class="p-4 border-b">
            <input type="text" wire:model.live.debounce.300ms="search" placeholder="Cari nama..." class="w-full sm:w-64 px-3 py-2 border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-gray-50 border-b">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase w-12">#</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase w-28">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($items as $i => $item)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3 text-gray-500">{{ $items->firstItem() + $i }}</td>
                        <td class="px-4 py-3 font-medium text-gray-800">{{ $item->nama }}</td>
                        <td class="px-4 py-3">
                            <a href="{{ route('reff-provinsi.edit', $item->id) }}" class="text-blue-600 hover:underline text-sm">Ubah</a>
                            <button wire:click="delete({{ $item->id }})" wire:confirm="Yakin ingin menghapus data ini?" class="text-red-600 hover:underline text-sm ml-2">Hapus</button>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="3" class="px-4 py-8 text-center text-gray-400">Tidak ada data</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="p-4 border-t">{{ $items->links() }}</div>
    </div>
</div>
