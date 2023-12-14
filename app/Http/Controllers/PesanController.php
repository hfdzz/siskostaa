<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Kamar;
use App\Models\Pemesanan;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PesanController extends Controller
{
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
            'jenis_kamar' => 'required|string|in:ac,non_ac',
            'jenis_pembayaran' => 'required|string|in:penuh,dp',
        ]);

        // check if tanggal_masuk is not in the past
        if (strtotime($request->input('tanggal_masuk')) < strtotime(date('Y-m-d'))) {
            return redirect()->route('pesan')->withErrors(['Tanggal masuk tidak valid']);
        }

        // check if user already logged in
        if (!auth()->check()) {
            return redirect()->route('login')->withErrors(['Silahkan login terlebih dahulu']);
        }

        // check if user has pemesanan with status other than 'selesai' or 'ditolak' from database
        /** @var \App\Models\User $user **/
        $user = auth()->user();
        if ($user->pemesanan()->whereNotIn('status', [Pemesanan::$kode_status['selesai'], Pemesanan::$kode_status['ditolak']])->exists()) {
            return redirect()->route('pesan')->withErrors(['Anda sudah memiliki pemesanan yang belum selesai']);
        }

        // check availability of kamar
        // check if any kamar with jenis_kamar = $request->input('jenis_kamar), status_available = 1, kode_gedung 'A' or 'B' for 
        // jenis_kelamin = 'L', kode_gedung 'C' for jenis_kelamin = 'P'
        //  exists, get the first one ordered by nomor_kamar
        /** @var \App\Models\Kamar $kamar **/
        $kamar = Kamar::where('jenis_kamar', $request->input('jenis_kamar'))->where('status_available', 1)->where(function ($query) use ($request) {
            if ($request->input('jenis_kelamin') == 'L'){
                $query->where('kode_gedung', 'A')->orWhere('kode_gedung', 'B');
            } else {
                $query->where('kode_gedung', 'C');
            }
        })->orderBy('nomor_kamar')->first();

        if (!$kamar) {
            return redirect()->route('pesan')->withErrors(['Kamar tidak tersedia']);
        }

        // create new pemesanan
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
            'status' => Pemesanan::$kode_status['menunggu_validasi'],
            'nomor_kamar' => $kamar->getKodeKamar(),
            'user_id' => $user->id,
        ]);

        // add pemesanan_id to kamar
        $kamar->addOcupant($pemesanan->id);
        
        return redirect('/statuspesan');
    }

    public function riwayat(Request $request)
    {
        // get user's all pemesanan ordered by tanggal_masuk
        $pemesananList = Pemesanan::where('user_id', $request->user()->id)->orderBy('tanggal_masuk', 'desc')->get();

        return view('user.riwayatpemesanan', [
            'pemesananList' => $pemesananList,
        ]);
    }
}