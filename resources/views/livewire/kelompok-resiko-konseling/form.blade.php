<div>
    <h2 class="text-xl font-bold mb-4">{{ $id_kelompok_resiko_konseling ? 'Edit' : 'Tambah' }} Kelompok Resiko Konseling</h2>
    <form wire:submit.prevent="save">
        <div class="mb-4">
            <label class="block mb-1">Kelompok Resiko</label>
            <select wire:model="id_kelompok_resiko" class="border rounded px-2 py-1 w-full" required>
                <option value="">Pilih Kelompok Resiko</option>
                @foreach($kelompokResikos as $kelompok)
                    <option value="{{ $kelompok->id_kelompok_resiko }}">{{ $kelompok->nama }}</option>
                @endforeach
            </select>
            @error('id_kelompok_resiko') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label class="block mb-1">Lama Tahun</label>
            <input type="number" wire:model="lama_tahun" class="border rounded px-2 py-1 w-full" required />
            @error('lama_tahun') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label class="block mb-1">Lama Bulan</label>
            <input type="number" wire:model="lama_bulan" class="border rounded px-2 py-1 w-full" required />
            @error('lama_bulan') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
        <a href="{{ route('kelompok-resiko-konseling.index') }}" class="ml-2 text-gray-600">Batal</a>
    </form>
</div>
