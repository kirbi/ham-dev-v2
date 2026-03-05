<div>
    <h2 class="text-xl font-semibold text-gray-800 mb-2 text-center">Verifikasi Email</h2>
    <p class="text-sm text-gray-500 text-center mb-6">
        Kami telah mengirimkan link verifikasi ke email Anda. Silakan cek inbox atau folder spam.
    </p>

    @if (session()->has('status'))
        <div class="mb-4 p-3 bg-green-50 border border-green-200 text-green-700 rounded-lg text-sm">
            {{ session('status') }}
        </div>
    @endif

    <div class="space-y-3">
        <!-- Resend -->
        <button wire:click="resendVerification"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg transition text-sm">
            <span wire:loading.remove wire:target="resendVerification">Kirim Ulang Email Verifikasi</span>
            <span wire:loading wire:target="resendVerification">Mengirim...</span>
        </button>

        <!-- Logout -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                    class="w-full bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium py-2 px-4 rounded-lg transition text-sm">
                Keluar
            </button>
        </form>
    </div>
</div>
