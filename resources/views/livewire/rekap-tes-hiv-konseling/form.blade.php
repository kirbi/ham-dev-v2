<div>
    <h2 class="text-xl font-bold mb-4">{{ $id_rekap_tes_hiv_konseling ? 'Edit' : 'Tambah' }} Rekap Tes HIV Konseling</h2>
    <form wire:submit.prevent="save">
        <div class="mb-4">
            <label class="block mb-1">Tempat Tes</label>
            <input type="text" wire:model="tempat_tes" class="border rounded px-2 py-1 w-full" required />
            @error('tempat_tes') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label class="block mb-1">Tanggal</label>
            <input type="date" wire:model="tanggal" class="border rounded px-2 py-1 w-full" required />
            @error('tanggal') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label class="block mb-1">Hasil</label>
            <input type="text" wire:model="hasil" class="border rounded px-2 py-1 w-full" required />
            @error('hasil') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
        <a href="{{ route('rekap-tes-hiv-konseling.index') }}" class="ml-2 text-gray-600">Batal</a>
    </form>
</div>
