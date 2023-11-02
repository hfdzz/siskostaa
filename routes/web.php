<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PesanController;

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

Route::get('/pesan', [PesanController::class, 'create'])->name('pesan');

Route::post('/pesan', [PesanController::class, 'store']);

Route::get('/statuspesan', function () {
    return view('user.statuspemesanan');
});
Route::get('/editprofile', function () {
    return view('user.editprofile');
});

Route::get('/regis', function () {
    return redirect()->route('registrasi');
});


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

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
});

require __DIR__.'/auth.php';
