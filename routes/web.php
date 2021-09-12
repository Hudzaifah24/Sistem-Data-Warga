<?php

use App\Http\Controllers\AccountControoler;
use App\Http\Controllers\Cetak\CetakController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DetailKartuKeluargaController;
use App\Http\Controllers\DusunController;
use App\Http\Controllers\Excel\ExportController;
use App\Http\Controllers\Excel\ImportController;
use App\Http\Controllers\Excel\TemplateController;
use App\Http\Controllers\KartuKeluargaController;
use App\Http\Controllers\KelahiranController;
use App\Http\Controllers\KematianController;
use App\Http\Controllers\MutasiController;
use App\Http\Controllers\PendudukController;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware('auth')->group(function(){
    // dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Dusun
    Route::resource('dusun', DusunController::class);
    Route::get('/search/dusun', [DusunController::class, 'search'])->name('search.dusun');
    Route::get('/filter/dusun', [DusunController::class, 'filter'])->name('filter.dusun');

    // Penduduk
    Route::resource('penduduk', PendudukController::class);
    Route::get('/search/penduduk', [PendudukController::class, 'search'])->name('search.penduduk');
    Route::get('/filter/penduduk', [PendudukController::class, 'filter'])->name('filter.penduduk');
    Route::post('value/nik/{id}', [PendudukController::class, 'nikValue'])->name('nik.value');
    Route::post('value/status/{id}', [PendudukController::class, 'statusValue'])->name('status.value');
    Route::post('value/pekerjaan/{id}', [PendudukController::class, 'pekerjaanValue'])->name('pekerjaan.value');

    // kk
    Route::resource('kartukeluarga', KartuKeluargaController::class);
    Route::get('/search/kartukeluarga', [KartuKeluargaController::class, 'search'])->name('search.kartukeluarga');
    Route::get('/filter/kartukeluarga', [KartuKeluargaController::class, 'filter'])->name('filter.kartukeluarga');

    // kk detail
    Route::resource('kartukeluarga-detail', DetailKartuKeluargaController::class);
    Route::get('kartukeluarga-dtl/{id}', [DetailKartuKeluargaController::class, 'create'])->name('create.kk.detail');
    Route::get('kartukeluarga-dtl/edit/{id}/{kk?}', [DetailKartuKeluargaController::class, 'edit'])->name('edit.kk.detail');

    // kematian
    Route::resource('kematian', KematianController::class);
    Route::get('/search/kematian', [KematianController::class, 'search'])->name('search.kematian');
    Route::get('/filter/kematian', [KematianController::class, 'filter'])->name('filter.kematian');

    // kelahiran
    Route::resource('kelahiran', KelahiranController::class);
    Route::get('/search/kelahiran', [KelahiranController::class, 'search'])->name('search.kelahiran');
    Route::get('/filter/kelahiran', [KelahiranController::class, 'filter'])->name('filter.kelahiran');

    // Mutasi
    Route::resource('mutasi', MutasiController::class);
    Route::get('/search/mutasi', [MutasiController::class, 'search'])->name('search.mutasi');
    Route::get('/filter/mutasi', [MutasiController::class, 'filter'])->name('filter.mutasi');
    Route::get('/approv/mutasi/{id}', [MutasiController::class, 'approv'])->name('approv.mutasi');

    // Surat
    Route::resource('surat', SuratController::class);

    // User
    Route::resource('user', UserController::class);
    Route::get('/search/user', [UserController::class, 'search'])->name('search.user');

    // Account
    Route::resource('account', AccountControoler::class);


    Route::prefix('print')->group(function(){
        Route::get('dusun', [CetakController::class, 'dusun'])->name('print.dusun');
        Route::get('penduduk', [CetakController::class, 'penduduk'])->name('print.penduduk');
        Route::get('kartu/keluarga', [CetakController::class, 'kartuKeluarga'])->name('print.kartu.keluarga');
        Route::get('kartu/keluarga/detail/{id}', [CetakController::class, 'kartuKeluargaDetail'])->name('print.kartu.keluarga.detail');
        Route::get('kematian', [CetakController::class, 'kematian'])->name('print.kematian');
        Route::get('kelahiran', [CetakController::class, 'kelahiran'])->name('print.kelahiran');
        Route::get('mutasi', [CetakController::class, 'mutasi'])->name('print.mutasi');
    });

    Route::prefix('export')->group(function(){
        Route::get('dusun', [ExportController::class, 'dusun'])->name('export.dusun');
        Route::get('penduduk', [ExportController::class, 'penduduk'])->name('export.penduduk');
        Route::get('kartu/keluarga', [ExportController::class, 'kartuKeluarga'])->name('export.kartuKeluarga');
        Route::get('kartu/keluarga/detail/{id}', [ExportController::class, 'kartuKeluargaDetail'])->name('export.kartuKeluarga.detail');
        Route::get('kematian', [ExportController::class, 'kematian'])->name('export.kematian');
        Route::get('kelahiran', [ExportController::class, 'kelahiran'])->name('export.kelahiran');
        Route::get('mutasi', [ExportController::class, 'mutasi'])->name('export.mutasi');
    });

    Route::prefix('import')->group(function(){
        Route::post('dusun', [ImportController::class, 'dusun'])->name('import.dusun');
        Route::post('penduduk', [ImportController::class, 'penduduk'])->name('import.penduduk');
        Route::post('kartukeluarga', [ImportController::class, 'kartukeluarga'])->name('import.kartukeluarga');
        Route::post('kematian', [ImportController::class, 'kematian'])->name('import.kematian');
        Route::post('kelahiran', [ImportController::class, 'kelahiran'])->name('import.kelahiran');
        Route::post('mutasi', [ImportController::class, 'mutasi'])->name('import.mutasi');
    });

    Route::prefix('template')->group(function(){
        Route::get('dusun', [TemplateController::class, 'dusun'])->name('template.dusun');
        Route::get('penduduk', [TemplateController::class, 'penduduk'])->name('template.penduduk');
        Route::get('kartukeluarga', [TemplateController::class, 'kartukeluarga'])->name('template.kartukeluarga');
        Route::get('kartukeluarga/detail', [TemplateController::class, 'kartuKeluargaDetail'])->name('template.kartuKeluargaDetail');
        Route::get('kematian', [TemplateController::class, 'kematian'])->name('template.kematian');
        Route::get('kelahiran', [TemplateController::class, 'kelahiran'])->name('template.kelahiran');
        Route::get('mutasi', [TemplateController::class, 'mutasi'])->name('template.mutasi');
    });

});

// Auth
Auth::routes();
