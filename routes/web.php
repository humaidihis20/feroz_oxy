<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArtikelsAdminController;
use App\Http\Controllers\ArtikelsController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AuthUserController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomeProfileController;
use App\Http\Controllers\HomeTestimonialsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeUserController;
use App\Http\Controllers\HomeUtamaController;
use App\Http\Controllers\KonfirmasiPembayaranController;
use App\Http\Controllers\PesanAirMinumUserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfileUserController;
use App\Http\Controllers\TestimonialController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();


Route::get('/', [HomeUtamaController::class, 'index'])->name('home')->middleware('guest');
Route::get('profile', [ProfileController::class, 'index'])->name('profile')->middleware('guest');
Route::get('testimonials', [TestimonialController::class, 'index'])->name('testimonials')->middleware('guest');
Route::get('detail_artikels/{slug}', [HomeUtamaController::class, 'show'])->name('detail_artikels')->middleware('guest');

/// arahkan ke link ini ketika user klik "login with google"
Route::get('auth/google', [LoginController::class, 'google']);
/// siapkan route untuk menampung callback dari google
Route::get('auth/google/callback', [LoginController::class, 'google_callback']);

Route::middleware(['auth'])->group(function () {

  Route::get('/home', [HomeController::class, 'index'])->name('home');

  Route::middleware(['admin'])->group(function () {
    // Halaman Admin
    Route::get('admin', [DashboardAdminController::class, 'index']);

    // Artikels Admin
    Route::get('artikels', [ArtikelsAdminController::class, 'index']);
    Route::post('artikelscreate', [ArtikelsAdminController::class, 'store']);
    Route::get('artikels_edit/{id}', [ArtikelsAdminController::class, 'edit']);
    Route::delete('artikels_hapus/{id}', [ArtikelsAdminController::class, 'destroy']);

    // User
    Route::get('users', [AuthUserController::class, 'isAdmin']);
    Route::post('usercreate', [AuthUserController::class, 'register']);
    Route::get('users_edit/{id}', [AuthUserController::class, 'editUser']);
    Route::post('update_user', [AuthUserController::class, 'register'])->name('update_user');
    Route::delete('delete_user/{id}', [AuthUserController::class, 'deleteUser']);

    // Pesanan Air
    Route::get('pesanan_air', [AuthUserController::class, 'pesanAir']);
    Route::delete('delete_pesanan_air/{id}', [AuthUserController::class, 'deletePesanAir']);
    Route::get('confirm/{id}', [KonfirmasiPembayaranController::class, 'confirm'])->name('confirm.pembayaran');
  });

  Route::middleware(['user'])->group(function () {
    // Halaman User
    Route::get('user', [HomeUserController::class, 'index']);
    Route::get('profile_home', [HomeProfileController::class, 'index']);

    // Profil User
    Route::get('profile_user/show/{id}', [ProfileUserController::class, 'show']);
    Route::get('edit_data_user/{id}', [ProfileUserController::class, 'edit']);
    Route::post('edit_data_user/update/{id}', [ProfileUserController::class, 'update']);

    // Pesanan Air Minum
    Route::get('konfirmasi_pembayaran', [PesanAirMinumUserController::class, 'index']);
    Route::get('pesan_air_minum', [PesanAirMinumUserController::class, 'create']);
    Route::post('tambah/checkout', [PesanAirMinumUserController::class, 'store']);
    Route::get('pembayaranedit/{id}', [PesanAirMinumUserController::class, 'edit']);
    Route::post('pembayaran', [PesanAirMinumUserController::class, 'update']);
    Route::get('editkonfirmasi/{id}', [PesanAirMinumUserController::class, 'getInfo']);

    // Konfirmasi Pembayaran
    Route::get('detail_pesanan', [KonfirmasiPembayaranController::class, 'index']);
    Route::post('konfirmasi_pembayaran', [KonfirmasiPembayaranController::class, 'store']);
    
    // PDF
    Route::get('invoice/cetak_pdf', [KonfirmasiPembayaranController::class, 'cetak_pdf'])->name('report.cetak-pdf');

    // Testimonial
    Route::get('testimonial_home', [HomeTestimonialsController::class, 'index']);
    Route::post('testimonial_home/store', [HomeTestimonialsController::class, 'store']);
    
    // Artikel
    Route::get('artikels/{slug}', [ArtikelsController::class, 'show']);
  });

  Route::get('logout', [LoginController::class, 'logout'])->name('logout');
});
