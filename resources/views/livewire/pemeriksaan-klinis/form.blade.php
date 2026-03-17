<div>
    <h2 class="text-xl font-bold mb-4">{{ $id_pemeriksaan_klinis ? 'Edit' : 'Tambah' }} Pemeriksaan Klinis</h2>
    <form wire:submit.prevent="save">
        <div class="mb-4">
            <label class="block mb-1">Pasien</label>
            <select wire:model="pasien_id" class="border rounded px-2 py-1 w-full" required>
                <option value="">Pilih Pasien</option>
                @foreach($pasiens as $pasien)
                    <option value="{{ $pasien->pasien_id }}">{{ $pasien->nama }}</option>
                @endforeach
            </select>
            @error('pasien_id') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label class="block mb-1">Tanggal Pemeriksaan</label>
            <input type="date" wire:model="tanggal_pemeriksaan" class="border rounded px-2 py-1 w-full" required />
            @error('tanggal_pemeriksaan') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label class="block mb-1">Status Fungsional</label>
            <select wire:model="status_fungsional_id" class="border rounded px-2 py-1 w-full" required>
                <option value="">Pilih Status Fungsional</option>
                @foreach($statusFungsionals as $status)
                    <option value="{{ $status->id }}">{{ $status->nama }}</option>
                @endforeach
            </select>
            @error('status_fungsional_id') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label class="block mb-1">Kategori Pemeriksaan</label>
            <select wire:model="kategori_pemeriksaan_id" class="border rounded px-2 py-1 w-full" required>
                <option value="">Pilih Kategori Pemeriksaan</option>
                @foreach($kategoriPemeriksaans as $kategori)
                    <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                @endforeach
            </select>
            @error('kategori_pemeriksaan_id') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label class="block mb-1">Standar Klinis</label>
            <input type="text" wire:model="standar_klinis" class="border rounded px-2 py-1 w-full" required />
            @error('standar_klinis') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label class="block mb-1">Jumlah CD4</label>
            <input type="number" wire:model="jumlah_cd4" class="border rounded px-2 py-1 w-full" />
            @error('jumlah_cd4') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label class="block mb-1">Viral Load</label>
            <input type="number" wire:model="viral_load" class="border rounded px-2 py-1 w-full" />
            @error('viral_load') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label class="block mb-1">Tanggal Pemeriksaan Selanjutnya</label>
            <input type="date" wire:model="tanggal_pemeriksaan_selanjutnya" class="border rounded px-2 py-1 w-full" />
            @error('tanggal_pemeriksaan_selanjutnya') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label class="block mb-1">Lain-lain</label>
            <input type="text" wire:model="lain_lain" class="border rounded px-2 py-1 w-full" />
            @error('lain_lain') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label class="block mb-1">Berat Badan</label>
            <input type="text" wire:model="berat_badan" class="border rounded px-2 py-1 w-full" required />
            @error('berat_badan') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
        <a href="{{ route('pemeriksaan-klinis.index') }}" class="ml-2 text-gray-600">Batal</a>
    </form>
</div>
