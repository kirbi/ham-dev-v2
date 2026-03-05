<div>
    <h2 class="text-xl font-bold mb-4">{{ $id_tingkat_resiko_hiv ? 'Edit' : 'Tambah' }} Tingkat Resiko HIV</h2>

    @if (session()->has('success'))
        <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">{{ session('success') }}</div>
    @endif

    <form wire:submit.prevent="save" class="max-w-lg">
        <div class="mb-4">
            <label class="block font-medium mb-1">Nama <span class="text-red-500">*</span></label>
            <input type="text" wire:model="nama" class="border rounded px-3 py-2 w-full" />
            @error('nama') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label class="block font-medium mb-1">Deskripsi</label>
            <textarea wire:model="deskripsi" rows="3" class="border rounded px-3 py-2 w-full"></textarea>
        </div>
        <div class="flex gap-2">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan</button>
            <a href="{{ route('reff-tingkat-resiko-hiv.index') }}" class="px-4 py-2 rounded border hover:bg-gray-100">Batal</a>
        </div>
    </form>
</div>
