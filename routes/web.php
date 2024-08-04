<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ApprovalController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\HistoryKembaliController;
use App\Http\Controllers\DashboardCarModelController;

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

Route::get('/', [LoginController::class, 'index']);
// Login
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
// Logout
Route::post('/logout', [LoginController::class, 'logout']);

// Dashboard
Route::get('/dashboard', function () {
    return view('dashboard.dashboard');
})->middleware('auth');

// ADMIN
// Karyawan
Route::resource('/dashboard/users', KaryawanController::class);
// Mobil
Route::resource('/dashboard/carmodels', DashboardCarModelController::class);
// Data Peminjaman
Route::resource('/dashboard/history-pinjam', HistoryController::class);
// Data Pengembalian
Route::resource('/dashboard/history-kembali', HistoryKembaliController::class);

// Rejected
Route::get('/rejected/{id}', [App\Http\Controllers\BookingController::class, 'rejected']);

// Cetak Laporan
Route::get('/dashboard/bookings/cetak_pdf',[BookingController::class, 'cetak_pdf']);
// USER
// Booking Mobil
Route::resource('/dashboard/bookings', BookingController::class);
// pengembalin mobil 
// Route::resource('/dashboard/pengembalians', PengembalianController::class);

// ADMIN & USER
// Laporan
Route::get('/dashboard/laporan', [LaporanController::class, 'index']);
// Ganti Password
Route::resource('/dashboard/setting', AdminController::class);
Route::post('/change-password', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('update-password');
// Profile
Route::get('/dashboard/profile', [ProfileController::class, 'edit']);
Route::post('/dashboard/profile/{id}', [ProfileController::class, 'update']);