<div>
    <h2 class="text-xl font-bold mb-6">Profil Akun</h2>

    @if (session()->has('success'))
        <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">{{ session('success') }}</div>
    @endif

    <form wire:submit.prevent="save" class="max-w-lg">
        <div class="mb-4">
            <label class="block font-medium mb-1">Nama <span class="text-red-500">*</span></label>
            <input type="text" wire:model="name" class="border rounded px-3 py-2 w-full" />
            @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label class="block font-medium mb-1">Email <span class="text-red-500">*</span></label>
            <input type="email" wire:model="email" class="border rounded px-3 py-2 w-full" />
            @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <hr class="my-6" />
        <p class="text-gray-500 text-sm mb-4">Isi form berikut hanya jika ingin mengganti password.</p>

        <div class="mb-4">
            <label class="block font-medium mb-1">Password Lama</label>
            <input type="password" wire:model="password_lama" class="border rounded px-3 py-2 w-full" autocomplete="current-password" />
            @error('password_lama') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label class="block font-medium mb-1">Password Baru (min. 8 karakter)</label>
            <input type="password" wire:model="password_baru" class="border rounded px-3 py-2 w-full" autocomplete="new-password" />
            @error('password_baru') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label class="block font-medium mb-1">Konfirmasi Password Baru</label>
            <input type="password" wire:model="password_baru_confirmation" class="border rounded px-3 py-2 w-full" autocomplete="new-password" />
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan Perubahan</button>
    </form>
</div>
