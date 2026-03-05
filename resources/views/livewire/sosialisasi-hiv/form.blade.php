<div>
    <h2 class="text-xl font-bold mb-4">{{ $id_sosialisasi_hiv ? 'Edit' : 'Tambah' }} Sosialisasi HIV</h2>

    @if (session()->has('success'))
        <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">{{ session('success') }}</div>
    @endif

    <form wire:submit.prevent="save" class="max-w-2xl">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <div>
                <label class="block font-medium mb-1">Nama Kegiatan <span class="text-red-500">*</span></label>
                <input type="text" wire:model="nama_kegiatan" class="border rounded px-3 py-2 w-full" />
                @error('nama_kegiatan') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block font-medium mb-1">Target Kegiatan</label>
                <input type="text" wire:model="target_kegiatan" class="border rounded px-3 py-2 w-full" />
            </div>
            <div>
                <label class="block font-medium mb-1">Tempat Kegiatan <span class="text-red-500">*</span></label>
                <input type="text" wire:model="tempat_kegiatan" class="border rounded px-3 py-2 w-full" />
                @error('tempat_kegiatan') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block font-medium mb-1">Tanggal Kegiatan <span class="text-red-500">*</span></label>
                <input type="date" wire:model="tanggal_kegiatan" class="border rounded px-3 py-2 w-full" />
                @error('tanggal_kegiatan') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block font-medium mb-1">Peserta Hadir <span class="text-red-500">*</span></label>
                <input type="number" wire:model="peserta_hadir" min="0" class="border rounded px-3 py-2 w-full" />
                @error('peserta_hadir') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block font-medium mb-1">Kabupaten/Kota <span class="text-red-500">*</span></label>
                <select wire:model.live="id_kabupaten" class="border rounded px-3 py-2 w-full">
                    <option value="">-- Pilih Kabupaten --</option>
                    @foreach($kabupatens as $kab)
                        <option value="{{ $kab->id_kabupaten }}">{{ $kab->nama }}</option>
                    @endforeach
                </select>
                @error('id_kabupaten') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block font-medium mb-1">Kecamatan <span class="text-red-500">*</span></label>
                <select wire:model="id_kecamatan" class="border rounded px-3 py-2 w-full">
                    <option value="">-- Pilih Kecamatan --</option>
                    @foreach($kecamatans as $kec)
                        <option value="{{ $kec->id_kecamatan }}">{{ $kec->nama }}</option>
                    @endforeach
                </select>
                @error('id_kecamatan') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block font-medium mb-1">Nama Narahubung <span class="text-red-500">*</span></label>
                <input type="text" wire:model="nama_narahubung" class="border rounded px-3 py-2 w-full" />
                @error('nama_narahubung') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block font-medium mb-1">Kontak Narahubung <span class="text-red-500">*</span></label>
                <input type="text" wire:model="kontak_narahubung" class="border rounded px-3 py-2 w-full" />
                @error('kontak_narahubung') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="flex gap-2">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan</button>
            <a href="{{ route('sosialisasi-hiv.index') }}" class="px-4 py-2 rounded border hover:bg-gray-100">Batal</a>
        </div>
    </form>
</div>
