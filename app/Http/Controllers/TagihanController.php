<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use App\Models\Tagihan;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TagihanController extends Controller
{
    public function get()
    {
        // get user's all pemesanan
        /** @var \App\Models\User $user **/
        $user = auth()->user();
        $list_pemesanan = $user->pemesanan()->get();
        // get all tagihan from pemesanan
        $list_tagihan = [];
        foreach ($list_pemesanan as $pemesanan) {
            $tagihan = $pemesanan->tagihan()->first();
            if ($tagihan) {
                array_push($list_tagihan, $tagihan);
            }
        }
        return view('user.tagihan', compact('list_tagihan'));
    }

    public function getPembayaran()
    {
        // check if user has tagihan with status '1' (menunggu validasi). if yes, return to tagihan page with message
        /** @var \App\Models\User $user **/
        $user = auth()->user();
        $list_pemesanan = $user->pemesanan()->orderBy('created_at', 'desc')->get();
        foreach ($list_pemesanan as $pemesanan) {
            $tagihan = $pemesanan->tagihan()->first();
            if ($tagihan && $tagihan->status == Tagihan::$kode_status['menunggu_validasi']) {
                return redirect()->route('tagihan')->with('already_menunggu_validasi', 'Anda sudah mengirim bukti pembayaran. Silahkan tunggu validasi pembayaran.');
            }
        }
        return view('user.bayar');
    }

    public function bayar(Request $request)
    {
        $request->validate([
            'bukti_pembayaran' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // check if user has pemesanan with status '1' (menunggu pembayaran).
        /** @var \App\Models\User $user **/
        $user = auth()->user();
        $pemesanan = $user->pemesanan()->where('status', '1')->first();
        if (!$pemesanan) {
            return redirect()->route('tagihan');
        }
        /** @var \App\Models\Tagihan $tagihan **/
        $tagihan = $pemesanan->tagihan;
        if ($tagihan && $tagihan->status == Tagihan::$kode_status['menunggu_validasi']) {
            return redirect()->route('tagihan')->with('already_menunggu_validasi', 'Anda sudah mengirim bukti pembayaran. Silahkan tunggu validasi pembayaran.');
        }
        
        // save bukti pembayaran to storage
        $path = $request->file('bukti_pembayaran')->store('bukti_pembayaran', 'public');
        $tagihan->bukti_pembayaran = $path;

        // change status to '1'
        $tagihan->status = Tagihan::$kode_status['menunggu_validasi'];

        $tagihan->save();

        return redirect()->route('tagihan');
    }

    public function getPerpanjangan()
    {
        // get user's active pemesanan (status = '3' && tanggal_masuk + 1 year > now())
        /** @var \App\Models\User $user **/
        $user = auth()->user();
        $pemesanan = $user->pemesanan()->where('status', '3')->where('tanggal_masuk', '>', now()->subYear())->first();

        // dd($pemesanan);
        
        return view('user.perpanjangan', ['pemesanan' => $pemesanan]);
    }

    public function perpanjang(Request $request)
    {
        // craete new pemesanan with same data as current (active) pemesanan
        /** @var \App\Models\User $user **/
        $user = auth()->user();
        $pemesanan = $user->pemesanan()->where('status', '3')->where('tanggal_masuk', '>', now()->subYear())->first();
        $new_pemesanan = Pemesanan::create([
            'nama' => $pemesanan->nama,
            'email' => $pemesanan->email,
            'no_hp' => $pemesanan->no_hp,
            'perguruan_tinggi' => $pemesanan->perguruan_tinggi,
            'nik' => $pemesanan->nik,
            'jenis_kelamin' => $pemesanan->jenis_kelamin,
            'tanggal_masuk' => $pemesanan->tanggal_masuk,
            'jenis_kamar' => $pemesanan->jenis_kamar,
            'jenis_pembayaran' => $pemesanan->jenis_pembayaran,
            'status' => '0',
            'nomor_kamar' => $pemesanan->nomor_kamar,
            'keterangan' => null,
            'total_tagihan' => $pemesanan->total_tagihan,
            'user_id' => $pemesanan->user_id,
        ]);
        $new_pemesanan->save();

        return redirect()->route('perpanjangan');
    }

    public function tidakPerpanjang()
    {
        // set current user's kamar status_available to '1'
        /** @var \App\Models\User $user **/
        $user = auth()->user();

        /** @var \App\Models\Pemesanan $pemesanan **/
        $pemesanan = $user->pemesanan()->where('status', '3')->where('tanggal_masuk', '>', now()->subYear())->first();

        $kamar = $pemesanan->getKamar();

        $kamar->status_available = '1';

        $kamar->save();

        // set current user's pemesanan status to '4'
        $pemesanan->status = '4';

        $pemesanan->save();
        
        return redirect()->route('perpanjangan');
    }

}
