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
    return view('dashboard');
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