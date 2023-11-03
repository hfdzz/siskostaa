<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pemesanan;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PesanController extends Controller
{
    static $status_pemesanan = [
        'pending' => '0',
        'menunggu_pembayaran' => '1',
        'ditolak' => '2',
        'selesai' => '3',
    ];

    public function create()
    {
        return view('user.pemesanan');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nama' => 'required|string',
            'email' => 'required|email',
            'no_hp' => 'required|string|regex:/^[0-9]+$/',
            'perguruan_tinggi' => 'required|string',
            'nik' => 'required|string|size:16',
            'jenis_kelamin' => 'required|string|in:L,P',
            'tanggal_masuk' => 'required|date',
            'jenis_kamar' => 'required|string|in:ac,non-ac',
            'jenis_pembayaran' => 'required|string|in:penuh,dp',
        ]);

        // check if user already logged in
        if (!auth()->check()) {
            return redirect()->route('login')->withErrors(['Silahkan login terlebih dahulu']);
        }

        // check if user has pemesanan with status other than 'selesai' from 'pemesanan' table
        /** @var \App\Models\User $user **/
        $user = auth()->user();
        if ($user->pemesanan()->where('status_pemesanan', '!=', self::$status_pemesanan['selesai'])->exists()) {
            return redirect()->route('pesan')->withErrors(['pemesanan' => 'Anda sudah memiliki pemesanan yang belum selesai']);
        }

        $pemesanan = Pemesanan::create([
            'nama' => $request->input('nama'),
            'email' => $request->input('email'),
            'no_hp' => $request->input('no_hp'),
            'perguruan_tinggi' => $request->input('perguruan_tinggi'),
            'nik' => $request->input('nik'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'tanggal_masuk' => $request->input('tanggal_masuk'),
            'jenis_kamar' => $request->input('jenis_kamar'),
            'jenis_pembayaran' => $request->input('jenis_pembayaran'),
            'status_pemesanan' => self::$status_pemesanan['pending'],
            'nomor_kamar' => '0',
            'user_id' => $user->id,
        ]);

        return redirect('/statuspesan');
    }
}