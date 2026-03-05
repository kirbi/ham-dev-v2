<div>
    <h2 class="text-2xl font-bold mb-6">Dashboard</h2>

    @if (session()->has('success'))
        <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">{{ session('success') }}</div>
    @endif

    {{-- Summary Cards --}}
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
        <div class="bg-blue-500 text-white rounded-lg p-4 shadow">
            <div class="text-3xl font-bold">{{ $stats['aktif'] }}</div>
            <div class="text-sm mt-1">Pasien Aktif</div>
        </div>
        <div class="bg-gray-500 text-white rounded-lg p-4 shadow">
            <div class="text-3xl font-bold">{{ $stats['tidakAktif'] }}</div>
            <div class="text-sm mt-1">Pasien Tidak Aktif</div>
        </div>
        <div class="bg-yellow-500 text-white rounded-lg p-4 shadow">
            <div class="text-3xl font-bold">{{ $stats['dirujuk'] }}</div>
            <div class="text-sm mt-1">Dirujuk</div>
        </div>
        <div class="bg-red-600 text-white rounded-lg p-4 shadow">
            <div class="text-3xl font-bold">{{ $stats['meninggal'] }}</div>
            <div class="text-sm mt-1">Meninggal</div>
        </div>
        <div class="bg-green-500 text-white rounded-lg p-4 shadow">
            <div class="text-3xl font-bold">{{ $stats['pasienBaru'] }}</div>
            <div class="text-sm mt-1">Pasien Baru</div>
        </div>
        <div class="bg-indigo-500 text-white rounded-lg p-4 shadow">
            <div class="text-3xl font-bold">{{ $stats['pasienRujukan'] }}</div>
            <div class="text-sm mt-1">Pasien Rujukan</div>
        </div>
        <div class="bg-orange-500 text-white rounded-lg p-4 shadow">
            <div class="text-3xl font-bold">{{ $stats['hivtb'] }}</div>
            <div class="text-sm mt-1">HIV-TB (Sedang)</div>
        </div>
        <div class="bg-teal-500 text-white rounded-lg p-4 shadow">
            <div class="text-3xl font-bold">{{ $stats['tb'] }}</div>
            <div class="text-sm mt-1">Total HIV-TB</div>
        </div>
    </div>

    {{-- Follow-up Sections --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        {{-- Akan Follow-up --}}
        <div class="bg-white rounded-lg shadow p-4">
            <h3 class="text-lg font-semibold mb-3">
                Akan Follow-up
                <span class="bg-blue-100 text-blue-800 text-sm font-medium px-2 py-0.5 rounded ml-2">{{ $stats['jumlahPasienAkanFollowup'] }}</span>
            </h3>
            @if($stats['pasienAkanFollowup']->count())
            <table class="min-w-full text-sm">
                <thead>
                    <tr class="bg-gray-50">
                        <th class="py-1 px-2 text-left">Nama Pasien</th>
                        <th class="py-1 px-2 text-left">Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($stats['pasienAkanFollowup'] as $f)
                    <tr class="border-t">
                        <td class="py-1 px-2">{{ $f->pasien->nama ?? '-' }}</td>
                        <td class="py-1 px-2">{{ $f->tanggal_followup ?? '-' }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
                <p class="text-gray-500 text-sm">Tidak ada pasien yang akan follow-up.</p>
            @endif
        </div>

        {{-- Telat Follow-up --}}
        <div class="bg-white rounded-lg shadow p-4">
            <h3 class="text-lg font-semibold mb-3 text-red-600">
                Telat Follow-up
                <span class="bg-red-100 text-red-800 text-sm font-medium px-2 py-0.5 rounded ml-2">{{ $stats['jumlahPasienTelatFollowup'] }}</span>
            </h3>
            @if($stats['pasienTelatFollowup']->count())
            <table class="min-w-full text-sm">
                <thead>
                    <tr class="bg-gray-50">
                        <th class="py-1 px-2 text-left">Nama Pasien</th>
                        <th class="py-1 px-2 text-left">Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($stats['pasienTelatFollowup'] as $f)
                    <tr class="border-t">
                        <td class="py-1 px-2">{{ $f->pasien->nama ?? '-' }}</td>
                        <td class="py-1 px-2">{{ $f->tanggal_followup ?? '-' }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
                <p class="text-gray-500 text-sm">Tidak ada pasien yang telat follow-up.</p>
            @endif
        </div>
    </div>
</div>
