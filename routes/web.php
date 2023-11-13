<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\TagihanController;

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

Route::get('/', function () {
    return view('user.beranda');
});

// Route::get('/editprofile', function () {
//     return view('user.editprofile');
// });

Route::get('/regis', function () {
    return redirect()->route('registrasi');
});

// beranda-admin
Route::get('/admin', function () {
    return view('admin.admin');
})->name('admin');

Route::get('/admin-pesanan', function () {
    return view('admin.admin-pesanan');
})->name('admin-pesanan');

Route::get('/admin-pesanan-sudah', function () {
    return view('admin.admin-pesanan-sudah');
})->name('admin-pesanan-sudah');

Route::get('/validasi-pesanan', function () {
    return view('admin.validasi-pesanan');
})->name('validasi-pesanan');

Route::get('/tidak-validasi-pesanan', function () {
    return view('admin.tidak-validasi-pesanan');
})->name('tidak-validasi-pesanan');

Route::get('/admin-pembayaran', function () {
    return view('admin.admin-pembayaran');
})->name('admin-pembayaran');

Route::get('/admin-pembayaran-sudah', function () {
    return view('admin.admin-pembayaran-sudah');
})->name('admin-pembayaran-sudah');

Route::get('/validasi-pembayaran', function () {
    return view('admin.validasi-pembayaran');
})->name('validasi-pembayaran');

Route::get('/tidak-validasi-pembayaran', function () {
    return view('admin.tidak-validasi-pembayaran');
})->name('tidak-validasi-pembayaran');

Route::get('/admin-kelolaPenghuni', function () {
    return view('admin.admin-kelolaPenghuni');
})->name('admin-kelolaPenghuni');

Route::get('/tambah-penghuni', function () {
    return view('admin.tambah-penghuni');
})->name('tambah-penghuni');

Route::get('/lihat-detail-kelolaPenghuni', function () {
    return view('admin.lihat-detail-kelolaPenghuni');
})->name('lihat-detail-kelolaPenghuni');

Route::get('/edit-kelolaPenghuni', function () {
    return view('admin.edit-kelolaPenghuni');
})->name('edit-kelolaPenghuni');

Route::middleware('auth')->group(function () {
    // Pemesanan
    Route::get('/pesan', [PesanController::class, 'create'])->name('pesan');
    Route::post('/pesan', [PesanController::class, 'store']);
    Route::get('/statuspesan', function () {return view('user.statuspemesanan');});
    
    // Pembayaran
    

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
    })->name('perpanjangan]');
    
    // artisan command line interface in laravel
    Route::get('/artisan-cli', function () {
        return view('artisan-cli');
    })->name('artisan-cli');
    Route::post('/artisan-cli', function (Request $request) {
        $request->validate([
            'command' => 'required|string',
        ]);
        try {
            Artisan::call($request->input('command'));
        } catch (\Exception $e) {
            return view('artisan-cli', [
                'output' => $e->getMessage(),
            ]);
        }
        $output = Artisan::output();
        return view('artisan-cli', [
            'output' => $output,
        ]);
    });

    // laravel Example
    Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');


});

require __DIR__.'/auth.php';
