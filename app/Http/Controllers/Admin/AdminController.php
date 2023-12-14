<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pemesanan;
use App\Models\Tagihan;
use App\Models\Kamar;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // dashboard admin
    public function index()
    {
        // get number of pemesanan and tagihan waiting for validation
        $pemesanan = Pemesanan::where('status', Pemesanan::$kode_status['menunggu_validasi'])->count();
        $tagihan = Tagihan::where('status', Pemesanan::$kode_status['menunggu_validasi'])->count();
        
        // get occupied kamar count (pemesasan_id != null)
        $kamar = Kamar::where('pemesanan_id', '!=', null)->count();

        return view('admin.admin', [
            'pemesanan' => $pemesanan,
            'tagihan' => $tagihan,
            'kamar' => $kamar,
        ]);
    }
}
