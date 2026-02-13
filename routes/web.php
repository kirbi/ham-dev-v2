<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasienController;
use App\Livewire\Pasien\Index as PasienIndex;
use App\Livewire\Pasien\Form as PasienForm;

Route::get('/', function () {
    return view('welcome');
});

// Routes with RBAC middleware
// Admin and Konselor can access these routes
Route::middleware(['auth', 'role:admin,konselor'])->group(function () {
        // RBAC-protected routes for CheckHiv
        Route::get('/check-hiv', App\Livewire\CheckHiv\Index::class)->name('check-hiv.index');
        Route::get('/check-hiv/create', App\Livewire\CheckHiv\Form::class)->name('check-hiv.create');
        Route::get('/check-hiv/edit/{id}', App\Livewire\CheckHiv\Form::class)->name('check-hiv.edit');
    
    // Pasien Routes (Livewire)
    Route::get('/pasien', PasienIndex::class)->name('pasien.index');
    Route::get('/pasien/create', PasienForm::class)->name('pasien.create');
    Route::get('/pasien/{id}/edit', PasienForm::class)->name('pasien.edit');
    
    // Pasien Routes (Controller)
    Route::get('/pasien/{id}', [PasienController::class, 'show'])->name('pasien.show');

        // Faktor Resiko Pasien (Livewire)
        Route::get('/faktor-resiko-pasien', App\Livewire\FaktorResikoPasien\Index::class)->name('faktor-resiko-pasien.index');
        Route::get('/faktor-resiko-pasien/create', App\Livewire\FaktorResikoPasien\Form::class)->name('faktor-resiko-pasien.create');
        Route::get('/faktor-resiko-pasien/{id}/edit', App\Livewire\FaktorResikoPasien\Form::class)->name('faktor-resiko-pasien.edit');

            // Info Tes HIV Konseling (Livewire)
            Route::get('/info-tes-hiv-konseling', App\Livewire\InfoTesHivKonseling\Index::class)->name('info-tes-hiv-konseling.index');
            Route::get('/info-tes-hiv-konseling/create', App\Livewire\InfoTesHivKonseling\Form::class)->name('info-tes-hiv-konseling.create');
            Route::get('/info-tes-hiv-konseling/{id}/edit', App\Livewire\InfoTesHivKonseling\Form::class)->name('info-tes-hiv-konseling.edit');

                // Kajian Resiko HIV (Livewire)
                Route::get('/kajian-resiko-hiv', App\Livewire\KajianResikoHiv\Index::class)->name('kajian-resiko-hiv.index');
                Route::get('/kajian-resiko-hiv/create', App\Livewire\KajianResikoHiv\Form::class)->name('kajian-resiko-hiv.create');
                Route::get('/kajian-resiko-hiv/{id}/edit', App\Livewire\KajianResikoHiv\Form::class)->name('kajian-resiko-hiv.edit');

                    // Kelompok Resiko Konseling (Livewire)
                    Route::get('/kelompok-resiko-konseling', App\Livewire\KelompokResikoKonseling\Index::class)->name('kelompok-resiko-konseling.index');
                    Route::get('/kelompok-resiko-konseling/create', App\Livewire\KelompokResikoKonseling\Form::class)->name('kelompok-resiko-konseling.create');
                    Route::get('/kelompok-resiko-konseling/{id}/edit', App\Livewire\KelompokResikoKonseling\Form::class)->name('kelompok-resiko-konseling.edit');

                        // Pemeriksaan Klinis (Livewire)
                        Route::get('/pemeriksaan-klinis', App\Livewire\PemeriksaanKlinis\Index::class)->name('pemeriksaan-klinis.index');
                        Route::get('/pemeriksaan-klinis/create', App\Livewire\PemeriksaanKlinis\Form::class)->name('pemeriksaan-klinis.create');
                        Route::get('/pemeriksaan-klinis/{id}/edit', App\Livewire\PemeriksaanKlinis\Form::class)->name('pemeriksaan-klinis.edit');

                            // Pengobatan TB HIV (Livewire)
                            Route::get('/pengobatan-tb-hiv', App\Livewire\PengobatanTbHiv\Index::class)->name('pengobatan-tb-hiv.index');
                            Route::get('/pengobatan-tb-hiv/create', App\Livewire\PengobatanTbHiv\Form::class)->name('pengobatan-tb-hiv.create');
                            Route::get('/pengobatan-tb-hiv/{id}/edit', App\Livewire\PengobatanTbHiv\Form::class)->name('pengobatan-tb-hiv.edit');

                                // Rekap Tes HIV Konseling (Livewire)
                                Route::get('/rekap-tes-hiv-konseling', App\Livewire\RekapTesHivKonseling\Index::class)->name('rekap-tes-hiv-konseling.index');
                                Route::get('/rekap-tes-hiv-konseling/create', App\Livewire\RekapTesHivKonseling\Form::class)->name('rekap-tes-hiv-konseling.create');
                                Route::get('/rekap-tes-hiv-konseling/{id}/edit', App\Livewire\RekapTesHivKonseling\Form::class)->name('rekap-tes-hiv-konseling.edit');

                                    // Riwayat Mitra Seksual (Livewire)
                                    Route::get('/riwayat-mitra-seksual', App\Livewire\RiwayatMitraSeksual\Index::class)->name('riwayat-mitra-seksual.index');
                                    Route::get('/riwayat-mitra-seksual/create', App\Livewire\RiwayatMitraSeksual\Form::class)->name('riwayat-mitra-seksual.create');
                                    Route::get('/riwayat-mitra-seksual/{id}/edit', App\Livewire\RiwayatMitraSeksual\Form::class)->name('riwayat-mitra-seksual.edit');
    
     // RBAC-protected routes for ReffAdherenceArt
     Route::get('/reff-adherence-art', App\Livewire\ReffAdherenceArt\Index::class)->name('reff-adherence-art.index');
     Route::get('/reff-adherence-art/create', App\Livewire\ReffAdherenceArt\Form::class)->name('reff-adherence-art.create');
     Route::get('/reff-adherence-art/edit/{id}', App\Livewire\ReffAdherenceArt\Form::class)->name('reff-adherence-art.edit');
    
        // RBAC-protected routes for ReffAlasanSubstitusi
        Route::get('/reff-alasan-substitusi', App\Livewire\ReffAlasanSubstitusi\Index::class)->name('reff-alasan-substitusi.index');
        Route::get('/reff-alasan-substitusi/create', App\Livewire\ReffAlasanSubstitusi\Form::class)->name('reff-alasan-substitusi.create');
        Route::get('/reff-alasan-substitusi/edit/{id}', App\Livewire\ReffAlasanSubstitusi\Form::class)->name('reff-alasan-substitusi.edit');
    
        // RBAC-protected routes for ReffEfekSamping
        Route::get('/reff-efek-samping', App\Livewire\ReffEfekSamping\Index::class)->name('reff-efek-samping.index');
        Route::get('/reff-efek-samping/create', App\Livewire\ReffEfekSamping\Form::class)->name('reff-efek-samping.create');
        Route::get('/reff-efek-samping/edit/{id}', App\Livewire\ReffEfekSamping\Form::class)->name('reff-efek-samping.edit');
    
        // RBAC-protected routes for ReffInfeksiOportunistik
        Route::get('/reff-infeksi-oportunistik', App\Livewire\ReffInfeksiOportunistik\Index::class)->name('reff-infeksi-oportunistik.index');
        Route::get('/reff-infeksi-oportunistik/create', App\Livewire\ReffInfeksiOportunistik\Form::class)->name('reff-infeksi-oportunistik.create');
        Route::get('/reff-infeksi-oportunistik/edit/{id}', App\Livewire\ReffInfeksiOportunistik\Form::class)->name('reff-infeksi-oportunistik.edit');
            // RBAC-protected routes for ReffPaduanArt
            Route::get('/reff-paduan-art', App\Livewire\ReffPaduanArt\Index::class)->name('reff-paduan-art.index');
            Route::get('/reff-paduan-art/create', App\Livewire\ReffPaduanArt\Form::class)->name('reff-paduan-art.create');
            Route::get('/reff-paduan-art/edit/{id}', App\Livewire\ReffPaduanArt\Form::class)->name('reff-paduan-art.edit');
                // RBAC-protected routes for ReffStatusFungsional
                Route::get('/reff-status-fungsional', App\Livewire\ReffStatusFungsional\Index::class)->name('reff-status-fungsional.index');
                Route::get('/reff-status-fungsional/create', App\Livewire\ReffStatusFungsional\Form::class)->name('reff-status-fungsional.create');
                Route::get('/reff-status-fungsional/edit/{id}', App\Livewire\ReffStatusFungsional\Form::class)->name('reff-status-fungsional.edit');
                    // RBAC-protected routes for ReffStatusTb
                    Route::get('/reff-status-tb', App\Livewire\ReffStatusTb\Index::class)->name('reff-status-tb.index');
                    Route::get('/reff-status-tb/create', App\Livewire\ReffStatusTb\Form::class)->name('reff-status-tb.create');
                    Route::get('/reff-status-tb/edit/{id}', App\Livewire\ReffStatusTb\Form::class)->name('reff-status-tb.edit');
                        // RBAC-protected routes for ReffTipeTb
                        Route::get('/reff-tipe-tb', App\Livewire\ReffTipeTb\Index::class)->name('reff-tipe-tb.index');
                        Route::get('/reff-tipe-tb/create', App\Livewire\ReffTipeTb\Form::class)->name('reff-tipe-tb.create');
                        Route::get('/reff-tipe-tb/edit/{id}', App\Livewire\ReffTipeTb\Form::class)->name('reff-tipe-tb.edit');
});

// Admin-only routes
Route::middleware(['auth', 'role:admin'])->group(function () {
    
    // Download pasien data (admin only)
    Route::get('/pasien/{id}/download', [PasienController::class, 'download'])->name('pasien.download');

        // Konselor (Livewire)
        Route::get('/konselor', App\Livewire\Konselor\Index::class)->name('konselor.index');
        Route::get('/konselor/create', App\Livewire\Konselor\Form::class)->name('konselor.create');
        Route::get('/konselor/{id}/edit', App\Livewire\Konselor\Form::class)->name('konselor.edit');

            // Pasien File (Livewire)
            Route::get('/pasien-file', App\Livewire\PasienFile\Index::class)->name('pasien-file.index');
            Route::get('/pasien-file/create', App\Livewire\PasienFile\Form::class)->name('pasien-file.create');
            Route::get('/pasien-file/{id}/edit', App\Livewire\PasienFile\Form::class)->name('pasien-file.edit');
    
});
