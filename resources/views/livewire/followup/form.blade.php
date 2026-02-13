{{-- filepath: resources/views/livewire/followup/form.blade.php --}}
<div>
    <div class="mb-6">
        <h1 class="text-3xl font-bold">{{ $followupId ? 'Edit Follow Up' : 'Tambah Follow Up' }}</h1>
    </div>
    <form wire:submit="save">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="id_pasien">Pasien</label>
                <input type="text" id="id_pasien" wire:model="id_pasien" class="w-full px-4 py-2 border rounded-lg" readonly>
            </div>
            <div>
                <label for="tanggal_pengobatan">Tanggal Pengobatan</label>
                <input type="date" id="tanggal_pengobatan" wire:model="tanggal_pengobatan" class="w-full px-4 py-2 border rounded-lg">
            </div>
            <div>
                <label for="rencana_kunjungan_selanjutnya">Rencana Kunjungan Selanjutnya</label>
                <input type="date" id="rencana_kunjungan_selanjutnya" wire:model="rencana_kunjungan_selanjutnya" class="w-full px-4 py-2 border rounded-lg">
            </div>
            <div>
                <label for="sisa_obat">Sisa Obat</label>
                <input type="text" id="sisa_obat" wire:model="sisa_obat" class="w-full px-4 py-2 border rounded-lg">
            </div>
            <div>
                <label for="berat_badan">Berat Badan</label>
                <input type="number" id="berat_badan" wire:model="berat_badan" class="w-full px-4 py-2 border rounded-lg">
            </div>
            <div>
                <label for="id_status_tb">Status TB</label>
                <select id="id_status_tb" wire:model="id_status_tb" class="w-full px-4 py-2 border rounded-lg">
                    <option value="">Pilih Status TB</option>
                    @foreach($statusTbs as $tb)
                        <option value="{{ $tb->id_status_tb }}">{{ $tb->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="id_paduan_art">Paduan ART</label>
                <select id="id_paduan_art" wire:model="id_paduan_art" class="w-full px-4 py-2 border rounded-lg">
                    <option value="">Pilih Paduan ART</option>
                    @foreach($paduanArts as $art)
                        <option value="{{ $art->id_paduan_art }}">{{ $art->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="diberi_kondom">Diberi Kondom</label>
                <select id="diberi_kondom" wire:model="diberi_kondom" class="w-full px-4 py-2 border rounded-lg">
                    <option value="">Pilih</option>
                    <option value="ya">Ya</option>
                    <option value="tidak">Tidak</option>
                </select>
            </div>
            <div>
                <label for="id_status_fungsional">Status Fungsional</label>
                <select id="id_status_fungsional" wire:model="id_status_fungsional" class="w-full px-4 py-2 border rounded-lg">
                    <option value="">Pilih Status Fungsional</option>
                    @foreach($statusFungsionals as $sf)
                        <option value="{{ $sf->id_status_fungsional }}">{{ $sf->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="jumlah_cd4">Jumlah CD4</label>
                <input type="number" id="jumlah_cd4" wire:model="jumlah_cd4" class="w-full px-4 py-2 border rounded-lg">
            </div>
            <div>
                <label for="viral_load">Viral Load</label>
                <input type="number" id="viral_load" wire:model="viral_load" class="w-full px-4 py-2 border rounded-lg">
            </div>
        </div>
        <div class="mt-6 flex justify-end gap-3">
            <a href="{{ route('followup.index') }}" class="px-6 py-2 bg-gray-500 text-white rounded-lg">Batal</a>
            <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg">{{ $followupId ? 'Update' : 'Simpan' }}</button>
        </div>
    </form>
</div>
