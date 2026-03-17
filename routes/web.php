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

    // Follow Up (Livewire)
    Route::get('/followup', App\Livewire\FollowUp\Index::class)->name('followup.index');
    Route::get('/followup/create/{id_pasien?}', App\Livewire\FollowUp\Form::class)->name('followup.create');
    Route::get('/followup/{id}/edit', App\Livewire\FollowUp\Form::class)->name('followup.edit');

    // Konseling HIV (Livewire)
    Route::get('/konseling', App\Livewire\Konseling\Index::class)->name('konseling.index');
    Route::get('/konseling/create/{id_pasien?}', App\Livewire\Konseling\Form::class)->name('konseling.create');
    Route::get('/konseling/{id}/edit', App\Livewire\Konseling\Form::class)->name('konseling.edit');

    // Tes HIV Konseling (Livewire)
    Route::get('/tes-hiv-konseling', App\Livewire\TesHivKonseling\Index::class)->name('tes-hiv-konseling.index');
    Route::get('/tes-hiv-konseling/create', App\Livewire\TesHivKonseling\Form::class)->name('tes-hiv-konseling.create');
    Route::get('/tes-hiv-konseling/{id}/edit', App\Livewire\TesHivKonseling\Form::class)->name('tes-hiv-konseling.edit');

    // Riwayat Terapi ART (Livewire)
    Route::get('/riwayat-terapi-art', App\Livewire\RiwayatTerapiArt\Index::class)->name('riwayat-terapi-art.index');
    Route::get('/riwayat-terapi-art/create', App\Livewire\RiwayatTerapiArt\Form::class)->name('riwayat-terapi-art.create');
    Route::get('/riwayat-terapi-art/{id}/edit', App\Livewire\RiwayatTerapiArt\Form::class)->name('riwayat-terapi-art.edit');

    // Terapi ART Pasien (Livewire)
    Route::get('/terapi-art-pasien', App\Livewire\TerapiArtPasien\Index::class)->name('terapi-art-pasien.index');
    Route::get('/terapi-art-pasien/create', App\Livewire\TerapiArtPasien\Form::class)->name('terapi-art-pasien.create');
    Route::get('/terapi-art-pasien/{id}/edit', App\Livewire\TerapiArtPasien\Form::class)->name('terapi-art-pasien.edit');

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

    // Reference data — Wilayah
    Route::get('/reff-provinsi', App\Livewire\ReffProvinsi\Index::class)->name('reff-provinsi.index');
    Route::get('/reff-provinsi/create', App\Livewire\ReffProvinsi\Form::class)->name('reff-provinsi.create');
    Route::get('/reff-provinsi/{id}/edit', App\Livewire\ReffProvinsi\Form::class)->name('reff-provinsi.edit');

    Route::get('/reff-kabupaten', App\Livewire\ReffKabupaten\Index::class)->name('reff-kabupaten.index');
    Route::get('/reff-kabupaten/create', App\Livewire\ReffKabupaten\Form::class)->name('reff-kabupaten.create');
    Route::get('/reff-kabupaten/{id}/edit', App\Livewire\ReffKabupaten\Form::class)->name('reff-kabupaten.edit');

    Route::get('/reff-kecamatan', App\Livewire\ReffKecamatan\Index::class)->name('reff-kecamatan.index');
    Route::get('/reff-kecamatan/create', App\Livewire\ReffKecamatan\Form::class)->name('reff-kecamatan.create');
    Route::get('/reff-kecamatan/{id}/edit', App\Livewire\ReffKecamatan\Form::class)->name('reff-kecamatan.edit');

    Route::get('/reff-desa', App\Livewire\ReffDesa\Index::class)->name('reff-desa.index');
    Route::get('/reff-desa/create', App\Livewire\ReffDesa\Form::class)->name('reff-desa.create');
    Route::get('/reff-desa/{id}/edit', App\Livewire\ReffDesa\Form::class)->name('reff-desa.edit');

    // Reference data — Data Pasien
    Route::get('/reff-jenis-kelamin', App\Livewire\ReffJenisKelamin\Index::class)->name('reff-jenis-kelamin.index');
    Route::get('/reff-jenis-kelamin/create', App\Livewire\ReffJenisKelamin\Form::class)->name('reff-jenis-kelamin.create');
    Route::get('/reff-jenis-kelamin/{id}/edit', App\Livewire\ReffJenisKelamin\Form::class)->name('reff-jenis-kelamin.edit');

    Route::get('/reff-pendidikan', App\Livewire\ReffPendidikan\Index::class)->name('reff-pendidikan.index');
    Route::get('/reff-pendidikan/create', App\Livewire\ReffPendidikan\Form::class)->name('reff-pendidikan.create');
    Route::get('/reff-pendidikan/{id}/edit', App\Livewire\ReffPendidikan\Form::class)->name('reff-pendidikan.edit');

    Route::get('/reff-pekerjaan', App\Livewire\ReffPekerjaan\Index::class)->name('reff-pekerjaan.index');
    Route::get('/reff-pekerjaan/create', App\Livewire\ReffPekerjaan\Form::class)->name('reff-pekerjaan.create');
    Route::get('/reff-pekerjaan/{id}/edit', App\Livewire\ReffPekerjaan\Form::class)->name('reff-pekerjaan.edit');

    Route::get('/reff-status-pernikahan', App\Livewire\ReffStatusPernikahan\Index::class)->name('reff-status-pernikahan.index');
    Route::get('/reff-status-pernikahan/create', App\Livewire\ReffStatusPernikahan\Form::class)->name('reff-status-pernikahan.create');
    Route::get('/reff-status-pernikahan/{id}/edit', App\Livewire\ReffStatusPernikahan\Form::class)->name('reff-status-pernikahan.edit');

    Route::get('/reff-kategori-manfaat', App\Livewire\ReffKategoriManfaat\Index::class)->name('reff-kategori-manfaat.index');
    Route::get('/reff-kategori-manfaat/create', App\Livewire\ReffKategoriManfaat\Form::class)->name('reff-kategori-manfaat.create');
    Route::get('/reff-kategori-manfaat/{id}/edit', App\Livewire\ReffKategoriManfaat\Form::class)->name('reff-kategori-manfaat.edit');

    Route::get('/reff-mitra-seksual', App\Livewire\ReffMitraSeksual\Index::class)->name('reff-mitra-seksual.index');
    Route::get('/reff-mitra-seksual/create', App\Livewire\ReffMitraSeksual\Form::class)->name('reff-mitra-seksual.create');
    Route::get('/reff-mitra-seksual/{id}/edit', App\Livewire\ReffMitraSeksual\Form::class)->name('reff-mitra-seksual.edit');

    Route::get('/reff-kategori-pemeriksaan', App\Livewire\ReffKategoriPemeriksaan\Index::class)->name('reff-kategori-pemeriksaan.index');
    Route::get('/reff-kategori-pemeriksaan/create', App\Livewire\ReffKategoriPemeriksaan\Form::class)->name('reff-kategori-pemeriksaan.create');
    Route::get('/reff-kategori-pemeriksaan/{id}/edit', App\Livewire\ReffKategoriPemeriksaan\Form::class)->name('reff-kategori-pemeriksaan.edit');

    // Reference data — Klinis HIV
    Route::get('/reff-alasan-tes-hiv', App\Livewire\ReffAlasanTesHiv\Index::class)->name('reff-alasan-tes-hiv.index');
    Route::get('/reff-alasan-tes-hiv/create', App\Livewire\ReffAlasanTesHiv\Form::class)->name('reff-alasan-tes-hiv.create');
    Route::get('/reff-alasan-tes-hiv/{id}/edit', App\Livewire\ReffAlasanTesHiv\Form::class)->name('reff-alasan-tes-hiv.edit');

    Route::get('/reff-info-tes-hiv', App\Livewire\ReffInfoTesHiv\Index::class)->name('reff-info-tes-hiv.index');
    Route::get('/reff-info-tes-hiv/create', App\Livewire\ReffInfoTesHiv\Form::class)->name('reff-info-tes-hiv.create');
    Route::get('/reff-info-tes-hiv/{id}/edit', App\Livewire\ReffInfoTesHiv\Form::class)->name('reff-info-tes-hiv.edit');

    Route::get('/reff-entry-point', App\Livewire\ReffEntryPoint\Index::class)->name('reff-entry-point.index');
    Route::get('/reff-entry-point/create', App\Livewire\ReffEntryPoint\Form::class)->name('reff-entry-point.create');
    Route::get('/reff-entry-point/{id}/edit', App\Livewire\ReffEntryPoint\Form::class)->name('reff-entry-point.edit');

    Route::get('/reff-faktor-resiko', App\Livewire\ReffFaktorResiko\Index::class)->name('reff-faktor-resiko.index');
    Route::get('/reff-faktor-resiko/create', App\Livewire\ReffFaktorResiko\Form::class)->name('reff-faktor-resiko.create');
    Route::get('/reff-faktor-resiko/{id}/edit', App\Livewire\ReffFaktorResiko\Form::class)->name('reff-faktor-resiko.edit');

    Route::get('/reff-kelompok-resiko', App\Livewire\ReffKelompokResiko\Index::class)->name('reff-kelompok-resiko.index');
    Route::get('/reff-kelompok-resiko/create', App\Livewire\ReffKelompokResiko\Form::class)->name('reff-kelompok-resiko.create');
    Route::get('/reff-kelompok-resiko/{id}/edit', App\Livewire\ReffKelompokResiko\Form::class)->name('reff-kelompok-resiko.edit');

    Route::get('/reff-tingkat-resiko-hiv', App\Livewire\ReffTingkatResikoHiv\Index::class)->name('reff-tingkat-resiko-hiv.index');
    Route::get('/reff-tingkat-resiko-hiv/create', App\Livewire\ReffTingkatResikoHiv\Form::class)->name('reff-tingkat-resiko-hiv.create');
    Route::get('/reff-tingkat-resiko-hiv/{id}/edit', App\Livewire\ReffTingkatResikoHiv\Form::class)->name('reff-tingkat-resiko-hiv.edit');

    Route::get('/reff-status-hiv', App\Livewire\ReffStatusHiv\Index::class)->name('reff-status-hiv.index');
    Route::get('/reff-status-hiv/create', App\Livewire\ReffStatusHiv\Form::class)->name('reff-status-hiv.create');
    Route::get('/reff-status-hiv/{id}/edit', App\Livewire\ReffStatusHiv\Form::class)->name('reff-status-hiv.edit');

    Route::get('/reff-indikasi-inisiasi-art', App\Livewire\ReffIndikasiInisiasiArt\Index::class)->name('reff-indikasi-inisiasi-art.index');
    Route::get('/reff-indikasi-inisiasi-art/create', App\Livewire\ReffIndikasiInisiasiArt\Form::class)->name('reff-indikasi-inisiasi-art.create');
    Route::get('/reff-indikasi-inisiasi-art/{id}/edit', App\Livewire\ReffIndikasiInisiasiArt\Form::class)->name('reff-indikasi-inisiasi-art.edit');

    Route::get('/reff-jenis-terapi', App\Livewire\ReffJenisTerapi\Index::class)->name('reff-jenis-terapi.index');
    Route::get('/reff-jenis-terapi/create', App\Livewire\ReffJenisTerapi\Form::class)->name('reff-jenis-terapi.create');
    Route::get('/reff-jenis-terapi/{id}/edit', App\Livewire\ReffJenisTerapi\Form::class)->name('reff-jenis-terapi.edit');

    Route::get('/reff-tempat-terapi', App\Livewire\ReffTempatTerapi\Index::class)->name('reff-tempat-terapi.index');
    Route::get('/reff-tempat-terapi/create', App\Livewire\ReffTempatTerapi\Form::class)->name('reff-tempat-terapi.create');
    Route::get('/reff-tempat-terapi/{id}/edit', App\Livewire\ReffTempatTerapi\Form::class)->name('reff-tempat-terapi.edit');

    // Reference data — TB
    Route::get('/reff-klasifikasi-tb', App\Livewire\ReffKlasifikasiTb\Index::class)->name('reff-klasifikasi-tb.index');
    Route::get('/reff-klasifikasi-tb/create', App\Livewire\ReffKlasifikasiTb\Form::class)->name('reff-klasifikasi-tb.create');
    Route::get('/reff-klasifikasi-tb/{id}/edit', App\Livewire\ReffKlasifikasiTb\Form::class)->name('reff-klasifikasi-tb.edit');

    Route::get('/reff-paduan-tb', App\Livewire\ReffPaduanTb\Index::class)->name('reff-paduan-tb.index');
    Route::get('/reff-paduan-tb/create', App\Livewire\ReffPaduanTb\Form::class)->name('reff-paduan-tb.create');
    Route::get('/reff-paduan-tb/{id}/edit', App\Livewire\ReffPaduanTb\Form::class)->name('reff-paduan-tb.edit');

    // Konselor (Livewire)
    Route::get('/konselor', App\Livewire\Konselor\Index::class)->name('konselor.index');
    Route::get('/konselor/create', App\Livewire\Konselor\Form::class)->name('konselor.create');
    Route::get('/konselor/{id}/edit', App\Livewire\Konselor\Form::class)->name('konselor.edit');

    // Pasien File (Livewire)
    Route::get('/pasien-file', App\Livewire\PasienFile\Index::class)->name('pasien-file.index');
    Route::get('/pasien-file/create', App\Livewire\PasienFile\Form::class)->name('pasien-file.create');
    Route::get('/pasien-file/{id}/edit', App\Livewire\PasienFile\Form::class)->name('pasien-file.edit');
    
});
