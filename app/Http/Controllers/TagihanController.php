<?php

namespace App\Http\Controllers;

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

}
