<div>
    <h2 class="text-xl font-bold mb-4">{{ $faktor_resiko_id ? 'Edit' : 'Tambah' }} Faktor Resiko Pasien</h2>
    <form wire:submit.prevent="save">
        <div class="mb-4">
            <label class="block mb-1">Nama Pasien</label>
            <select wire:model="pasien_id" class="border rounded px-2 py-1 w-full" required>
                <option value="">Pilih Pasien</option>
                @foreach($pasiens as $pasien)
                    <option value="{{ $pasien->id }}">{{ $pasien->nama }}</option>
                @endforeach
            </select>
              @error('pasien_id') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label class="block mb-1">Faktor Resiko</label>
            <select wire:model="faktor_resiko_id" class="border rounded px-2 py-1 w-full" required>
                <option value="">Pilih Faktor Resiko</option>
                @foreach($faktorResikos as $faktor)
                    <option value="{{ $faktor->id }}">{{ $faktor->nama }}</option>
                @endforeach
            </select>
            @error('faktor_resiko_id') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
        <a href="{{ route('faktor-resiko-pasien.index') }}" class="ml-2 text-gray-600">Batal</a>
    </form>
</div>
