<div>
    <h2 class="text-xl font-bold mb-4">{{ $konseling_hiv_id ? 'Edit' : 'Tambah' }} Sumber Info Tes HIV Konseling</h2>
    <form wire:submit.prevent="save">
        <div class="mb-4">
            <label class="block mb-1">Sumber Info</label>
            <select wire:model="info_tes_hiv_id" class="border rounded px-2 py-1 w-full" required>
                <option value="">Pilih Sumber Info</option>
                @foreach($infoTesHivs as $info)
                    <option value="{{ $info->id }}">{{ $info->nama }}</option>
                @endforeach
            </select>
            @error('info_tes_hiv_id') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
        <a href="{{ route('info-tes-hiv-konseling.index') }}" class="ml-2 text-gray-600">Batal</a>
    </form>
</div>
