{{-- filepath: resources/views/components/sidebar.blade.php --}}
<aside id="sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0" aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-white">
        <ul class="space-y-2 font-medium">
            <!-- Dashboard -->
            <li>
                <a href="/" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group {{ request()->is('/') ? 'bg-gray-100' : '' }}">
                    <svg class="w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                    </svg>
                    <span class="ms-3">Dashboard</span>
                </a>
            </li>
            
            <!-- Pasien -->
            @can('view-pasien')
            <li>
                <a href="{{ route('pasien.index') }}" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group {{ request()->is('pasien*') ? 'bg-gray-100' : '' }}">
                    <svg class="w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"></path>
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Pasien</span>
                </a>
            </li>
            @endcan
            
            <!-- Follow Up -->
            @can('view-followup')
            <li>
                <a href="{{ route('followup.index') }}" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group {{ request()->is('followup*') ? 'bg-gray-100' : '' }}">
                    <svg class="w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Follow Up</span>
                </a>
            </li>
            @endcan
            
            <!-- Konseling -->
            @can('view-konseling')
            <li>
                <a href="{{ route('konseling.index') }}" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group {{ request()->is('konseling*') ? 'bg-gray-100' : '' }}">
                    <svg class="w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M2 5a2 2 0 012-2h7a2 2 0 012 2v4a2 2 0 01-2 2H9l-3 3v-3H4a2 2 0 01-2-2V5z"></path>
                        <path d="M15 7v2a4 4 0 01-4 4H9.828l-1.766 1.767c.28.149.599.233.938.233h2l3 3v-3h2a2 2 0 002-2V9a2 2 0 00-2-2h-1z"></path>
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Konseling</span>
                </a>
            </li>
            @endcan
            
            <!-- Data Klinis -->
            <li>
                <button type="button" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100"
                        aria-controls="dropdown-klinis" data-collapse-toggle="dropdown-klinis">
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-500 group-hover:text-gray-900" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                        <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="flex-1 ms-3 text-left whitespace-nowrap">Data Klinis</span>
                    <svg class="w-3 h-3" fill="none" viewBox="0 0 10 6"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/></svg>
                </button>
                <ul id="dropdown-klinis" class="{{ request()->is('followup*','konseling*','tes-hiv-konseling*','riwayat-terapi-art*','terapi-art-pasien*','check-hiv*','faktor-resiko-pasien*','info-tes-hiv-konseling*','kajian-resiko-hiv*','kelompok-resiko-konseling*','pemeriksaan-klinis*','pengobatan-tb-hiv*','rekap-tes-hiv-konseling*','riwayat-mitra-seksual*') ? '' : 'hidden' }} py-2 space-y-1">
                    <li><a href="{{ route('followup.index') }}" class="flex items-center w-full p-2 text-gray-700 rounded-lg pl-11 hover:bg-gray-100 {{ request()->is('followup*') ? 'font-semibold' : '' }}">Follow Up</a></li>
                    <li><a href="{{ route('konseling.index') }}" class="flex items-center w-full p-2 text-gray-700 rounded-lg pl-11 hover:bg-gray-100 {{ request()->is('konseling*') ? 'font-semibold' : '' }}">Konseling HIV</a></li>
                    <li><a href="{{ route('tes-hiv-konseling.index') }}" class="flex items-center w-full p-2 text-gray-700 rounded-lg pl-11 hover:bg-gray-100 {{ request()->is('tes-hiv-konseling*') ? 'font-semibold' : '' }}">Tes HIV Konseling</a></li>
                    <li><a href="{{ route('riwayat-terapi-art.index') }}" class="flex items-center w-full p-2 text-gray-700 rounded-lg pl-11 hover:bg-gray-100 {{ request()->is('riwayat-terapi-art*') ? 'font-semibold' : '' }}">Riwayat Terapi ART</a></li>
                    <li><a href="{{ route('terapi-art-pasien.index') }}" class="flex items-center w-full p-2 text-gray-700 rounded-lg pl-11 hover:bg-gray-100 {{ request()->is('terapi-art-pasien*') ? 'font-semibold' : '' }}">Terapi ART Pasien</a></li>
                    <li><a href="{{ route('check-hiv.index') }}" class="flex items-center w-full p-2 text-gray-700 rounded-lg pl-11 hover:bg-gray-100 {{ request()->is('check-hiv*') ? 'font-semibold' : '' }}">Check HIV</a></li>
                    <li><a href="{{ route('faktor-resiko-pasien.index') }}" class="flex items-center w-full p-2 text-gray-700 rounded-lg pl-11 hover:bg-gray-100 {{ request()->is('faktor-resiko-pasien*') ? 'font-semibold' : '' }}">Faktor Resiko Pasien</a></li>
                    <li><a href="{{ route('info-tes-hiv-konseling.index') }}" class="flex items-center w-full p-2 text-gray-700 rounded-lg pl-11 hover:bg-gray-100 {{ request()->is('info-tes-hiv-konseling*') ? 'font-semibold' : '' }}">Info Tes HIV</a></li>
                    <li><a href="{{ route('kajian-resiko-hiv.index') }}" class="flex items-center w-full p-2 text-gray-700 rounded-lg pl-11 hover:bg-gray-100 {{ request()->is('kajian-resiko-hiv*') ? 'font-semibold' : '' }}">Kajian Resiko HIV</a></li>
                    <li><a href="{{ route('kelompok-resiko-konseling.index') }}" class="flex items-center w-full p-2 text-gray-700 rounded-lg pl-11 hover:bg-gray-100 {{ request()->is('kelompok-resiko-konseling*') ? 'font-semibold' : '' }}">Kelompok Resiko</a></li>
                    <li><a href="{{ route('pemeriksaan-klinis.index') }}" class="flex items-center w-full p-2 text-gray-700 rounded-lg pl-11 hover:bg-gray-100 {{ request()->is('pemeriksaan-klinis*') ? 'font-semibold' : '' }}">Pemeriksaan Klinis</a></li>
                    <li><a href="{{ route('pengobatan-tb-hiv.index') }}" class="flex items-center w-full p-2 text-gray-700 rounded-lg pl-11 hover:bg-gray-100 {{ request()->is('pengobatan-tb-hiv*') ? 'font-semibold' : '' }}">Pengobatan TB-HIV</a></li>
                    <li><a href="{{ route('rekap-tes-hiv-konseling.index') }}" class="flex items-center w-full p-2 text-gray-700 rounded-lg pl-11 hover:bg-gray-100 {{ request()->is('rekap-tes-hiv-konseling*') ? 'font-semibold' : '' }}">Rekap Tes HIV</a></li>
                    <li><a href="{{ route('riwayat-mitra-seksual.index') }}" class="flex items-center w-full p-2 text-gray-700 rounded-lg pl-11 hover:bg-gray-100 {{ request()->is('riwayat-mitra-seksual*') ? 'font-semibold' : '' }}">Riwayat Mitra Seksual</a></li>
                </ul>
            </li>

            <!-- Admin Menu -->
            @role('admin')
            <li>
                <button type="button" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100" 
                        aria-controls="dropdown-admin" data-collapse-toggle="dropdown-admin">
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Admin</span>
                    <svg class="w-3 h-3" aria-hidden="true" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                    </svg>
                </button>
                <ul id="dropdown-admin" class="hidden py-2 space-y-2">
                    <li>
                        <a href="{{ route('admin.users.index') }}" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100">Users</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.roles.index') }}" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100">Roles & Permissions</a>
                    </li>
                    <li>
                        <a href="{{ route('konselor.index') }}" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100">Konselor</a>
                    </li>
                </ul>
            </li>

            <!-- Master Data (admin only) -->
            <li>
                <button type="button" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100"
                        aria-controls="dropdown-master" data-collapse-toggle="dropdown-master">
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-500 group-hover:text-gray-900" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"></path>
                    </svg>
                    <span class="flex-1 ms-3 text-left whitespace-nowrap">Master Data</span>
                    <svg class="w-3 h-3" fill="none" viewBox="0 0 10 6"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/></svg>
                </button>
                <ul id="dropdown-master" class="hidden py-2 space-y-1">
                    <li class="pl-4 py-1 text-xs font-semibold text-gray-400 uppercase tracking-wider">Wilayah</li>
                    <li><a href="{{ route('reff-provinsi.index') }}" class="flex items-center w-full p-2 text-gray-700 rounded-lg pl-11 hover:bg-gray-100">Provinsi</a></li>
                    <li><a href="{{ route('reff-kabupaten.index') }}" class="flex items-center w-full p-2 text-gray-700 rounded-lg pl-11 hover:bg-gray-100">Kabupaten</a></li>
                    <li><a href="{{ route('reff-kecamatan.index') }}" class="flex items-center w-full p-2 text-gray-700 rounded-lg pl-11 hover:bg-gray-100">Kecamatan</a></li>
                    <li><a href="{{ route('reff-desa.index') }}" class="flex items-center w-full p-2 text-gray-700 rounded-lg pl-11 hover:bg-gray-100">Desa/Kelurahan</a></li>

                    <li class="pl-4 py-1 text-xs font-semibold text-gray-400 uppercase tracking-wider">Data Pasien</li>
                    <li><a href="{{ route('reff-jenis-kelamin.index') }}" class="flex items-center w-full p-2 text-gray-700 rounded-lg pl-11 hover:bg-gray-100">Jenis Kelamin</a></li>
                    <li><a href="{{ route('reff-pendidikan.index') }}" class="flex items-center w-full p-2 text-gray-700 rounded-lg pl-11 hover:bg-gray-100">Pendidikan</a></li>
                    <li><a href="{{ route('reff-pekerjaan.index') }}" class="flex items-center w-full p-2 text-gray-700 rounded-lg pl-11 hover:bg-gray-100">Pekerjaan</a></li>
                    <li><a href="{{ route('reff-status-pernikahan.index') }}" class="flex items-center w-full p-2 text-gray-700 rounded-lg pl-11 hover:bg-gray-100">Status Pernikahan</a></li>
                    <li><a href="{{ route('reff-kategori-manfaat.index') }}" class="flex items-center w-full p-2 text-gray-700 rounded-lg pl-11 hover:bg-gray-100">Kategori Manfaat</a></li>
                    <li><a href="{{ route('reff-mitra-seksual.index') }}" class="flex items-center w-full p-2 text-gray-700 rounded-lg pl-11 hover:bg-gray-100">Mitra Seksual</a></li>
                    <li><a href="{{ route('reff-kategori-pemeriksaan.index') }}" class="flex items-center w-full p-2 text-gray-700 rounded-lg pl-11 hover:bg-gray-100">Kategori Pemeriksaan</a></li>

                    <li class="pl-4 py-1 text-xs font-semibold text-gray-400 uppercase tracking-wider">Klinis HIV</li>
                    <li><a href="{{ route('reff-alasan-tes-hiv.index') }}" class="flex items-center w-full p-2 text-gray-700 rounded-lg pl-11 hover:bg-gray-100">Alasan Tes HIV</a></li>
                    <li><a href="{{ route('reff-info-tes-hiv.index') }}" class="flex items-center w-full p-2 text-gray-700 rounded-lg pl-11 hover:bg-gray-100">Info Tes HIV</a></li>
                    <li><a href="{{ route('reff-entry-point.index') }}" class="flex items-center w-full p-2 text-gray-700 rounded-lg pl-11 hover:bg-gray-100">Entry Point</a></li>
                    <li><a href="{{ route('reff-faktor-resiko.index') }}" class="flex items-center w-full p-2 text-gray-700 rounded-lg pl-11 hover:bg-gray-100">Faktor Resiko</a></li>
                    <li><a href="{{ route('reff-kelompok-resiko.index') }}" class="flex items-center w-full p-2 text-gray-700 rounded-lg pl-11 hover:bg-gray-100">Kelompok Resiko</a></li>
                    <li><a href="{{ route('reff-tingkat-resiko-hiv.index') }}" class="flex items-center w-full p-2 text-gray-700 rounded-lg pl-11 hover:bg-gray-100">Tingkat Resiko HIV</a></li>
                    <li><a href="{{ route('reff-status-hiv.index') }}" class="flex items-center w-full p-2 text-gray-700 rounded-lg pl-11 hover:bg-gray-100">Status HIV</a></li>
                    <li><a href="{{ route('reff-indikasi-inisiasi-art.index') }}" class="flex items-center w-full p-2 text-gray-700 rounded-lg pl-11 hover:bg-gray-100">Indikasi Inisiasi ART</a></li>
                    <li><a href="{{ route('reff-jenis-terapi.index') }}" class="flex items-center w-full p-2 text-gray-700 rounded-lg pl-11 hover:bg-gray-100">Jenis Terapi</a></li>
                    <li><a href="{{ route('reff-tempat-terapi.index') }}" class="flex items-center w-full p-2 text-gray-700 rounded-lg pl-11 hover:bg-gray-100">Tempat Terapi</a></li>

                    <li class="pl-4 py-1 text-xs font-semibold text-gray-400 uppercase tracking-wider">TB</li>
                    <li><a href="{{ route('reff-klasifikasi-tb.index') }}" class="flex items-center w-full p-2 text-gray-700 rounded-lg pl-11 hover:bg-gray-100">Klasifikasi TB</a></li>
                    <li><a href="{{ route('reff-paduan-tb.index') }}" class="flex items-center w-full p-2 text-gray-700 rounded-lg pl-11 hover:bg-gray-100">Paduan TB</a></li>

                    <li class="pl-4 py-1 text-xs font-semibold text-gray-400 uppercase tracking-wider">Lainnya</li>
                    <li><a href="{{ route('reff-adherence-art.index') }}" class="flex items-center w-full p-2 text-gray-700 rounded-lg pl-11 hover:bg-gray-100">Adherence ART</a></li>
                    <li><a href="{{ route('reff-alasan-substitusi.index') }}" class="flex items-center w-full p-2 text-gray-700 rounded-lg pl-11 hover:bg-gray-100">Alasan Substitusi</a></li>
                    <li><a href="{{ route('reff-efek-samping.index') }}" class="flex items-center w-full p-2 text-gray-700 rounded-lg pl-11 hover:bg-gray-100">Efek Samping</a></li>
                    <li><a href="{{ route('reff-infeksi-oportunistik.index') }}" class="flex items-center w-full p-2 text-gray-700 rounded-lg pl-11 hover:bg-gray-100">Infeksi Oportunistik</a></li>
                    <li><a href="{{ route('reff-paduan-art.index') }}" class="flex items-center w-full p-2 text-gray-700 rounded-lg pl-11 hover:bg-gray-100">Paduan ART</a></li>
                    <li><a href="{{ route('reff-status-fungsional.index') }}" class="flex items-center w-full p-2 text-gray-700 rounded-lg pl-11 hover:bg-gray-100">Status Fungsional</a></li>
                    <li><a href="{{ route('reff-status-tb.index') }}" class="flex items-center w-full p-2 text-gray-700 rounded-lg pl-11 hover:bg-gray-100">Status TB</a></li>
                    <li><a href="{{ route('reff-tipe-tb.index') }}" class="flex items-center w-full p-2 text-gray-700 rounded-lg pl-11 hover:bg-gray-100">Tipe TB</a></li>
                </ul>
            </li>
            @endrole
        </ul>
    </div>
</aside>