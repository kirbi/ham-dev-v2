{{-- filepath: resources/views/livewire/pasien/form.blade.php --}}
<div>
    <!-- Page Header -->
    <div class="mb-6">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-3xl font-bold text-gray-900 dark:text-white">
                    {{ $pasienId ? 'Edit Pasien' : 'Tambah Pasien' }}
                </h1>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                    {{ $pasienId ? 'Perbarui informasi pasien' : 'Tambahkan pasien baru ke sistem' }}
                </p>
            </div>
            <a href="{{ route('pasien.index') }}" 
               class="inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white text-sm font-medium rounded-lg transition-colors">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Kembali
            </a>
        </div>
    </div>

    <!-- Form -->
    <form wire:submit="save">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow">
            <!-- Data Identitas -->
            <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Data Identitas</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- No. Reg Nasional -->
                    <div>
                        <label for="no_reg_nasional" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                            No. Registrasi Nasional <span class="text-red-500">*</span>
                        </label>
                        <input type="text" 
                               wire:model="no_reg_nasional" 
                               id="no_reg_nasional"
                               class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white @error('no_reg_nasional') border-red-500 @enderror">
                        @error('no_reg_nasional') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                    </div>

                    <!-- No. Rekam Medis -->
                    <div>
                        <label for="no_rekam_medis" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                            No. Rekam Medis <span class="text-red-500">*</span>
                        </label>
                        <input type="text" 
                               wire:model="no_rekam_medis" 
                               id="no_rekam_medis"
                               class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white @error('no_rekam_medis') border-red-500 @enderror">
                        @error('no_rekam_medis') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                    </div>

                    <!-- NIK -->
                    <div>
                        <label for="nik" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                            NIK <span class="text-red-500">*</span>
                        </label>
                        <input type="text" 
                               wire:model="nik" 
                               id="nik"
                               maxlength="16"
                               class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white @error('nik') border-red-500 @enderror">
                        @error('nik') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                    </div>

                    <!-- No. KK -->
                    <div>
                        <label for="no_kk" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                            No. KK <span class="text-red-500">*</span>
                        </label>
                        <input type="text" 
                               wire:model="no_kk" 
                               id="no_kk"
                               class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white @error('no_kk') border-red-500 @enderror">
                        @error('no_kk') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                    </div>

                    <!-- No. BPJS -->
                    <div>
                        <label for="no_bpjs" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                            No. BPJS
                        </label>
                        <input type="text" 
                               wire:model="no_bpjs" 
                               id="no_bpjs"
                               class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white @error('no_bpjs') border-red-500 @enderror">
                        @error('no_bpjs') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>

            <!-- Data Pribadi -->
            <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Data Pribadi</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Nama -->
                    <div class="md:col-span-2">
                        <label for="nama" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                            Nama Lengkap <span class="text-red-500">*</span>
                        </label>
                        <input type="text" 
                               wire:model="nama" 
                               id="nama"
                               class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white @error('nama') border-red-500 @enderror">
                        @error('nama') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                    </div>

                    <!-- Tempat Lahir -->
                    <div>
                        <label for="tempat_lahir" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                            Tempat Lahir <span class="text-red-500">*</span>
                        </label>
                        <input type="text" 
                               wire:model="tempat_lahir" 
                               id="tempat_lahir"
                               class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white @error('tempat_lahir') border-red-500 @enderror">
                        @error('tempat_lahir') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                    </div>

                    <!-- Tanggal Lahir -->
                    <div>
                        <label for="tanggal_lahir" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                            Tanggal Lahir <span class="text-red-500">*</span>
                        </label>
                        <input type="date" 
                               wire:model="tanggal_lahir" 
                               id="tanggal_lahir"
                               class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white @error('tanggal_lahir') border-red-500 @enderror">
                        @error('tanggal_lahir') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                    </div>

                    <!-- Jenis Kelamin -->
                    <div>
                        <label for="jenis_kelamin" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                            Jenis Kelamin <span class="text-red-500">*</span>
                        </label>
                        <select wire:model="jenis_kelamin" 
                                id="jenis_kelamin"
                                class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white @error('jenis_kelamin') border-red-500 @enderror">
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                        @error('jenis_kelamin') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                    </div>

                    <!-- Agama -->
                    <div>
                        <label for="agama" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                            Agama <span class="text-red-500">*</span>
                        </label>
                        <select wire:model="agama" 
                                id="agama"
                                class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white @error('agama') border-red-500 @enderror">
                            <option value="">Pilih Agama</option>
                            <option value="Islam">Islam</option>
                            <option value="Kristen">Kristen</option>
                            <option value="Katolik">Katolik</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Buddha">Buddha</option>
                            <option value="Konghucu">Konghucu</option>
                        </select>
                        @error('agama') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                    </div>

                    <!-- Nama Ibu Kandung -->
                    <div>
                        <label for="ibu_kandung" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                            Nama Ibu Kandung
                        </label>
                        <input type="text" 
                               wire:model="ibu_kandung" 
                               id="ibu_kandung"
                               class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white">
                    </div>

                    <!-- Pendidikan -->
                    <div>
                        <label for="pendidikan_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                            Pendidikan Terakhir <span class="text-red-500">*</span>
                        </label>
                        <select wire:model="pendidikan_id" 
                                id="pendidikan_id"
                                class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white @error('pendidikan_id') border-red-500 @enderror">
                            <option value="">Pilih Pendidikan</option>
                            @foreach($pendidikans as $pendidikan)
                                <option value="{{ $pendidikan->id }}">{{ $pendidikan->nama }}</option>
                            @endforeach
                        </select>
                        @error('pendidikan_id') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                    </div>

                    <!-- Pekerjaan -->
                    <div>
                        <label for="pekerjaan_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                            Pekerjaan <span class="text-red-500">*</span>
                        </label>
                        <select wire:model="pekerjaan_id" 
                                id="pekerjaan_id"
                                class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white @error('pekerjaan_id') border-red-500 @enderror">
                            <option value="">Pilih Pekerjaan</option>
                            @foreach($pekerjaans as $pekerjaan)
                                <option value="{{ $pekerjaan->id }}">{{ $pekerjaan->nama }}</option>
                            @endforeach
                        </select>
                        @error('pekerjaan_id') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                    </div>

                    <!-- Status Pernikahan -->
                    <div>
                        <label for="status_pernikahan_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                            Status Pernikahan <span class="text-red-500">*</span>
                        </label>
                        <select wire:model="status_pernikahan_id" 
                                id="status_pernikahan_id"
                                class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white @error('status_pernikahan_id') border-red-500 @enderror">
                            <option value="">Pilih Status</option>
                            @foreach($statusPernikahans as $status)
                                <option value="{{ $status->id }}">{{ $status->nama }}</option>
                            @endforeach
                        </select>
                        @error('status_pernikahan_id') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>

            <!-- Data Kontak & Alamat -->
            <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Data Kontak & Alamat</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- No HP -->
                    <div>
                        <label for="no_hp" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                            No. HP <span class="text-red-500">*</span>
                        </label>
                        <input type="text" 
                               wire:model="no_hp" 
                               id="no_hp"
                               class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white @error('no_hp') border-red-500 @enderror">
                        @error('no_hp') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                    </div>

                    <!-- Tempat Tinggal -->
                    <div>
                        <label for="tempat_tinggal" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                            Tempat Tinggal
                        </label>
                        <input type="text" 
                               wire:model="tempat_tinggal" 
                               id="tempat_tinggal"
                               class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white">
                    </div>

                    <!-- Alamat -->
                    <div class="md:col-span-2">
                        <label for="alamat" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                            Alamat Lengkap <span class="text-red-500">*</span>
                        </label>
                        <textarea wire:model="alamat" 
                                  id="alamat"
                                  rows="3"
                                  class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white @error('alamat') border-red-500 @enderror"></textarea>
                        @error('alamat') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                    </div>

                    <!-- Provinsi -->
                    <div>
                        <label for="provinsi_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                            Provinsi
                        </label>
                        <select wire:model.live="provinsi_id" 
                                id="provinsi_id"
                                class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white">
                            <option value="">Pilih Provinsi</option>
                            @foreach($provinsis as $provinsi)
                                <option value="{{ $provinsi->id }}">{{ $provinsi->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Kabupaten -->
                    <div>
                        <label for="kabupaten_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                            Kabupaten/Kota
                        </label>
                        <select wire:model.live="kabupaten_id" 
                                id="kabupaten_id"
                                class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white"
                                {{ !$provinsi_id ? 'disabled' : '' }}>
                            <option value="">Pilih Kabupaten/Kota</option>
                            @foreach($kabupatens as $kabupaten)
                                <option value="{{ $kabupaten->id }}">{{ $kabupaten->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Kecamatan -->
                    <div>
                        <label for="kecamatan_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                            Kecamatan
                        </label>
                        <select wire:model.live="kecamatan_id" 
                                id="kecamatan_id"
                                class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white"
                                {{ !$kabupaten_id ? 'disabled' : '' }}>
                            <option value="">Pilih Kecamatan</option>
                            @foreach($kecamatans as $kecamatan)
                                <option value="{{ $kecamatan->id }}">{{ $kecamatan->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Desa -->
                    <div>
                        <label for="desa_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                            Desa/Kelurahan
                        </label>
                        <select wire:model="desa_id" 
                                id="desa_id"
                                class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white"
                                {{ !$kecamatan_id ? 'disabled' : '' }}>
                            <option value="">Pilih Desa/Kelurahan</option>
                            @foreach($desas as $desa)
                                <option value="{{ $desa->id }}">{{ $desa->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <!-- Data Konselor & Status -->
            <div class="p-6">
                <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Data Konselor & Status</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Konselor -->
                    <div>
                        <label for="konselor_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                            Konselor <span class="text-red-500">*</span>
                        </label>
                        <select wire:model="konselor_id" 
                                id="konselor_id"
                                class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white @error('konselor_id') border-red-500 @enderror">
                            <option value="">Pilih Konselor</option>
                            @foreach($konselors as $konselor)
                                <option value="{{ $konselor->id }}">{{ $konselor->nama }}</option>
                            @endforeach
                        </select>
                        @error('konselor_id') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                    </div>

                    <!-- Jenis Pasien -->
                    <div>
                        <label for="jenis_pasien" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                            Jenis Pasien
                        </label>
                        <select wire:model="jenis_pasien" 
                                id="jenis_pasien"
                                class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white">
                            <option value="">Pilih Jenis</option>
                            <option value="baru">Baru</option>
                            <option value="lama">Lama</option>
                            <option value="rujukan">Rujukan</option>
                        </select>
                    </div>

                    <!-- Status Aktif -->
                    <div>
                        <label for="status_aktif" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                            Status
                        </label>
                        <select wire:model="status_aktif" 
                                id="status_aktif"
                                class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white">
                            <option value="aktif">Aktif</option>
                            <option value="tidak_aktif">Tidak Aktif</option>
                            <option value="meninggal">Meninggal</option>
                        </select>
                    </div>

                    <!-- Tanggal Masuk -->
                    <div>
                        <label for="tanggal_masuk" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                            Tanggal Masuk
                        </label>
                        <input type="date" 
                               wire:model="tanggal_masuk" 
                               id="tanggal_masuk"
                               class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white">
                    </div>
                </div>
            </div>

            <!-- Form Actions -->
            <div class="px-6 py-4 bg-gray-50 dark:bg-gray-700 flex justify-end gap-3">
                <a href="{{ route('pasien.index') }}" 
                   class="px-6 py-2 bg-gray-500 hover:bg-gray-600 text-white font-medium rounded-lg transition-colors">
                    Batal
                </a>
                <button type="submit" 
                        class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors">
                    <span wire:loading.remove wire:target="save">
                        {{ $pasienId ? 'Update' : 'Simpan' }}
                    </span>
                    <span wire:loading wire:target="save">
                        Menyimpan...
                    </span>
                </button>
            </div>
        </div>
    </form>
</div>
