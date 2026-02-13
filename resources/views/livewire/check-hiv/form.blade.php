<div>
    <h2 class="text-xl font-bold mb-4">{{ $id_check_hiv ? 'Edit' : 'Tambah' }} Kegiatan Check HIV</h2>
    <form wire:submit.prevent="save">
        <div class="mb-4">
            <label class="block mb-1">Nama Kegiatan</label>
            <input type="text" wire:model="nama_kegiatan" class="border rounded px-2 py-1 w-full" required />
            @error('nama_kegiatan') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label class="block mb-1">Nama Tempat</label>
            <input type="text" wire:model="nama_tempat" class="border rounded px-2 py-1 w-full" required />
            @error('nama_tempat') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label class="block mb-1">Deskripsi Kegiatan</label>
            <textarea wire:model="deskripsi_kegiatan" class="border rounded px-2 py-1 w-full"></textarea>
        </div>
        <div class="mb-4">
            <label class="block mb-1">Tanggal Kegiatan</label>
            <input type="date" wire:model="tanggal_kegiatan" class="border rounded px-2 py-1 w-full" required />
            @error('tanggal_kegiatan') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label class="block mb-1">Jumlah Hadir</label>
            <input type="number" wire:model="hadir" class="border rounded px-2 py-1 w-full" required />
            @error('hadir') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label class="block mb-1">Jumlah Positif</label>
            <input type="number" wire:model="jumlah_positif" class="border rounded px-2 py-1 w-full" required />
            @error('jumlah_positif') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label class="block mb-1">Jumlah Negatif</label>
            <input type="number" wire:model="jumlah_negatif" class="border rounded px-2 py-1 w-full" required />
            @error('jumlah_negatif') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label class="block mb-1">Kabupaten</label>
            <select wire:model="id_kabupaten" class="border rounded px-2 py-1 w-full" required>
                <option value="">Pilih Kabupaten</option>
                @foreach($kabupatens as $kab)
                    <option value="{{ $kab->id_kabupaten }}">{{ $kab->nama }}</option>
                @endforeach
            </select>
            @error('id_kabupaten') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label class="block mb-1">Kecamatan</label>
            <select wire:model="id_kecamatan" class="border rounded px-2 py-1 w-full" required>
                <option value="">Pilih Kecamatan</option>
                @foreach($kecamatans as $kec)
                    <option value="{{ $kec->id_kecamatan }}">{{ $kec->nama }}</option>
                @endforeach
            </select>
            @error('id_kecamatan') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label class="block mb-1">Nama Narahubung</label>
            <input type="text" wire:model="nama_narahubung" class="border rounded px-2 py-1 w-full" required />
            @error('nama_narahubung') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label class="block mb-1">Kontak Narahubung</label>
            <input type="text" wire:model="kontak_narahubung" class="border rounded px-2 py-1 w-full" required />
            @error('kontak_narahubung') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
        <a href="{{ route('check-hiv.index') }}" class="ml-2 text-gray-600">Batal</a>
    </form>
</div>
