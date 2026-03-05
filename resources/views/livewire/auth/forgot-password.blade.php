<div>
    <h2 class="text-xl font-semibold text-gray-800 mb-2 text-center">Lupa Password</h2>
    <p class="text-sm text-gray-500 text-center mb-6">
        Masukkan email Anda dan kami akan mengirimkan link untuk mereset password.
    </p>

    @if (session()->has('status'))
        <div class="mb-4 p-3 bg-green-50 border border-green-200 text-green-700 rounded-lg text-sm">
            {{ session('status') }}
        </div>
    @endif

    <form wire:submit.prevent="sendResetLink" class="space-y-4">
        <!-- Email -->
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
            <input type="email" id="email" wire:model.live="email"
                   class="w-full border rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400 @error('email') border-red-500 @enderror"
                   placeholder="email@contoh.com" autofocus>
            @error('email')
                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Submit -->
        <button type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg transition text-sm">
            <span wire:loading.remove wire:target="sendResetLink">Kirim Link Reset</span>
            <span wire:loading wire:target="sendResetLink">Mengirim...</span>
        </button>
    </form>

    <p class="mt-4 text-center text-sm text-gray-600">
        <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Kembali ke Login</a>
    </p>
</div>
