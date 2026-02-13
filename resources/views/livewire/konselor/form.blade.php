<div>
    <h2 class="text-xl font-bold mb-4">{{ $id_konselor ? 'Edit' : 'Tambah' }} Konselor</h2>
    <form wire:submit.prevent="save">
        <div class="mb-4">
            <label class="block mb-1">Nama</label>
            <input type="text" wire:model="nama" class="border rounded px-2 py-1 w-full" required />
            @error('nama') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label class="block mb-1">Email</label>
            <input type="email" wire:model="email" class="border rounded px-2 py-1 w-full" required />
            @error('email') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label class="block mb-1">Alamat</label>
            <input type="text" wire:model="alamat" class="border rounded px-2 py-1 w-full" required />
            @error('alamat') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label class="block mb-1">No HP</label>
            <input type="text" wire:model="no_hp" class="border rounded px-2 py-1 w-full" required />
            @error('no_hp') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label class="block mb-1">NIK</label>
            <input type="text" wire:model="nik" class="border rounded px-2 py-1 w-full" required />
            @error('nik') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label class="block mb-1">NIP</label>
            <input type="text" wire:model="nip" class="border rounded px-2 py-1 w-full" required />
            @error('nip') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label class="block mb-1">Jenis Kelamin</label>
            <select wire:model="jenis_kelamin" class="border rounded px-2 py-1 w-full" required>
                <option value="">Pilih Jenis Kelamin</option>
                <option value="L">Laki-laki</option>
                <option value="P">Perempuan</option>
            </select>
            @error('jenis_kelamin') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label class="block mb-1">Tempat Lahir</label>
            <input type="text" wire:model="tempat_lahir" class="border rounded px-2 py-1 w-full" required />
            @error('tempat_lahir') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label class="block mb-1">Tanggal Lahir</label>
            <input type="date" wire:model="tanggal_lahir" class="border rounded px-2 py-1 w-full" required />
            @error('tanggal_lahir') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label class="block mb-1">Pendidikan</label>
            <select wire:model="id_pendidikan" class="border rounded px-2 py-1 w-full" required>
                <option value="">Pilih Pendidikan</option>
                @foreach($pendidikan as $p)
                    <option value="{{ $p->id_pendidikan }}">{{ $p->nama }}</option>
                @endforeach
            </select>
            @error('id_pendidikan') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label class="block mb-1">Tanggal Sertifikasi</label>
            <input type="date" wire:model="tanggal_sertifikasi" class="border rounded px-2 py-1 w-full" required />
            @error('tanggal_sertifikasi') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label class="block mb-1">Status Pegawai</label>
            <input type="text" wire:model="status_pegawai" class="border rounded px-2 py-1 w-full" required />
            @error('status_pegawai') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label class="block mb-1">Status Pernikahan</label>
            <select wire:model="id_status_pernikahan" class="border rounded px-2 py-1 w-full" required>
                <option value="">Pilih Status Pernikahan</option>
                @foreach($statusPernikahan as $s)
                    <option value="{{ $s->id_status_pernikahan }}">{{ $s->nama }}</option>
                @endforeach
            </select>
            @error('id_status_pernikahan') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
        <a href="{{ route('konselor.index') }}" class="ml-2 text-gray-600">Batal</a>
    </form>
</div>
