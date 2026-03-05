<div>
    <h2 class="text-xl font-semibold text-gray-800 mb-2 text-center">Konfirmasi Password</h2>
    <p class="text-sm text-gray-500 text-center mb-6">
        Demi keamanan, masukkan password Anda untuk melanjutkan.
    </p>

    <form wire:submit.prevent="confirmPassword" class="space-y-4">
        <!-- Password -->
        <div>
            <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
            <input type="password" id="password" wire:model="password"
                   class="w-full border rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400 @error('password') border-red-500 @enderror"
                   placeholder="••••••••" autocomplete="current-password" autofocus>
            @error('password')
                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Submit -->
        <button type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg transition text-sm">
            <span wire:loading.remove wire:target="confirmPassword">Konfirmasi</span>
            <span wire:loading wire:target="confirmPassword">Memproses...</span>
        </button>
    </form>
</div>
