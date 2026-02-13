<div>
    <h2 class="text-xl font-bold mb-4">{{ $id_pengobatan_tb_hiv ? 'Edit' : 'Tambah' }} Pengobatan TB Pasien</h2>
    <form wire:submit.prevent="save">
        <div class="mb-4">
            <label class="block mb-1">Pasien</label>
            <select wire:model="id_pasien" class="border rounded px-2 py-1 w-full" required>
                <option value="">Pilih Pasien</option>
                @foreach($pasiens as $pasien)
                    <option value="{{ $pasien->id_pasien }}">{{ $pasien->nama }}</option>
                @endforeach
            </select>
            @error('id_pasien') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label class="block mb-1">Tipe TB</label>
            <select wire:model="id_tipe_tb" class="border rounded px-2 py-1 w-full" required>
                <option value="">Pilih Tipe TB</option>
                @foreach($tipeTbs as $tipe)
                    <option value="{{ $tipe->id_tipe_tb }}">{{ $tipe->nama }}</option>
                @endforeach
            </select>
            @error('id_tipe_tb') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label class="block mb-1">Klasifikasi TB</label>
            <select wire:model="id_klasifikasi_tb" class="border rounded px-2 py-1 w-full" required>
                <option value="">Pilih Klasifikasi TB</option>
                @foreach($klasifikasiTbs as $klasifikasi)
                    <option value="{{ $klasifikasi->id_klasifikasi_tb }}">{{ $klasifikasi->nama }}</option>
                @endforeach
            </select>
            @error('id_klasifikasi_tb') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label class="block mb-1">Panduan TB</label>
            <select wire:model="id_paduan_tb" class="border rounded px-2 py-1 w-full" required>
                <option value="">Pilih Panduan TB</option>
                @foreach($paduanTbs as $paduan)
                    <option value="{{ $paduan->id_paduan_tb }}">{{ $paduan->nama }}</option>
                @endforeach
            </select>
            @error('id_paduan_tb') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label class="block mb-1">Kabupaten Pengobatan</label>
            <select wire:model="id_kabupaten_pengobatan" class="border rounded px-2 py-1 w-full" required>
                <option value="">Pilih Kabupaten</option>
                @foreach($kabupatens as $kabupaten)
                    <option value="{{ $kabupaten->id_kabupaten }}">{{ $kabupaten->nama }}</option>
                @endforeach
            </select>
            @error('id_kabupaten_pengobatan') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label class="block mb-1">Nama Sarana Kesehatan</label>
            <input type="text" wire:model="nama_sarana_kesehatan" class="border rounded px-2 py-1 w-full" required />
            @error('nama_sarana_kesehatan') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label class="block mb-1">No REG TB</label>
            <input type="text" wire:model="no_reg_tb" class="border rounded px-2 py-1 w-full" required />
            @error('no_reg_tb') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label class="block mb-1">Tanggal Mulai Terapi</label>
            <input type="date" wire:model="tanggal_mulai_terapi" class="border rounded px-2 py-1 w-full" required />
            @error('tanggal_mulai_terapi') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label class="block mb-1">Tanggal Selesai Terapi</label>
            <input type="date" wire:model="tanggal_selesai_terapi" class="border rounded px-2 py-1 w-full" />
            @error('tanggal_selesai_terapi') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label class="block mb-1">Lokasi TB</label>
            <input type="text" wire:model="lokasi_tb" class="border rounded px-2 py-1 w-full" />
            @error('lokasi_tb') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
        <a href="{{ route('pengobatan-tb-hiv.index') }}" class="ml-2 text-gray-600">Batal</a>
    </form>
</div>
