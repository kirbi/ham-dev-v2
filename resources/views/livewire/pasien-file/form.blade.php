<div>
    <h2 class="text-xl font-bold mb-4">{{ $id_file ? 'Edit' : 'Tambah' }} File Pasien</h2>
    <form wire:submit.prevent="save">
        <div class="mb-4">
            <label class="block mb-1">Nama File</label>
            <input type="text" wire:model="nama" class="border rounded px-2 py-1 w-full" required />
            @error('nama') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label class="block mb-1">Pasien</label>
            <select wire:model="id" class="border rounded px-2 py-1 w-full" required>
                <option value="">Pilih Pasien</option>
                @foreach($pasiens as $pasien)
                    <option value="{{ $pasien->id }}">{{ $pasien->nama }}</option>
                @endforeach
            </select>
            @error('id') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
        <a href="{{ route('pasien-file.index') }}" class="ml-2 text-gray-600">Batal</a>
    </form>
</div>
