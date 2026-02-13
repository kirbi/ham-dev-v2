<div>
    <h2 class="text-xl font-bold mb-4">{{ $id_kajian_resiko_hiv ? 'Edit' : 'Tambah' }} Kajian Resiko HIV</h2>
    <form wire:submit.prevent="save">
        <div class="mb-4">
            <label class="block mb-1">Tanggal</label>
            <input type="date" wire:model="tanggal" class="border rounded px-2 py-1 w-full" required />
            @error('tanggal') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label class="block mb-1">Tingkat Resiko</label>
            <select wire:model="id_tingkat_resiko_hiv" class="border rounded px-2 py-1 w-full" required>
                <option value="">Pilih Tingkat Resiko</option>
                @foreach($tingkatResikoHivs as $tingkat)
                    <option value="{{ $tingkat->id_tingkat_resiko_hiv }}">{{ $tingkat->nama }}</option>
                @endforeach
            </select>
            @error('id_tingkat_resiko_hiv') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
        <a href="{{ route('kajian-resiko-hiv.index') }}" class="ml-2 text-gray-600">Batal</a>
    </form>
</div>
