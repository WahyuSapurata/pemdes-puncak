<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['namespace' => 'App\Http\Controllers'], function () {
    Route::get('/', 'Dashboard@index')->name('home.index');

    Route::get('/', 'Home@index')->name('home');
    Route::get('/profil-desa', 'ProfilDesaController@profil_desa')->name('profil-desa');
    Route::get('/geojson', 'ProfilDesaController@geojson')->name('geojson');

    Route::group(['prefix' => 'login', 'middleware' => ['guest'], 'as' => 'login.'], function () {
        Route::get('/login-akun', 'Auth@show')->name('login-akun');
        Route::post('/login-proses', 'Auth@login_proses')->name('login-proses');
    });

    Route::group(['prefix' => 'admin', 'middleware' => ['auth'], 'as' => 'admin.'], function () {
        Route::get('/dashboard-admin', 'Dashboard@dashboard_admin')->name('dashboard-admin');

        Route::get('/berita', 'BeritaController@index')->name('berita');
        Route::get('/berita-get', 'BeritaController@get')->name('berita-get');
        Route::get('/berita-tambah', 'BeritaController@add')->name('berita-tambah');
        Route::post('/berita-store', 'BeritaController@store')->name('berita-store');
        Route::get('/berita-edit/{params}', 'BeritaController@edit')->name('berita-edit');
        Route::post('/berita-update/{params}', 'BeritaController@update')->name('berita-update');
        Route::delete('/berita-delete/{params}', 'BeritaController@delete')->name('berita-delete');

        Route::get('/pengumuman', 'PengumumanController@index')->name('pengumuman');
        Route::get('/pengumuman-get', 'PengumumanController@get')->name('pengumuman-get');
        Route::get('/pengumuman-tambah', 'PengumumanController@add')->name('pengumuman-tambah');
        Route::post('/pengumuman-store', 'PengumumanController@store')->name('pengumuman-store');
        Route::get('/pengumuman-edit/{params}', 'PengumumanController@edit')->name('pengumuman-edit');
        Route::post('/pengumuman-update/{params}', 'PengumumanController@update')->name('pengumuman-update');
        Route::delete('/pengumuman-delete/{params}', 'PengumumanController@delete')->name('pengumuman-delete');
        Route::get('/button-pengumuman/{params}', 'PengumumanController@update_tombol')->name('button-pengumuman');

        Route::get('/kegiatan', 'KegiatanController@index')->name('kegiatan');
        Route::get('/kegiatan-get', 'KegiatanController@get')->name('kegiatan-get');
        Route::get('/kegiatan-tambah', 'KegiatanController@add')->name('kegiatan-tambah');
        Route::post('/kegiatan-store', 'KegiatanController@store')->name('kegiatan-store');
        Route::get('/kegiatan-edit/{params}', 'KegiatanController@edit')->name('kegiatan-edit');
        Route::post('/kegiatan-update/{params}', 'KegiatanController@update')->name('kegiatan-update');
        Route::delete('/kegiatan-delete/{params}', 'KegiatanController@delete')->name('kegiatan-delete');

        Route::get('/galeri', 'GaleriController@index')->name('galeri');
        Route::get('/galeri-get', 'GaleriController@get')->name('galeri-get');
        Route::get('/galeri-tambah', 'GaleriController@add')->name('galeri-tambah');
        Route::post('/galeri-store', 'GaleriController@store')->name('galeri-store');
        Route::get('/galeri-edit/{params}', 'GaleriController@edit')->name('galeri-edit');
        Route::post('/galeri-update/{params}', 'GaleriController@update')->name('galeri-update');
        Route::delete('/galeri-delete/{params}', 'GaleriController@delete')->name('galeri-delete');

        Route::get('/profil-desa', 'ProfilDesaController@index')->name('profil-desa');
        Route::get('/profil-desa-get', 'ProfilDesaController@get')->name('profil-desa-get');
        Route::get('/profil-desa-tambah', 'ProfilDesaController@add')->name('profil-desa-tambah');
        Route::post('/profil-desa-store', 'ProfilDesaController@store')->name('profil-desa-store');
        Route::get('/profil-desa-edit/{params}', 'ProfilDesaController@edit')->name('profil-desa-edit');
        Route::post('/profil-desa-update/{params}', 'ProfilDesaController@update')->name('profil-desa-update');
        Route::delete('/profil-desa-delete/{params}', 'ProfilDesaController@delete')->name('profil-desa-delete');

        Route::get('/struktur-desa', 'StrukturPemerintahanController@index')->name('struktur-desa');
        Route::get('/struktur-desa-get', 'StrukturPemerintahanController@get')->name('struktur-desa-get');
        Route::get('/struktur-desa-tambah', 'StrukturPemerintahanController@add')->name('struktur-desa-tambah');
        Route::post('/struktur-desa-store', 'StrukturPemerintahanController@store')->name('struktur-desa-store');
        Route::get('/struktur-desa-edit/{params}', 'StrukturPemerintahanController@edit')->name('struktur-desa-edit');
        Route::post('/struktur-desa-update/{params}', 'StrukturPemerintahanController@update')->name('struktur-desa-update');
        Route::delete('/struktur-desa-delete/{params}', 'StrukturPemerintahanController@delete')->name('struktur-desa-delete');

        Route::prefix('infografis')->group(function () {
            Route::get('/penduduk', 'PendudukController@index')->name('penduduk');
            Route::get('/penduduk-get', 'PendudukController@get')->name('penduduk-get');
            Route::post('/penduduk-add', 'PendudukController@store')->name('penduduk-add');
            Route::get('/penduduk-show/{params}', 'PendudukController@show')->name('penduduk-show');
            Route::post('/penduduk-update/{params}', 'PendudukController@update')->name('penduduk-update');
            Route::delete('/penduduk-delete/{params}', 'PendudukController@delete')->name('penduduk-delete');

            Route::get('/apbds', 'APBDSController@index')->name('apbds');
            Route::get('/apbds-get/{params}', 'APBDSController@get')->name('apbds-get');
            Route::post('/apbds-add', 'APBDSController@store')->name('apbds-add');
            Route::get('/apbds-show/{params}', 'APBDSController@show')->name('apbds-show');
            Route::post('/apbds-update/{params}', 'APBDSController@update')->name('apbds-update');
            Route::delete('/apbds-delete/{params}', 'APBDSController@delete')->name('apbds-delete');

            Route::get('/penerima-bansos', 'PenerimaBansosController@index')->name('penerima-bansos');
            Route::get('/penerima-bansos-get', 'PenerimaBansosController@get')->name('penerima-bansos-get');
            Route::post('/penerima-bansos-add', 'PenerimaBansosController@store')->name('penerima-bansos-add');
            Route::get('/penerima-bansos-show/{params}', 'PenerimaBansosController@show')->name('penerima-bansos-show');
            Route::post('/penerima-bansos-update/{params}', 'PenerimaBansosController@update')->name('penerima-bansos-update');
            Route::delete('/penerima-bansos-delete/{params}', 'PenerimaBansosController@delete')->name('penerima-bansos-delete');
            Route::post('/penyaluran-bansos-add', 'PenyaluranBansosController@store')->name('penyaluran-bansos-add');

            Route::get('/riwayat-penduduk', 'RiwayatPendudukController@index')->name('riwayat-penduduk');
            Route::get('/riwayat-penduduk-get', 'RiwayatPendudukController@get')->name('riwayat-penduduk-get');
            Route::post('/riwayat-penduduk-add', 'RiwayatPendudukController@store')->name('riwayat-penduduk-add');
            Route::get('/riwayat-penduduk-show/{params}', 'RiwayatPendudukController@show')->name('riwayat-penduduk-show');
            Route::post('/riwayat-penduduk-update/{params}', 'RiwayatPendudukController@update')->name('riwayat-penduduk-update');
            Route::delete('/riwayat-penduduk-delete/{params}', 'RiwayatPendudukController@delete')->name('riwayat-penduduk-delete');

            Route::get('/sdgs', 'SdgsKeluargaController@index')->name('sdgs');
            Route::get('/sdgs-get', 'SdgsKeluargaController@get')->name('sdgs-get');
            Route::post('/sdgs-add', 'SdgsKeluargaController@store')->name('sdgs-add');
            Route::get('/sdgs-show/{params}', 'SdgsKeluargaController@show')->name('sdgs-show');
            Route::post('/sdgs-update/{params}', 'SdgsKeluargaController@update')->name('sdgs-update');
            Route::delete('/sdgs-delete/{params}', 'SdgsKeluargaController@delete')->name('sdgs-delete');
        });

        Route::get('/lapak-desa', 'LapakDesaController@index')->name('lapak-desa');
        Route::get('/lapak-desa-get', 'LapakDesaController@get')->name('lapak-desa-get');
        Route::get('/lapak-desa-tambah', 'LapakDesaController@add')->name('lapak-desa-tambah');
        Route::post('/lapak-desa-store', 'LapakDesaController@store')->name('lapak-desa-store');
        Route::get('/lapak-desa-edit/{params}', 'LapakDesaController@edit')->name('lapak-desa-edit');
        Route::post('/lapak-desa-update/{params}', 'LapakDesaController@update')->name('lapak-desa-update');
        Route::delete('/lapak-desa-delete/{params}', 'LapakDesaController@delete')->name('lapak-desa-delete');
    });

    Route::get('/logout', 'Auth@logout')->name('logout');
});
