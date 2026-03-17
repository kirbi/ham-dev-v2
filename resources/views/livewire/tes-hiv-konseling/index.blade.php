<div>
    <div class="mb-4 flex flex-wrap items-center justify-between gap-2">
        <h2 class="text-xl font-semibold text-gray-800">Tes HIV Konseling</h2>
        <a href="{{ route('tes-hiv-konseling.create') }}" class="px-3 py-2 bg-blue-600 text-white text-sm rounded-lg hover:bg-blue-700">+ Tambah</a>
    </div>
    <div class="bg-white rounded-lg shadow">
        <div class="p-4 border-b">
            <input type="text" wire:model.live.debounce.300ms="search" placeholder="Cari nama/no. rekam medis..." class="w-full sm:w-64 px-3 py-2 border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-gray-50 border-b">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase w-12">#</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Pasien</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Jenis Tes</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Hasil</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tanggal Tes</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase w-28">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($items as $i => $item)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3 text-gray-500">{{ $items->firstItem() + $i }}</td>
                        <td class="px-4 py-3">
                            <div class="font-medium text-gray-800">{{ $item->konseling->pasien->nama ?? '-' }}</div>
                            <div class="text-xs text-gray-500">{{ $item->konseling->pasien->no_rekam_medis ?? '' }}</div>
                        </td>
                        <td class="px-4 py-3 text-gray-600">{{ $item->jenis_tes ?? '-' }}</td>
                        <td class="px-4 py-3">
                            @php $hasil = strtolower($item->hasil ?? ''); @endphp
                            <span class="px-2 py-1 rounded text-xs font-medium
                                {{ $hasil === 'positif' ? 'bg-red-100 text-red-700' : ($hasil === 'negatif' ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-600') }}">
                                {{ $item->hasil ?? '-' }}
                            </span>
                        </td>
                        <td class="px-4 py-3 text-gray-600">{{ $item->tanggal_tes ? \Carbon\Carbon::parse($item->tanggal_tes)->format('d/m/Y') : '-' }}</td>
                        <td class="px-4 py-3">
                            <a href="{{ route('tes-hiv-konseling.edit', $item->id_tes_hiv_konseling) }}" class="text-blue-600 hover:underline text-sm">Ubah</a>
                            <button wire:click="delete({{ $item->id_tes_hiv_konseling }})" wire:confirm="Yakin ingin menghapus data ini?" class="text-red-600 hover:underline text-sm ml-2">Hapus</button>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="6" class="px-4 py-8 text-center text-gray-400">Tidak ada data</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="p-4 border-t">{{ $items->links() }}</div>
    </div>
</div>
