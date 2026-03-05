<div>
    <h2 class="text-xl font-bold mb-4">{{ $id_riwayat_terapi_art ? 'Edit' : 'Tambah' }} Riwayat Terapi ART</h2>
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
                <label class="block font-medium mb-1">Pernah Menerima ART</label>
                <select wire:model="pernah_menerima" class="border rounded px-3 py-2 w-full">
                    <option value="">--</option>
                    <option value="Ya">Ya</option>
                    <option value="Tidak">Tidak</option>
                </select>
            </div>
            <div>
                <label class="block font-medium mb-1">Jenis Terapi</label>
                <select wire:model="id_jenis_terapi_art" class="border rounded px-3 py-2 w-full">
                    <option value="">-- Pilih --</option>
                    @foreach($jenisTerapiList as $j)
                        <option value="{{ $j->id_jenis_terapi }}">{{ $j->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block font-medium mb-1">Tempat Terapi</label>
                <select wire:model="id_tempat_art" class="border rounded px-3 py-2 w-full">
                    <option value="">-- Pilih --</option>
                    @foreach($tempatTerapis as $t)
                        <option value="{{ $t->id_tempat_terapi }}">{{ $t->nama }}</option>
                    @endforeach
                </select>
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
                <label class="block font-medium mb-1">Dosis ART</label>
                <input type="text" wire:model="dosis_art" class="border rounded px-3 py-2 w-full" />
            </div>
            <div>
                <label class="block font-medium mb-1">Lama Penggunaan</label>
                <input type="text" wire:model="lama_penggunaan" class="border rounded px-3 py-2 w-full" />
            </div>
        </div>
        <div class="flex gap-2">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan</button>
            <a href="{{ route('riwayat-terapi-art.index') }}" class="px-4 py-2 rounded border hover:bg-gray-100">Batal</a>
        </div>
    </form>
</div>