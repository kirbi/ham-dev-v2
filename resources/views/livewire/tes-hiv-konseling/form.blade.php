<div>
    <h2 class="text-xl font-bold mb-4">{{ $id_tes_hiv_konseling ? 'Edit' : 'Tambah' }} Tes HIV Konseling</h2>
    @if (session()->has('success'))
        <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">{{ session('success') }}</div>
    @endif
    <form wire:submit.prevent="save" class="max-w-2xl">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <div class="md:col-span-2">
                <label class="block font-medium mb-1">Konseling HIV <span class="text-red-500">*</span></label>
                <select wire:model="id_konseling" class="border rounded px-3 py-2 w-full">
                    <option value="">-- Pilih Konseling --</option>
                    @foreach($konselings as $k)
                        <option value="{{ $k->id_konseling_hiv }}">{{ $k->no_registrasi ?? $k->id_konseling_hiv }} - {{ $k->tanggal_konseling }}</option>
                    @endforeach
                </select>
                @error('id_konseling') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block font-medium mb-1">Jenis Tes <span class="text-red-500">*</span></label>
                <input type="text" wire:model="jenis_tes" class="border rounded px-3 py-2 w-full" />
                @error('jenis_tes') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block font-medium mb-1">Tanggal Tes <span class="text-red-500">*</span></label>
                <input type="date" wire:model="tanggal_tes" class="border rounded px-3 py-2 w-full" />
                @error('tanggal_tes') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block font-medium mb-1">Tes R1</label>
                <input type="text" wire:model="tes_r1" class="border rounded px-3 py-2 w-full" />
            </div>
            <div>
                <label class="block font-medium mb-1">Reagen R1</label>
                <input type="text" wire:model="reagen_r1" class="border rounded px-3 py-2 w-full" />
            </div>
            <div>
                <label class="block font-medium mb-1">Tes R2</label>
                <input type="text" wire:model="tes_r2" class="border rounded px-3 py-2 w-full" />
            </div>
            <div>
                <label class="block font-medium mb-1">Reagen R2</label>
                <input type="text" wire:model="reagen_r2" class="border rounded px-3 py-2 w-full" />
            </div>
            <div>
                <label class="block font-medium mb-1">Tes R3</label>
                <input type="text" wire:model="tes_r3" class="border rounded px-3 py-2 w-full" />
            </div>
            <div>
                <label class="block font-medium mb-1">Reagen R3</label>
                <input type="text" wire:model="reagen_r3" class="border rounded px-3 py-2 w-full" />
            </div>
            <div class="md:col-span-2">
                <label class="block font-medium mb-1">Hasil <span class="text-red-500">*</span></label>
                <input type="text" wire:model="hasil" class="border rounded px-3 py-2 w-full" />
                @error('hasil') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="flex gap-2">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan</button>
            <a href="{{ route('tes-hiv-konseling.index') }}" class="px-4 py-2 rounded border hover:bg-gray-100">Batal</a>
        </div>
    </form>
</div>