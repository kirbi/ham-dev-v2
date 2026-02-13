{{-- filepath: resources/views/livewire/konseling/form.blade.php --}}
<div>
    <div class="mb-6">
        <h1 class="text-3xl font-bold">{{ $konselingId ? 'Edit Konseling' : 'Tambah Konseling' }}</h1>
    </div>
    <form wire:submit="save">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="id_pasien">Pasien</label>
                <input type="text" id="id_pasien" wire:model="id_pasien" class="w-full px-4 py-2 border rounded-lg" readonly>
            </div>
            <div>
                <label for="tanggal_konseling">Tanggal Konseling</label>
                <input type="date" id="tanggal_konseling" wire:model="tanggal_konseling" class="w-full px-4 py-2 border rounded-lg">
            </div>
            <div>
                <label for="id_kabupaten">Kabupaten</label>
                <select id="id_kabupaten" wire:model="id_kabupaten" class="w-full px-4 py-2 border rounded-lg">
                    <option value="">Pilih Kabupaten</option>
                    @foreach($kabupatens as $kabupaten)
                        <option value="{{ $kabupaten->id_kabupaten }}">{{ $kabupaten->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="id_konselor">Konselor</label>
                <select id="id_konselor" wire:model="id_konselor" class="w-full px-4 py-2 border rounded-lg">
                    <option value="">Pilih Konselor</option>
                    @foreach($konselors as $konselor)
                        <option value="{{ $konselor->id }}">{{ $konselor->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="id_pendidikan">Pendidikan</label>
                <select id="id_pendidikan" wire:model="id_pendidikan" class="w-full px-4 py-2 border rounded-lg">
                    <option value="">Pilih Pendidikan</option>
                    @foreach($pendidikans as $pendidikan)
                        <option value="{{ $pendidikan->id }}">{{ $pendidikan->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="id_pekerjaan">Pekerjaan</label>
                <select id="id_pekerjaan" wire:model="id_pekerjaan" class="w-full px-4 py-2 border rounded-lg">
                    <option value="">Pilih Pekerjaan</option>
                    @foreach($pekerjaans as $pekerjaan)
                        <option value="{{ $pekerjaan->id }}">{{ $pekerjaan->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="id_status_pernikahan">Status Pernikahan</label>
                <select id="id_status_pernikahan" wire:model="id_status_pernikahan" class="w-full px-4 py-2 border rounded-lg">
                    <option value="">Pilih Status</option>
                    @foreach($statusPernikahans as $status)
                        <option value="{{ $status->id }}">{{ $status->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="id_alasan_tes_hiv">Alasan Tes HIV</label>
                <select id="id_alasan_tes_hiv" wire:model="id_alasan_tes_hiv" class="w-full px-4 py-2 border rounded-lg">
                    <option value="">Pilih Alasan</option>
                    @foreach($alasanTesHivs as $alasan)
                        <option value="{{ $alasan->id_alasan_tes_hiv }}">{{ $alasan->nama }}</option>
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
