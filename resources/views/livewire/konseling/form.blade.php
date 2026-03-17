{{-- filepath: resources/views/livewire/konseling/form.blade.php --}}
<div>
    <div class="mb-6">
        <h1 class="text-3xl font-bold">{{ $konselingId ? 'Edit Konseling' : 'Tambah Konseling' }}</h1>
    </div>
    <form wire:submit="save">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="pasien_id">Pasien</label>
                <input type="text" id="pasien_id" wire:model="pasien_id" class="w-full px-4 py-2 border rounded-lg" readonly>
            </div>
            <div>
                <label for="tanggal_konseling">Tanggal Konseling</label>
                <input type="date" id="tanggal_konseling" wire:model="tanggal_konseling" class="w-full px-4 py-2 border rounded-lg">
            </div>
            <div>
                <label for="kabupaten_id">Kabupaten</label>
                <select id="kabupaten_id" wire:model="kabupaten_id" class="w-full px-4 py-2 border rounded-lg">
                    <option value="">Pilih Kabupaten</option>
                    @foreach($kabupatens as $kabupaten)
                        <option value="{{ $kabupaten->kabupaten_id }}">{{ $kabupaten->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="konselor_id">Konselor</label>
                <select id="konselor_id" wire:model="konselor_id" class="w-full px-4 py-2 border rounded-lg">
                    <option value="">Pilih Konselor</option>
                    @foreach($konselors as $konselor)
                        <option value="{{ $konselor->id }}">{{ $konselor->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="pendidikan_id">Pendidikan</label>
                <select id="pendidikan_id" wire:model="pendidikan_id" class="w-full px-4 py-2 border rounded-lg">
                    <option value="">Pilih Pendidikan</option>
                    @foreach($pendidikans as $pendidikan)
                        <option value="{{ $pendidikan->id }}">{{ $pendidikan->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="pekerjaan_id">Pekerjaan</label>
                <select id="pekerjaan_id" wire:model="pekerjaan_id" class="w-full px-4 py-2 border rounded-lg">
                    <option value="">Pilih Pekerjaan</option>
                    @foreach($pekerjaans as $pekerjaan)
                        <option value="{{ $pekerjaan->id }}">{{ $pekerjaan->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="status_pernikahan_id">Status Pernikahan</label>
                <select id="status_pernikahan_id" wire:model="status_pernikahan_id" class="w-full px-4 py-2 border rounded-lg">
                    <option value="">Pilih Status</option>
                    @foreach($statusPernikahans as $status)
                        <option value="{{ $status->id }}">{{ $status->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="alasan_tes_hiv_id">Alasan Tes HIV</label>
                <select id="alasan_tes_hiv_id" wire:model="alasan_tes_hiv_id" class="w-full px-4 py-2 border rounded-lg">
                    <option value="">Pilih Alasan</option>
                    @foreach($alasanTesHivs as $alasan)
                        <option value="{{ $alasan->alasan_tes_hiv_id }}">{{ $alasan->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="alamat">Alamat</label>
                <input type="text" id="alamat" wire:model="alamat" class="w-full px-4 py-2 border rounded-lg">
            </div>
            <div>
                <label for="no_registrasi">No Registrasi</label>
                <input type="text" id="no_registrasi" wire:model="no_registrasi" class="w-full px-4 py-2 border rounded-lg">
            </div>
            <div>
                <label for="status_pasien">Status Pasien</label>
                <input type="text" id="status_pasien" wire:model="status_pasien" class="w-full px-4 py-2 border rounded-lg">
            </div>
        </div>
        <div class="mt-6 flex justify-end gap-3">
            <a href="{{ route('konseling.index') }}" class="px-6 py-2 bg-gray-500 text-white rounded-lg">Batal</a>
            <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg">{{ $konselingId ? 'Update' : 'Simpan' }}</button>
        </div>
    </form>
</div>
