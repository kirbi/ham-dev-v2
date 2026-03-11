<?php

use Illuminate\Support\Facades\Route;
require_once('webKonselor.php');

use App\Http\Controllers\{
    HomeController,
    KonselorController,
    PasienFileController,
    UserController
};

//data
use App\Http\Controllers\{
    CheckHivController,
    PasienController,
    FaktorResikoPasienController,
    FollowUpPasienController,
    InfoTesHivKonselingController,
    KajianResikoHivController,
    KelompokResikoKonselingController,
    KonselingHivController,
    PemeriksaanKlinisController,
    RekapTesHivKonselingController,
    RiwayatTerapiArtController,
    RiwayatMitraSeksualController,
    SosialisasiHivController,
    TesHivKonselingController,
    TerapiArtPasienController,
    PengobatanTbHivController,
    DashboardController,
    DownloadController
};

//Data referensi
use App\Http\Controllers\{
    ReffAdherenceArtController,
    ReffAlasanSubstitusiController,
    ReffAlasanTesHivController,
    ReffFaktorResikoController,
    ReffEntryPointController,
    ReffEfekSampingController,
    ReffInfeksiOportunistikController,
    ReffIndikasiInisiasiArtController,
    ReffInfoTesHivController,
    ReffJenisTerapiController,
    ReffKategoriManfaatController,
    ReffKategoriPemeriksaanController,
    ReffDesaController,
    ReffKecamatanController,
    ReffKabupatenController,
    ReffProvinsiController,
    ReffKelompokResikoController,
    ReffKlasifikasiTbController,
    ReffMitraSeksualController,
    ReffPaduanArtController,
    ReffPaduanTbController,
    ReffPendidikanController,
    ReffPekerjaanController,
    ReffStatusFungsionalController,
    ReffStatusHivController,
    ReffStatusPernikahanController,
    ReffStatusTbController,
    ReffTingkatResikoHivController,
    ReffTipeTbController,
    ReffTempatTerapiController,
};
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;

// use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/**
 * All normal User Route List
 */
Route::middleware(['auth', 'user-access:user'])->group(function() {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

/**
 * All Admin Routes List
 */
Route::middleware(['auth', 'user-access:admin'])->group(function() {
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
    //CheckHiv
    Route::resource('/admin/checkHiv', CheckHivController::class);
    //SosialisasiHiv
    Route::resource('/admin/sosialisasiHiv', SosialisasiHivController::class);

    //data konselor
    Route::resource('/admin/konselor', KonselorController::class);
    Route::get('/admin/konselor/detail/{id}', [KonselorController::class, 'show']);
    Route::post('/admin/konselor/storeAkun', [KonselorController::class, 'storeAkun'])->name('konselor.storeAkun');
    //data pasien
    Route::resource('/admin/pasien', PasienController::class);
    Route::get('/admin/pasien/detail/{id}', [PasienController::class, 'show']);
    Route::post('/admin/pasien/negatifHiv', [PasienController::class, 'negatifHiv'])->name('pasien.negatifHiv');
    Route::post('/admin/pasien/hivAids', [PasienController::class, 'hivAids'])->name('pasien.hivAids');
    Route::post('/admin/pasien/PositifHiv', [PasienController::class, 'positifHiv'])->name('pasien.positifHiv');
    Route::post('/admin/pasien/delete/{id}', [PasienController::class, 'delete'])->name('pasien.delete');
    Route::get('/admin/pasien/download/{id}', [PasienController::class, 'download']);

    //followup terapi art
    // Route::resource('/admin/followup', FollowUpPasienController::class);
    Route::get('/admin/followup/indexPasien', [FollowUpPasienController::class, 'indexPasien'])->name('admin.followup.indexPasien');
    Route::get('/admin/followup/add/{idpasien}', [FollowUpPasienController::class, 'add']);
    Route::post('/admin/followup/add', [FollowUpPasienController::class, 'store'])->name('admin.followup.store');
    Route::get('/admin/followup/index', [FollowUpPasienController::class, 'index'])->name('admin.followup.index');
    Route::get('/admin/followup/{id}/edit', [FollowUpPasienController::class, 'edit']);
    Route::get('/admin/followup/detail/{id}', [FollowUpPasienController::class, 'detail'])->name('admin.followup.detail');
    Route::delete('/admin/followup/delete/{id}', [FollowUpPasienController::class, 'destroy'])->name('admin.followup.destroy');
    
    //konseling Hiv
    Route::get('/admin/konselingHiv/indexPasien', [KonselingHivController::class, 'indexPasien'])->name('admin.konselingHiv.indexPasien');
    Route::get('/admin/konselingHiv/add/{idpasien}', [KonselingHivController::class, 'add']);
    Route::post('/admin/konselingHiv/add', [KonselingHivController::class, 'store'])->name('admin.konselingHiv.store');
    Route::get('/admin/konselingHiv/index', [KonselingHivController::class, 'index'])->name('admin.konselingHiv.index');
    Route::get('/admin/konselingHiv/download/{id}', [KonselingHivController::class, 'download']);
    Route::get('/admin/konselingHiv/{id}/edit', [KonselingHivController::class, 'edit']);
    Route::get('/admin/konselingHiv/detail/{id}', [KonselingHivController::class, 'detail'])->name('admin.konselingHiv.detail');
    Route::delete('/admin/konselingHiv/delete/{id}', [KonselingHivController::class, 'destroy'])->name('admin.konselingHiv.destroy');

    //kelompok resiko konseling
    Route::resource('/admin/kelompokResikoKonseling', KelompokResikoKonselingController::class);
    Route::post('/admin/kelompokResikoKonseling/addStore', [KelompokResikoKonselingController::class, 'addStore'])->name('admin.kelompokResikoKonseling.add');

    //infoTes Hiv konseling
    Route::resource('/admin/infoTesHivKonseling', InfoTesHivKonselingController::class);
    Route::post('/admin/infoTesHivKonseling/addStore', [InfoTesHivKonselingController::class, 'addStore'])->name('admin.infoTesHivKonseling.add');

    //kajian Resiko Hiv
    Route::resource('/admin/kajianResikoHiv', KajianResikoHivController::class);
    Route::post('/admin/kajianResikoHiv/addStore', [KajianResikoHivController::class, 'addStore'])->name('admin.kajianResikoHiv.add');

    //tes Hiv konseling
    Route::resource('/admin/tesHivKonseling', TesHivKonselingController::class);
    Route::post('/admin/tesHivKonseling/addStore', [TesHivKonselingController::class, 'addStore'])->name('admin.tesHivKonseling.add');
    //rekap tes Hiv konseling
    Route::resource('/admin/rekapTesHivKonseling', RekapTesHivKonselingController::class);
    Route::post('/admin/rekapTesHivKonseling/addStore', [RekapTesHivKonselingController::class, 'addStore'])->name('admin.rekapTesHivKonseling.add');

    //RiwayatPemeriksaanKlinis
    Route::resource('/admin/pemeriksaanKlinis', PemeriksaanKlinisController::class);
    Route::post('/admin/pemeriksaanKlinis/addStore', [PemeriksaanKlinisController::class, 'addStore'])->name('admin.pemeriksaanKlinis.add');

    //riwayatTerapiArt
    Route::resource('/admin/riwayatTerapiArt', RiwayatTerapiArtController::class);
    Route::get('/admin/riwayatTerapiArt/add/{id}', [RiwayatTerapiArtController::class, 'add']);
    Route::post('/admin/riwayatTerapiArt/addStore', [RiwayatTerapiArtController::class, 'addStore'])->name('admin.riwayatTerapiArt.add');
    Route::get('/admin/riwayatTerapiArt/getPasiens', [RiwayatTerapiArtController::class, 'getPasiens']);
    Route::post('/admin/riwayatTerapiArt/delete/{id}', [RiwayatTerapiArtController::class, 'destroy'])->name('admin.riwayatTerapiArt.delete');

    //RiwayatMitraSeksual
    Route::resource('/admin/riwayatMitraSeksual', RiwayatMitraSeksualController::class);
    Route::get('/admin/riwayatMitraSeksual/add/{id}', [RiwayatMitraSeksualController::class, 'add']);
    Route::post('/admin/riwayatMitraSeksual/addStore', [RiwayatMitraSeksualController::class, 'addStore'])->name('admin.riwayatMitraSeksual.add');
    // Route::post('/admin/riwayatMitraSeksual/delete/{id}', [RiwayatMitraSeksualController::class, 'destroy'])->name('admin.riwayatMitraSeksual.delete');
    
    //FaktorResiko
    Route::resource('/admin/faktorResikoPasien', FaktorResikoPasienController::class);
    Route::get('/admin/faktorResikoPasien/add/{id}', [FaktorResikoPasienController::class, 'add']);
    Route::post('/admin/faktorResikoPasien/addStore', [FaktorResikoPasienController::class, 'addStore'])->name('admin.faktorResikoPasien.add');
     
    //TerapiArt
    Route::resource('/admin/terapiArtPasien', TerapiArtPasienController::class);
    Route::get('/admin/terapiArtPasien/add/{id}', [TerapiArtPasienController::class, 'add']);
    Route::post('/admin/terapiArtPasien/addStore', [TerapiArtPasienController::class, 'addStore'])->name('admin.terapiArtPasien.add');

    //PengobatanTB
    Route::resource('/admin/pengobatanTb', PengobatanTbHivController::class);
    Route::get('/admin/pengobatanTb/add/{id}', [PengobatanTbHivController::class, 'add']);
    Route::post('/admin/pengobatanTb/addStore', [PengobatanTbHivController::class, 'addStore'])->name('admin.pengobatanTb.add');

    //Dashboard
    Route::get('/admin/dashboard/index-pasien-tahunan', [DashboardController::class, 'indexPasienTahunan'])->name('admin.dashboard.indexPasienTahunan');
    Route::post('/admin/dashboard/index-pasien-tahunan', [DashboardController::class, 'indexPasienTahunanFilter'])->name('admin.dashboard.indexPasienTahunan.filter');
    Route::get('/admin/dashboard/index-pasien-bulanan', [DashboardController::class, 'indexPasienBulanan'])->name('admin.dashboard.indexPasienBulanan');
    Route::post('/admin/dashboard/index-pasien-bulanan', [DashboardController::class, 'indexPasienBulananFilter'])->name('admin.dashboard.indexPasienBulanan.filter');
    Route::get('/admin/dashboard/index-pasien-positif-persentase', [DashboardController::class, 'indexPasienTahunanPersentase'])->name('admin.dashboard.indexPasienTahunanPersentase');
    Route::post('/admin/dashboard/index-pasien-positif-persentase', [DashboardController::class, 'indexPasienTahunanPersentaseFilter'])->name('admin.dashboard.indexPasienTahunanPersentase.filter');
    Route::get('/admin/dashboard/index-pasien-hidup-mati', [DashboardController::class, 'indexPasienHidupMati'])->name('admin.dashboard.indexPasienHidupMati');
    Route::post('/admin/dashboard/index-pasien-hidup-mati', [DashboardController::class, 'indexPasienHidupMatiFilter'])->name('admin.dashboard.indexPasienHidupMati.filter');
    Route::get('/admin/dashboard/index-pasien-penularan', [DashboardController::class, 'indexPasienPenularan'])->name('admin.dashboard.indexPasienPenularan');
    Route::post('/admin/dashboard/index-pasien-penularan', [DashboardController::class, 'indexPasienPenularanFilter'])->name('admin.dashboard.indexPasienPenularan.filter');
    Route::get('/admin/dashboard/index-pasien-umur', [DashboardController::class, 'indexPasienUmur'])->name('admin.dashboard.indexPasienUmur');
    Route::post('/admin/dashboard/index-pasien-umur', [DashboardController::class, 'indexPasienUmurFilter'])->name('admin.dashboard.indexPasienUmur.filter');
    Route::get('/admin/dashboard/index-pasien-umur-bulanan', [DashboardController::class, 'indexPasienUmurBulanan'])->name('admin.dashboard.indexPasienUmurBulanan');
    Route::post('/admin/dashboard/index-pasien-umur-bulanan', [DashboardController::class, 'indexPasienUmurBulananFilter'])->name('admin.dashboard.indexPasienUmurBulanan.filter');

    Route::get('/admin/dashboard/konseling-tahunan', [DashboardController::class, 'indexKonselingTahunan'])->name('admin.dashboard.konselingTahunan');
    Route::post('/admin/dashboard/konseling-tahunan', [DashboardController::class, 'indexKonselingTahunanFilter'])->name('admin.dashboard.konselingTahunan.filter');
    Route::get('/admin/dashboard/konseling-bulanan', [DashboardController::class, 'indexKonselingBulanan'])->name('admin.dashboard.konselingBulanan');
    Route::post('/admin/dashboard/konseling-bulanan', [DashboardController::class, 'indexKonselingBulananFilter'])->name('admin.dashboard.konselingBulanan.filter');

    Route::get('/admin/dashboard/follow-up-tahunan', [DashboardController::class, 'followUpTahunan'])->name('admin.dashboard.followUpTahunan');
    Route::post('/admin/dashboard/follow-up-tahunan', [DashboardController::class, 'followUpTahunanFilter'])->name('admin.dashboard.followUpTahunan.filter');
    Route::get('/admin/dashboard/follow-up-bulanan', [DashboardController::class, 'followUpBulanan'])->name('admin.dashboard.followUpBulanan');
    Route::post('/admin/dashboard/follow-up-bulanan', [DashboardController::class, 'followUpBulananFilter'])->name('admin.dashboard.followUpBulanan.filter');

    
    Route::get('/admin/dashboard/check-hiv-bulanan', [DashboardController::class, 'checkHivBulanan'])->name('admin.dashboard.checkHivBulanan');
    Route::post('/admin/dashboard/check-hiv-bulanan', [DashboardController::class, 'checkHivBulananFilter'])->name('admin.dashboard.checkHivBulanan.filter');

    Route::get('/admin/dashboard/sosialisasi-hiv-bulanan', [DashboardController::class, 'sosialisasiHivBulanan'])->name('admin.dashboard.sosialisasiHivBulanan');
    Route::post('/admin/dashboard/sosialisasi-hiv-bulanan', [DashboardController::class, 'sosialisasiHivBulananFilter'])->name('admin.dashboard.sosialisasiHivBulanan.filter');

    //Data referensi
    Route::resource('/admin/adherenceArt', ReffAdherenceArtController::class);
    Route::resource('/admin/alasanSubstitusi', ReffAlasanSubstitusiController::class);
    Route::resource('/admin/alasanTesHiv', ReffAlasanTesHivController::class);
    Route::resource('/admin/entryPoint', ReffEntryPointController::class);
    Route::resource('/admin/efekSamping', ReffEfekSampingController::class);
    Route::resource('/admin/faktorResiko', ReffFaktorResikoController::class);
    Route::resource('/admin/infeksiOportunistik', ReffInfeksiOportunistikController::class);
    Route::resource('/admin/indikasiInisiasiArt', ReffIndikasiInisiasiArtController::class);
    Route::resource('/admin/infoTesHiv', ReffInfoTesHivController::class);
    Route::resource('/admin/klasifikasiTb', ReffKlasifikasiTbController::class);
    Route::resource('/admin/kategoriManfaat', ReffKategoriManfaatController::class);
    Route::resource('/admin/kelompokResiko', ReffKelompokResikoController::class);
    Route::resource('/admin/kategoriPemeriksaan', ReffKategoriPemeriksaanController::class);
    Route::resource('/admin/jenisTerapi', ReffJenisTerapiController::class);
    Route::resource('/admin/mitraSeksual', ReffMitraSeksualController::class);
    Route::resource('/admin/paduanArt', ReffPaduanArtController::class);
    Route::resource('/admin/paduanTb', ReffPaduanTbController::class);
    Route::resource('/admin/pekerjaan', ReffPekerjaanController::class);
    Route::resource('/admin/pendidikan', ReffPendidikanController::class);
    Route::resource('/admin/statusFungsional', ReffStatusFungsionalController::class);
    Route::resource('/admin/statusHiv', ReffStatusHivController::class);
    Route::resource('/admin/statusPernikahan', ReffStatusPernikahanController::class);
    Route::resource('/admin/statusTb', ReffStatusTbController::class);
    Route::resource('/admin/tempatTerapi', ReffTempatTerapiController::class);
    Route::resource('/admin/tingkatResikoHiv', ReffTingkatResikoHivController::class);
    Route::resource('/admin/tipeTb', ReffTipeTbController::class);

    //pasienfile
    Route::resource('pasienFile', PasienFileController::class);
    Route::post('/admin/pasienFile/addStore', [PasienFileController::class, 'addStore'])->name('admin.pasienFile.add');
    Route::delete('/admin/pasienFile/delete/{id}', [PasienFileController::class, 'destroy'])->name('admin.pasienFile.delete');
    //Download Data
    Route::get('/admin/download/pasien', [DownloadController::class, 'pasien']);
    Route::post('/admin/dashboard/pasien', [DownloadController::class, 'downloadPasien'])->name('downloadPasien');

    Route::get('/admin/download/konseling', [DownloadController::class, 'konseling']);
    Route::post('/admin/download/konseling', [DownloadController::class, 'downloadKonseling'])->name('downloadKonseling');

    Route::get('/admin/download/follow-up', [DownloadController::class, 'followUp']);
    Route::post('/admin/download/follow-up', [DownloadController::class, 'downloadFollowUp'])->name('downloadFollowUp');

    Route::get('/admin/download/konselor', [DownloadController::class, 'konselor']);
    Route::post('/admin/download/konselor', [DownloadController::class, 'downloadKonselor'])->name('downloadKonselor');

    
    Route::get('/admin/download/check-hiv', [DownloadController::class, 'checkHiv']);
    Route::post('/admin/download/check-hiv', [DownloadController::class, 'downloadCheckHiv'])->name('downloadCheckHiv');

    Route::get('/admin/download/sosialisasi-hiv', [DownloadController::class, 'sosialisasiHiv'])->name('');
    Route::post('/admin/download/sosialisasi-hiv', [DownloadController::class, 'downloadSosialisasiHiv'])->name('downloadSosialisasi');
    
    Route::get('/admin/akun/{id}', [UserController::class, 'akunadmin']);
    Route::post('/admin/akun/gantipassword', [UserController::class, 'gantiPassword'])->name('admin.gantiPassword');
});

//data lainya
Route::get('/option-kabupaten/{id}', [ReffKabupatenController::class, 'getKabLists'])->name('optionKabupaten');
Route::get('/option-kecamatan/{id}', [ReffKecamatanController::class, 'getKecLists'])->name('optionKecamatan');
Route::get('/option-desa/{id}', [ReffDesaController::class, 'getDesLists'])->name('optionDesa');

/**
 * All Super Admin Routes List
 */
Route::middleware(['auth', 'user-access:superadmin'])->group(function() {
    Route::get('/superadmin/home', [HomeController::class, 'superadminHome'])->name('superadmin.home');
});

Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');