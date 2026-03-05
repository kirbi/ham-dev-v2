<div>
    <h2 class="text-xl font-bold mb-4">{{ $id_kecamatan ? 'Edit' : 'Tambah' }} Kecamatan</h2>
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
            <label class="block font-medium mb-1">Kabupaten/Kota <span class="text-red-500">*</span></label>
            <select wire:model="id_kabupaten" class="border rounded px-3 py-2 w-full">
                <option value="">-- Pilih Kabupaten/Kota --</option>
                @foreach($kabupatens as $kab)
                    <option value="{{ $kab->id_kabupaten }}">{{ $kab->nama }}</option>
                @endforeach
            </select>
            @error('id_kabupaten') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <div class="flex gap-2">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan</button>
            <a href="{{ route('reff-kecamatan.index') }}" class="px-4 py-2 rounded border hover:bg-gray-100">Batal</a>
        </div>
    </form>
</div>
