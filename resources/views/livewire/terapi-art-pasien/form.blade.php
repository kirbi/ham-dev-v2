<div>
    <h2 class="text-xl font-bold mb-4">{{ $id_terapi_art_pasien ? 'Edit' : 'Tambah' }} Terapi ART Pasien</h2>
    @if (session()->has('success'))
        <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">{{ session('success') }}</div>
    @endif
    <form wire:submit.prevent="save" class="max-w-2xl">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <div class="md:col-span-2">
                <label class="block font-medium mb-1">Pasien <span class="text-red-500">*</span></label>
                <select wire:model="id_pasien" class="border rounded px-3 py-2 w-full">
                    <option value="">-- Pilih Pasien --</option>
                    @foreach($pasiens as $p)
                        <option value="{{ $p->id_pasien }}">{{ $p->nama }}</option>
                    @endforeach
                </select>
                @error('id_pasien') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block font-medium mb-1">Tanggal Mulai <span class="text-red-500">*</span></label>
                <input type="date" wire:model="tanggal_mulai" class="border rounded px-3 py-2 w-full" />
                @error('tanggal_mulai') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block font-medium mb-1">Fase</label>
                <input type="text" wire:model="fase" class="border rounded px-3 py-2 w-full" placeholder="Inisiasi / Lanjutan" />
            </div>
            <div>
                <label class="block font-medium mb-1">Paduan ART</label>
                <select wire:model="id_paduan_art" class="border rounded px-3 py-2 w-full">
                    <option value="">-- Pilih --</option>
                    @foreach($paduanArts as $pa)
                        <option value="{{ $pa->id_paduan_art }}">{{ $pa->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block font-medium mb-1">Alasan</label>
                <select wire:model="id_alasan" class="border rounded px-3 py-2 w-full">
                    <option value="">-- Pilih --</option>
                    @foreach($alasans as $a)
                        <option value="{{ $a->id_alasan_substitusi }}">{{ $a->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="md:col-span-2">
                <label class="block font-medium mb-1">Penjelasan</label>
                <textarea wire:model="penjelasan" rows="3" class="border rounded px-3 py-2 w-full"></textarea>
            </div>
        </div>
        <div class="flex gap-2">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan</button>
            <a href="{{ route('terapi-art-pasien.index') }}" class="px-4 py-2 rounded border hover:bg-gray-100">Batal</a>
        </div>
    </form>
</div>