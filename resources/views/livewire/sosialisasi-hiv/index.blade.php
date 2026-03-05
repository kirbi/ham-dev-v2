<div>
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-bold">Sosialisasi HIV</h2>
        <a href="{{ route('sosialisasi-hiv.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Tambah Data</a>
    </div>

    @if (session()->has('success'))
        <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">{{ session('success') }}</div>
    @endif

    <div class="flex flex-wrap gap-2 mb-4">
        <input type="text" wire:model.live="search" placeholder="Cari nama kegiatan..." class="border rounded px-3 py-2 w-full max-w-sm" />
        <select wire:model.live="kabupaten" class="border rounded px-3 py-2">
            <option value="">Semua Kabupaten</option>
            @foreach($kabupatens as $kab)
                <option value="{{ $kab->id_kabupaten }}">{{ $kab->nama }}</option>
            @endforeach
        </select>
        <select wire:model.live="kecamatan" class="border rounded px-3 py-2">
            <option value="">Semua Kecamatan</option>
            @foreach($kecamatans as $kec)
                <option value="{{ $kec->id_kecamatan }}">{{ $kec->nama }}</option>
            @endforeach
        </select>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border rounded">
            <thead class="bg-gray-100">
                <tr>
                    <th class="py-2 px-4 text-left">#</th>
                    <th class="py-2 px-4 text-left">Nama Kegiatan</th>
                    <th class="py-2 px-4 text-left">Tempat</th>
                    <th class="py-2 px-4 text-left">Tanggal</th>
                    <th class="py-2 px-4 text-left">Peserta Hadir</th>
                    <th class="py-2 px-4 text-left">Kabupaten</th>
                    <th class="py-2 px-4 text-left">Kecamatan</th>
                    <th class="py-2 px-4 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($items as $i => $item)
                <tr class="border-t hover:bg-gray-50">
                    <td class="py-2 px-4">{{ $items->firstItem() + $i }}</td>
                    <td class="py-2 px-4">{{ $item->nama_kegiatan }}</td>
                    <td class="py-2 px-4">{{ $item->tempat_kegiatan }}</td>
                    <td class="py-2 px-4">{{ $item->tanggal_kegiatan }}</td>
                    <td class="py-2 px-4">{{ $item->peserta_hadir }}</td>
                    <td class="py-2 px-4">{{ $item->kabupaten->nama ?? '-' }}</td>
                    <td class="py-2 px-4">{{ $item->kecamatan->nama ?? '-' }}</td>
                    <td class="py-2 px-4 flex gap-2">
                        <a href="{{ route('sosialisasi-hiv.edit', $item->id_sosialisasi_hiv) }}" class="text-blue-600 hover:underline">Ubah</a>
                        <button wire:click="delete({{ $item->id_sosialisasi_hiv }})" wire:confirm="Yakin hapus data ini?" class="text-red-600 hover:underline">Hapus</button>
                    </td>
                </tr>
                @empty
                <tr><td colspan="8" class="py-4 px-4 text-center text-gray-500">Tidak ada data.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4">{{ $items->links() }}</div>
</div>
