<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
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

Route::get('/', function () {
    return view('user.beranda');
});
Route::get('/pesan', function () {
    return view('user.pemesanan');
});
Route::get('/statuspesan', function () {
    return view('user.statuspemesanan');
});
Route::get('/login', function () {
    return view('user.login');
});
Route::get('/regis', function () {
    return view('user.registrasi');
});


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
})->name('artisan-cli');