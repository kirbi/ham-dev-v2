<div class="max-w-2xl">
    <div class="mb-4"><h2 class="text-xl font-semibold text-gray-800">{{ $id ? 'Edit' : 'Tambah' }} Kecamatan</h2></div>
    <div class="bg-white rounded-lg shadow p-6">
        <form wire:submit.prevent="save">
            <div class="mb-5">
                <label class="block text-sm font-medium text-gray-700 mb-1">Nama <span class="text-red-500">*</span></label>
                <input type="text" wire:model="nama" class="w-full px-3 py-2 border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 @error('nama') border-red-500 @enderror">
                @error('nama') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
            </div>
            <div class="mb-5">
                <label class="block text-sm font-medium text-gray-700 mb-1">Kabupaten/Kota <span class="text-red-500">*</span></label>
                <select wire:model="kabupaten_id" class="w-full px-3 py-2 border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 @error('kabupaten_id') border-red-500 @enderror">
                    <option value="">-- Pilih Kabupaten --</option>
                    @foreach($kabupatens as $kabupaten)
                        <option value="{{ $kabupaten->kabupaten_id }}">{{ $kabupaten->nama }}</option>
                    @endforeach
                </select>
                @error('kabupaten_id') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
            </div>
            <div class="flex gap-3">
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white text-sm rounded-lg hover:bg-blue-700">Simpan</button>
                <a href="{{ route('reff-kecamatan.index') }}" class="px-4 py-2 bg-gray-100 text-gray-700 text-sm rounded-lg hover:bg-gray-200">Batal</a>
            </div>
        </form>
    </div>
</div>
