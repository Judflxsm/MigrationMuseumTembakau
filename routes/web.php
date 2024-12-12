<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KoleksiController;
use App\Http\Controllers\AcaraController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProgramDonasiController;
use App\Http\Controllers\TiketController;
use App\Http\Controllers\InfoMuseumController;
use App\Http\Controllers\TestController;

// -----------------------------------------
// Public Routes
// -----------------------------------------
Route::get('/', [InfoMuseumController::class, 'index'])->name('info-museum.index'); // Halaman utama (Info Museum)


// Route::get('/koleksi', [KoleksiController::class, 'index'])->name('koleksi.index'); // Halaman koleksi untuk pengguna biasa
Route::get('/acara', [AcaraController::class, 'index'])->name('acara.index'); // Halaman acara
Route::get('/program-donasi', [ProgramDonasiController::class, 'index'])->name('program-donasi.index'); // Halaman program donasi
Route::get('/tiket', [TiketController::class, 'index'])->name('tiket.index'); // Halaman tiket


// -----------------------------------------
// Login Routes
// -----------------------------------------
// Route untuk halaman login
Route::get('admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login.form');
// Route untuk mengirimkan data login
Route::post('admin/login', [AdminController::class, 'login'])->name('admin.login');
// Route untuk halaman dashboard setelah login
Route::get('admin/index', [AdminController::class, 'dashboard'])->name('admin.dashboard');


// -----------------------------------------
// Admin Routes
// -----------------------------------------
// Halaman Dashboard Admin
Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
// Route untuk Manajemen Acara (ubah menjadi readadminacara)
Route::get('admin/adminacara/readadminacara', [AdminController::class, 'readAdminAcara'])->name('admin.read_adminacara');
// Route untuk Manajemen Koleksi (ubah menjadi readadminkoleksi)
// Route::get('admin/adminkoleksi/readadminkoleksi', [AdminController::class, 'readAdminKoleksi'])->name('admin.read_adminkoleksi');

// -----------------------------------------
// Admin Koleksi Routes
// -----------------------------------------
Route::get('koleksi', [KoleksiController::class, 'showKoleksi'])->name('koleksi'); // User
Route::get('admin/koleksi', [AdminController::class, 'readAdminKoleksi'])->name('admin.read_adminkoleksi'); // Yang mengarahkan ke dashboard
Route::get('admin/koleksi', [KoleksiController::class, 'indexadmin'])->name('admin.adminkoleksi.readadminkoleksi'); // Setelah upload, akan kembali kesini
Route::post('admin/koleksi', [KoleksiController::class, 'store'])->name('readadminkoleksi.store'); // Setelah upload, akan kembali kesini
Route::put('admin/{id}/edit', [KoleksiController::class, 'edit'])->name('readadminkoleksi.edit'); 
Route::put('admin/{id}', [KoleksiController::class, 'update'])->name('readadminkoleksi.update'); 
Route::delete('admin/{id}/destroy', [KoleksiController::class, 'destroy'])->name('koleksi.destroy');

// Route::post('admin/readadminkoleksi/store', [KoleksiController::class, 'store'])->name('readadminkoleksi.store');
// Route::middleware(['auth'])->group(function () {
//     Route::post('admin/koleksi/readadminkoleksi', [KoleksiController::class, 'store'])->name('readadminkoleksi.store');
// });

// Route::resource('readadminkoleksi', [KoleksiController::class]);
// Route::post('readadminkoleksi', [KoleksiController::class, 'store'])->name('readadminkoleksi.store');
// Route::get('readadminkoleksi', [AdminController::class, 'readAdminKoleksi'])->name('admin.read_adminkoleksi');
// Route::get('readadminkoleksi', [KoleksiController::class, 'store'])->name('admin.read_adminkoleksi');


// Route untuk Manajemen Koleksi (ubah menjadi readadmintiket)
Route::get('admin/admintiket/readadminkoleksi', [AdminController::class, 'readAdminTiket'])->name('admin.read_admintiket');