<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\TagihanController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ValidasiPesananController;
use App\Http\Controllers\Admin\ValidasiPembayaranController;
use App\Http\Controllers\Admin\PenghuniController;
use App\Http\Controllers\ProfileKost\FasilitasController;
use App\Http\Controllers\ProfileKost\FaqController;
use App\Http\Controllers\ProfileKost\TentangController;
use App\Http\Controllers\ProfileKost\ProfileController as ProfileKostController;

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

Route::get('/', [ProfileKostController::class, 'beranda'])->name('beranda');

/**
 * 
 * FRONT-END FIX SEMUA ROUTING REGISTRASI (dari '/regis' -> '/registrasi')
 * 
 */
Route::get('/regis', function () {
    return redirect()->route('registrasi');
});

// Auth user routes
Route::middleware('auth')->group(function () {
    // Pemesanan
    Route::get('/pesan', [PesanController::class, 'create'])->name('pesan');
    Route::post('/pesan', [PesanController::class, 'store']);
    Route::get('/statuspesan', function () {return view('user.statuspemesanan');});
    
    // User Profile
    Route::get('/editprofile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/editprofile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/editprofile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Riwayat Pemesanan
    Route::get('/riwayat-pemesanan', [PesanController::class, 'riwayat'])->name('riwayat-pemesanan');

    // Tagihan & Pembayaran
    Route::get('/tagihan', [TagihanController::class, 'get'])->name('tagihan');
    Route::get('/bayar', [TagihanController::class, 'getPembayaran'])->name('bayar');
    Route::post('/bayar', [TagihanController::class, 'bayar']);

    //Perpanjangan
    Route::get('/perpanjangan', function () {
        return view('user.perpanjangan');
    })->name('perpanjangan');
    
    // laravel Example
    Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');
});

// Admin routes with 'can:admin' middleware
Route::middleware(['auth', 'can:admin'])->group(function () {
    /**
     * TODO:
     * - use Route::resource() for CRUD routes
     */

    // Admin Dashboard
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    
    // Validasi Pesanan
    Route::get('/admin-pesanan', [ValidasiPesananController::class, 'index'])->name('admin-pesanan');
    Route::get('/admin-pesanan-sudah', [ValidasiPesananController::class, 'indexSudah'])->name('admin-pesanan-sudah');

    Route::get('/validasi-pesanan/{pesanan_id}', [ValidasiPesananController::class, 'getValidasiPesanan'])->name('validasi-pesanan');
    Route::post('/validasi-pesanan/{pesanan_id}', [ValidasiPesananController::class, 'postValidasiPesanan']);
    
    Route::get('/tidak-validasi-pesanan/{pesanan_id}', [ValidasiPesananController::class, 'getTidakValidasiPesanan'])->name('tidak-validasi-pesanan');
    Route::post('/tidak-validasi-pesanan/{pesanan_id}', [ValidasiPesananController::class, 'postTidakValidasiPesanan']);
    
    // Validasi Pembayaran
    Route::get('/admin-pembayaran', [ValidasiPembayaranController::class, 'index'])->name('admin-pembayaran');
    Route::get('/admin-pembayaran-sudah', [ValidasiPembayaranController::class, 'indexSudah'])->name('admin-pembayaran-sudah');

    Route::get('/validasi-pembayaran/{tagihan_id}', [ValidasiPembayaranController::class, 'getValidasiTagihan'])->name('validasi-pembayaran');
    Route::post('/validasi-pembayaran/{tagihan_id}', [ValidasiPembayaranController::class, 'postValidasiTagihan']);

    Route::get('/tidak-validasi-pembayaran/{tagihan_id}', [ValidasiPembayaranController::class, 'getTidakValidasiTagihan'])->name('tidak-validasi-pembayaran');
    Route::post('/tidak-validasi-pembayaran/{tagihan_id}', [ValidasiPembayaranController::class, 'postTidakValidasiTagihan']);

    // Kelola Penghuni
    Route::get('/admin-kelolaPenghuni', [PenghuniController::class, 'index'])->name('admin-kelolaPenghuni');

    Route::get('/tambah-penghuni', [PenghuniController::class, 'create'])->name('tambah-penghuni');
    Route::post('/tambah-penghuni', [PenghuniController::class, 'store']);

    Route::get('/lihat-detail-kelolaPenghuni/{kamar}', [PenghuniController::class, 'show'])->name('lihat-detail-kelolaPenghuni');

    Route::get('/edit-kelolaPenghuni/{kamar}', [PenghuniController::class, 'edit'])->name('edit-kelolaPenghuni');
    Route::patch('/edit-kelolaPenghuni/{kamar}', [PenghuniController::class, 'update']);

    Route::delete('/delete-kelolaPenghuni/{kamar}', [PenghuniController::class, 'destroy']);

    // Profile Kost
    Route::get('/profile-kost', [ProfileKostController::class, 'index'])->name('admin-profile-kost');

    Route::resource('profile-kost-fasilitas', FasilitasController::class)->except([
        'index', 'show'
    ])->parameters([
        'profile-kost-fasilitas' => 'fasilitas'
    ]);

    Route::resource('profile-kost-faq', FaqController::class)->except([
        'index', 'show'
    ])->parameters([
        'profile-kost-faq' => 'faq'
    ]);

    Route::get('profile-kost-tentang/edit', [TentangController::class, 'edit'])->name('profile-kost-tentang.edit');
    Route::patch('profile-kost-tentang/edit', [TentangController::class, 'update'])->name('profile-kost-tentang.update');
    
    // artisan command line interface in laravel
    Route::get('/artisan-cli', function () {
        return view('artisan-cli');
    })->name('artisan-cli');
    Route::post('/artisan-cli', function (Request $request) {
        try {
            Artisan::call($request->input('command'));
        }catch(Exception $e) {
            return view('artisan-cli', ['output' => $e->getMessage(),]);
        }
        return view('artisan-cli', ['output' => Artisan::output()]);
    });

});

require __DIR__.'/auth.php';
