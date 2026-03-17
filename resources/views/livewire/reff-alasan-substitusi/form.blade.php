<div>
    <h2 class="text-xl font-bold mb-4">{{ $alasan_substitusi_id ? 'Edit' : 'Tambah' }} Alasan Substitusi</h2>
    <form wire:submit.prevent="save">
        <div class="mb-4">
            <label class="block mb-1">Nama</label>
            <input type="text" wire:model="nama" class="border rounded px-2 py-1 w-full" required />
            @error('nama') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label class="block mb-1">Deskripsi</label>
            <textarea wire:model="deskripsi" class="border rounded px-2 py-1 w-full"></textarea>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
        <a href="{{ route('reff-alasan-substitusi.index') }}" class="ml-2 text-gray-600">Batal</a>
    </form>
</div>
