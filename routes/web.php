<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LogicController;

use App\Http\Controllers\AuthenticationController;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\HomeBeritaController;
use App\Http\Controllers\KurikulumController;
use App\Http\Controllers\MataKuliahController;
use App\Http\Controllers\TenagaPendidikController;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomePengumumanController;
use App\Http\Controllers\MenuController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\GuestMidlleware;
use Illuminate\Auth\Middleware\Authenticate;

Route::get('/', [HomeController::class, 'index']);
Route::get('s', function() { return response()->json(session()->all()); });
Route::get('d', [LogicController::class, 'd']);

Route::middleware([GuestMidlleware::class])->group(function () {
    Route::get('login-admin', [AuthenticationController::class, 'index']);
    Route::post('authentication-admin', [AuthenticationController::class, 'authentication_admin']);
});

// GUEST
Route::get('berita', [HomeBeritaController::class, 'index']);
Route::get('berita/{slug}', [HomeBeritaController::class, 'detail']);
Route::get('pengumuman', [HomePengumumanController::class, 'index']);
Route::get('pengumuman/{slug}', [HomePengumumanController::class, 'detail']);

// ADMIN
Route::get('admin', function() { return redirect()->to('admin-dashboard'); });
Route::middleware([AdminMiddleware::class])->group(function () {

    Route::get('admin-dashboard', [AdminController::class, 'index']);
    Route::get('admin-kategori-{slug}', [AdminController::class, 'kategori']);

    // Independen
    Route::get('admin-kurikulum', [AdminController::class, 'kurikulum']);
    Route::get('admin-tambah-kurikulum', [AdminController::class, 'kurikulum_tambah']);
    Route::post('admin-simpan-kurikulum', [KurikulumController::class, 'add']);
    Route::post('admin-activate-kurikulum', [KurikulumController::class, 'activate']);
    Route::get('admin-kurikulum/{slug}', [AdminController::class, 'kurikulum']);
    Route::get('admin-edit-kurikulum/{slug}', [AdminController::class, 'kurikulum_edit']);
    Route::get('admin-hapus-kurikulum/{slug}', [KurikulumController::class, 'delete']);
    Route::post('admin-update-kurikulum', [KurikulumController::class, 'update']);

    Route::get('admin-mata-kuliah', [AdminController::class, 'matkul']);
    Route::get('admin-tambah-matkul', [AdminController::class, 'matkul_tambah']);
    Route::post('admin-simpan-matkul', [MataKuliahController::class, 'add']);
    Route::post('admin-session-kurikulum', [MataKuliahController::class, 'session_kurikulum']);
    Route::get('admin-mata-kuliah/{slug}', [AdminController::class, 'matkul_detail']);
    Route::get('admin-edit-matkul/{slug}', [AdminController::class, 'matkul_edit']);
    Route::get('admin-hapus-matkul/{slug}', [MataKuliahController::class, 'delete']);
    Route::post('admin-update-matkul', [MataKuliahController::class, 'update']);

    Route::get('admin-dosen', [AdminController::class, 'dosen']);
    Route::get('admin-dosen/{slug}', [AdminController::class, 'dosen_detail']);
    Route::get('admin-tambah-dosen', [AdminController::class, 'dosen_tambah']);
    Route::post('admin-simpan-dosen', [DosenController::class, 'add']);
    Route::get('admin-tambah-dosen/step-2/{slug}', [AdminController::class, 'dosen_tambah_step2']);
    Route::get('admin-tambah-dosen/step-3/{slug}', [AdminController::class, 'dosen_tambah_step3']);
    Route::post('admin-simpan-dosen/step-2', [DosenController::class, 'add_step2']);
    Route::post('admin-simpan-dosen/step-3', [DosenController::class, 'add_step3']);
    Route::get('admin-fokus-riset-dosen', [AdminController::class, 'dosen_fokus_riset']);
    Route::post('admin-simpan-fr', [DosenController::class, 'fr_add']);
    Route::get('admin-hapus-fr/{slug}', [DosenController::class, 'fr_delete']);
    Route::get('admin-edit-dosen/{slug}', [AdminController::class, 'dosen_edit']);
    Route::post('admin-update-dosen', [DosenController::class, 'update']);
    Route::get('admin-edit-profil-akademik-dosen/{slug}', [AdminController::class, 'dosen_edit_profil_akademik']);
    Route::get('admin-edit-fokus-riset-dosen/{slug}', [AdminController::class, 'dosen_edit_fokus_riset']);
    Route::get('admin-atur-mata-kuliah-dosen/{slug}', [AdminController::class, 'dosen_atur_mata_kuliah']);
    Route::post('admin-simpan-mata-kuliah-dosen', [DosenController::class, 'mk_update']);
    Route::get('admin-hapus-dosen/{slug}', [DosenController::class, 'delete']);

    Route::get('admin-tenaga-pendidik', [AdminController::class, 'tendik']);
    Route::get('admin-tambah-tendik', [AdminController::class, 'tendik_tambah']);
    Route::post('admin-simpan-tendik', [TenagaPendidikController::class, 'add']);
    Route::get('admin-edit-tendik/{slug}', [AdminController::class, 'tendik_edit']);
    Route::post('admin-update-tendik', [TenagaPendidikController::class, 'update']);
    Route::get('admin-hapus-tendik/{slug}', [TenagaPendidikController::class, 'delete']);

    Route::get('admin-berita', [AdminController::class, 'berita']); 
    Route::get('admin-tambah-berita', [AdminController::class, 'berita_tambah']); 
    Route::post('admin-simpan-berita', [BeritaController::class, 'add']); 
    Route::get('admin-activate-berita/{slug}', [BeritaController::class, 'activate']); 
    Route::get('admin-deactivate-berita/{slug}', [BeritaController::class, 'deactivate']); 
    Route::get('admin-berita/{slug}', [AdminController::class, 'berita_detail']); 
    Route::get('admin-edit-berita/{slug}', [AdminController::class, 'berita_edit']); 
    Route::post('admin-update-berita', [BeritaController::class, 'update']);
    Route::get('admin-hapus-berita/{slug}', [BeritaController::class, 'delete']); 

    Route::get('admin-pengumuman', [AdminController::class, 'pengumuman']); 
    Route::get('admin-tambah-pengumuman', [AdminController::class, 'pengumuman_tambah']); 
    Route::post('admin-simpan-pengumuman', [PengumumanController::class, 'add']); 
    Route::get('admin-activate-pengumuman/{slug}', [PengumumanController::class, 'activate']); 
    Route::get('admin-deactivate-pengumuman/{slug}', [PengumumanController::class, 'deactivate']); 
    Route::get('admin-pengumuman/{slug}', [AdminController::class, 'pengumuman_detail']); 
    Route::get('admin-edit-pengumuman/{slug}', [AdminController::class, 'pengumuman_edit']); 
    Route::post('admin-update-pengumuman', [PengumumanController::class, 'update']);
    Route::get('admin-hapus-pengumuman/{slug}', [PengumumanController::class, 'delete']); 

    // Dependen
    Route::get('admin-{slug}', [AdminController::class, 'update_menu']); 
    Route::post('admin-update-menu-konten', [MenuController::class, 'update_konten']); 
    Route::post('admin-update-menu-status', [MenuController::class, 'update_status']); 
    Route::post('admin-update-menu-show', [MenuController::class, 'update_show']); 
    Route::post('admin-update-menu-gambar', [MenuController::class, 'update_gambar']); 

});

Route::get('/{slug}', [HomeController::class, 'menu']);