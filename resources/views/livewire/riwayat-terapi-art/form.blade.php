<div class="max-w-2xl">
    <div class="mb-4"><h2 class="text-xl font-semibold text-gray-800">{{ $id_riwayat_terapi_art ? 'Edit' : 'Tambah' }} Riwayat Terapi ART</h2></div>
    <div class="bg-white rounded-lg shadow p-6">
        <form wire:submit.prevent="save">
            <div class="mb-5">
                <label class="block text-sm font-medium text-gray-700 mb-1">Pasien <span class="text-red-500">*</span></label>
                <select wire:model="pasien_id" class="w-full px-3 py-2 border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 @error('pasien_id') border-red-500 @enderror">
                    <option value="">-- Pilih Pasien --</option>
                    @foreach($pasiens as $pasien)
                        <option value="{{ $pasien->pasien_id }}">{{ $pasien->nama }} ({{ $pasien->no_rekam_medis }})</option>
                    @endforeach
                </select>
                @error('pasien_id') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
            </div>
            <div class="mb-5">
                <label class="block text-sm font-medium text-gray-700 mb-1">Pernah Menerima ART? <span class="text-red-500">*</span></label>
                <select wire:model.live="pernah_menerima" class="w-full px-3 py-2 border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="Tidak">Tidak</option>
                    <option value="Ya">Ya</option>
                </select>
            </div>

            @if($pernah_menerima === 'Ya')
            <div class="mb-5">
                <label class="block text-sm font-medium text-gray-700 mb-1">Jenis Terapi ART <span class="text-red-500">*</span></label>
                <select wire:model="jenis_terapi_id_art" class="w-full px-3 py-2 border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 @error('jenis_terapi_id_art') border-red-500 @enderror">
                    <option value="">-- Pilih Jenis Terapi --</option>
                    @foreach($jenisTerapiList as $jt)
                        <option value="{{ $jt->id }}">{{ $jt->nama }}</option>
                    @endforeach
                </select>
                @error('jenis_terapi_id_art') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
            </div>
            <div class="mb-5">
                <label class="block text-sm font-medium text-gray-700 mb-1">Tempat ART <span class="text-red-500">*</span></label>
                <select wire:model="tempat_terapi_id" class="w-full px-3 py-2 border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 @error('tempat_terapi_id') border-red-500 @enderror">
                    <option value="">-- Pilih Tempat --</option>
                    @foreach($tempatTerapiList as $tt)
                        <option value="{{ $tt->id }}">{{ $tt->nama }}</option>
                    @endforeach
                </select>
                @error('tempat_terapi_id') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
            </div>
            <div class="mb-5">
                <label class="block text-sm font-medium text-gray-700 mb-1">Paduan ART <span class="text-red-500">*</span></label>
                <select wire:model="paduan_art_id" class="w-full px-3 py-2 border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 @error('paduan_art_id') border-red-500 @enderror">
                    <option value="">-- Pilih Paduan ART --</option>
                    @foreach($paduanArtList as $pa)
                        <option value="{{ $pa->id }}">{{ $pa->nama }}</option>
                    @endforeach
                </select>
                @error('paduan_art_id') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
            </div>
            <div class="mb-5">
                <label class="block text-sm font-medium text-gray-700 mb-1">Dosis ART <span class="text-red-500">*</span></label>
                <input type="text" wire:model="dosis_art" class="w-full px-3 py-2 border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 @error('dosis_art') border-red-500 @enderror">
                @error('dosis_art') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
            </div>
            <div class="mb-5">
                <label class="block text-sm font-medium text-gray-700 mb-1">Lama Penggunaan <span class="text-red-500">*</span></label>
                <input type="text" wire:model="lama_penggunaan" class="w-full px-3 py-2 border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 @error('lama_penggunaan') border-red-500 @enderror">
                @error('lama_penggunaan') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
            </div>
            @endif

            <div class="flex gap-3">
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white text-sm rounded-lg hover:bg-blue-700">Simpan</button>
                <a href="{{ route('riwayat-terapi-art.index') }}" class="px-4 py-2 bg-gray-100 text-gray-700 text-sm rounded-lg hover:bg-gray-200">Batal</a>
            </div>
        </form>
    </div>
</div>
