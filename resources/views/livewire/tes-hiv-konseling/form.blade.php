<div class="max-w-2xl">
    <div class="mb-4"><h2 class="text-xl font-semibold text-gray-800">{{ $id_tes_hiv_konseling ? 'Edit' : 'Tambah' }} Tes HIV Konseling</h2></div>
    <div class="bg-white rounded-lg shadow p-6">
        <form wire:submit.prevent="save">
            <div class="mb-5">
                <label class="block text-sm font-medium text-gray-700 mb-1">Konseling <span class="text-red-500">*</span></label>
                <select wire:model="konseling_hiv_id" class="w-full px-3 py-2 border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 @error('konseling_hiv_id') border-red-500 @enderror">
                    <option value="">-- Pilih Konseling --</option>
                    @foreach($konselingList as $konseling)
                        <option value="{{ $konseling->id }}">
                            {{ $konseling->pasien->nama ?? '-' }} — {{ $konseling->tanggal_konseling ? \Carbon\Carbon::parse($konseling->tanggal_konseling)->format('d/m/Y') : '' }}
                        </option>
                    @endforeach
                </select>
                @error('konseling_hiv_id') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
            </div>
            <div class="mb-5">
                <label class="block text-sm font-medium text-gray-700 mb-1">Jenis Tes <span class="text-red-500">*</span></label>
                <input type="text" wire:model="jenis_tes" class="w-full px-3 py-2 border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 @error('jenis_tes') border-red-500 @enderror">
                @error('jenis_tes') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
            </div>
            <div class="mb-5">
                <label class="block text-sm font-medium text-gray-700 mb-1">Hasil <span class="text-red-500">*</span></label>
                <select wire:model="hasil" class="w-full px-3 py-2 border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 @error('hasil') border-red-500 @enderror">
                    <option value="">-- Pilih Hasil --</option>
                    <option value="Positif">Positif</option>
                    <option value="Negatif">Negatif</option>
                    <option value="Indeterminate">Indeterminate</option>
                </select>
                @error('hasil') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
            </div>
            <div class="mb-5">
                <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Tes <span class="text-red-500">*</span></label>
                <input type="date" wire:model="tanggal_tes" class="w-full px-3 py-2 border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 @error('tanggal_tes') border-red-500 @enderror">
                @error('tanggal_tes') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
            </div>
            <hr class="my-4">
            <p class="text-sm font-medium text-gray-700 mb-3">Reagen & Tes</p>
            <div class="grid grid-cols-2 gap-4 mb-5">
                <div>
                    <label class="block text-xs font-medium text-gray-600 mb-1">Tes R1</label>
                    <input type="text" wire:model="tes_r1" class="w-full px-3 py-2 border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-xs font-medium text-gray-600 mb-1">Reagen R1</label>
                    <input type="text" wire:model="reagen_r1" class="w-full px-3 py-2 border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-xs font-medium text-gray-600 mb-1">Tes R2</label>
                    <input type="text" wire:model="tes_r2" class="w-full px-3 py-2 border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-xs font-medium text-gray-600 mb-1">Reagen R2</label>
                    <input type="text" wire:model="reagen_r2" class="w-full px-3 py-2 border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-xs font-medium text-gray-600 mb-1">Tes R3</label>
                    <input type="text" wire:model="tes_r3" class="w-full px-3 py-2 border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-xs font-medium text-gray-600 mb-1">Reagen R3</label>
                    <input type="text" wire:model="reagen_r3" class="w-full px-3 py-2 border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
            </div>
            <div class="flex gap-3">
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white text-sm rounded-lg hover:bg-blue-700">Simpan</button>
                <a href="{{ route('tes-hiv-konseling.index') }}" class="px-4 py-2 bg-gray-100 text-gray-700 text-sm rounded-lg hover:bg-gray-200">Batal</a>
            </div>
        </form>
    </div>
</div>
