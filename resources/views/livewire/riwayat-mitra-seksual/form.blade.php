<div>
    <h2 class="text-xl font-bold mb-4">{{ $id_riwayat_mitra_seksual ? 'Edit' : 'Tambah' }} Riwayat Mitra Seksual</h2>
    <form wire:submit.prevent="save">
        <div class="mb-4">
            <label class="block mb-1">Nama</label>
            <input type="text" wire:model="nama" class="border rounded px-2 py-1 w-full" required />
            @error('nama') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
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
            <label class="block mb-1">Umur</label>
            <input type="number" wire:model="umur" class="border rounded px-2 py-1 w-full" required />
            @error('umur') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label class="block mb-1">Umur (Bulan)</label>
            <input type="number" wire:model="umur_bulan" class="border rounded px-2 py-1 w-full" required />
            @error('umur_bulan') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label class="block mb-1">Hubungan</label>
            <select wire:model="mitra_seksual_id" class="border rounded px-2 py-1 w-full" required>
                <option value="">Pilih Hubungan</option>
                @foreach($hubungans as $hubungan)
                    <option value="{{ $hubungan->id }}">{{ $hubungan->nama }}</option>
                @endforeach
            </select>
            @error('mitra_seksual_id') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label class="block mb-1">Komsumsi ART</label>
            <input type="text" wire:model="komsumsi_art" class="border rounded px-2 py-1 w-full" required />
            @error('komsumsi_art') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label class="block mb-1">Status HIV</label>
            <select wire:model="status_hiv_id" class="border rounded px-2 py-1 w-full" required>
                <option value="">Pilih Status HIV</option>
                @foreach($statusHivs as $status)
                    <option value="{{ $status->id }}">{{ $status->nama }}</option>
                @endforeach
            </select>
            @error('status_hiv_id') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label class="block mb-1">No REG Nasional</label>
            <input type="text" wire:model="no_reg_nasional" class="border rounded px-2 py-1 w-full" />
            @error('no_reg_nasional') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
        <a href="{{ route('riwayat-mitra-seksual.index') }}" class="ml-2 text-gray-600">Batal</a>
    </form>
</div>
