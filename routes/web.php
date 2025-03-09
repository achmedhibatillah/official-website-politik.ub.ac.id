<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LogicController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\KurikulumController;
use App\Http\Controllers\MataKuliahController;

Route::get('/', [HomeController::class, 'index']);
Route::get('s', function() { return response()->json(session()->all()); });
Route::get('d', [LogicController::class, 'd']);

// ADMIN
Route::get('admin', function() { return redirect()->to('dashboard-admin'); });
Route::get('dashboard-admin', [AdminController::class, 'index']);

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
Route::get('admin-hapus-matkul/{slug}', [MataKuliahController::class, 'delete']);

Route::get('admin-dosen', [AdminController::class, 'dosen']);
Route::post('admin-simpan-dosen', [DosenController::class, 'add']);
