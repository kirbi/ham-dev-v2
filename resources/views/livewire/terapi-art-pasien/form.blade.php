<div class="max-w-2xl">
    <div class="mb-4"><h2 class="text-xl font-semibold text-gray-800">{{ $id_terapi_art_pasien ? 'Edit' : 'Tambah' }} Terapi ART Pasien</h2></div>
    <div class="bg-white rounded-lg shadow p-6">
        <form wire:submit.prevent="save">
            <div class="mb-5">
                <label class="block text-sm font-medium text-gray-700 mb-1">Pasien <span class="text-red-500">*</span></label>
                <select wire:model="id" class="w-full px-3 py-2 border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 @error('id') border-red-500 @enderror">
                    <option value="">-- Pilih Pasien --</option>
                    @foreach($pasiens as $pasien)
                        <option value="{{ $pasien->id }}">{{ $pasien->nama }} ({{ $pasien->no_rekam_medis }})</option>
                    @endforeach
                </select>
                @error('id') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
            </div>
            <div class="mb-5">
                <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Mulai <span class="text-red-500">*</span></label>
                <input type="date" wire:model="tanggal_mulai" class="w-full px-3 py-2 border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 @error('tanggal_mulai') border-red-500 @enderror">
                @error('tanggal_mulai') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
            </div>
            <div class="mb-5">
                <label class="block text-sm font-medium text-gray-700 mb-1">Fase <span class="text-red-500">*</span></label>
                <input type="text" wire:model="fase" class="w-full px-3 py-2 border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 @error('fase') border-red-500 @enderror">
                @error('fase') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
            </div>
            <div class="mb-5">
                <label class="block text-sm font-medium text-gray-700 mb-1">Alasan <span class="text-red-500">*</span></label>
                <select wire:model="alasan_id" class="w-full px-3 py-2 border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 @error('alasan_id') border-red-500 @enderror">
                    <option value="">-- Pilih Alasan --</option>
                    @foreach($alasanList as $alasan)
                        <option value="{{ $alasan->alasan_substitusi_id }}">{{ $alasan->nama }}</option>
                    @endforeach
                </select>
                @error('alasan_id') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
            </div>
            <div class="mb-5">
                <label class="block text-sm font-medium text-gray-700 mb-1">Penjelasan</label>
                <textarea wire:model="penjelasan" rows="3" class="w-full px-3 py-2 border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 @error('penjelasan') border-red-500 @enderror"></textarea>
                @error('penjelasan') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
            </div>
            <div class="mb-5">
                <label class="block text-sm font-medium text-gray-700 mb-1">Paduan ART <span class="text-red-500">*</span></label>
                <select wire:model="paduan_art_id" class="w-full px-3 py-2 border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 @error('paduan_art_id') border-red-500 @enderror">
                    <option value="">-- Pilih Paduan ART --</option>
                    @foreach($paduanArtList as $pa)
                        <option value="{{ $pa->paduan_art_id }}">{{ $pa->nama }}</option>
                    @endforeach
                </select>
                @error('paduan_art_id') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
            </div>
            <div class="flex gap-3">
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white text-sm rounded-lg hover:bg-blue-700">Simpan</button>
                <a href="{{ route('terapi-art-pasien.index') }}" class="px-4 py-2 bg-gray-100 text-gray-700 text-sm rounded-lg hover:bg-gray-200">Batal</a>
            </div>
        </form>
    </div>
</div>
