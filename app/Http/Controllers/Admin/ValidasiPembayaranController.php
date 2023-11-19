<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tagihan;

class ValidasiPembayaranController extends Controller
{
    public function index(Request $request)
    {
        $entries = $request->input('entries', 10);
        $filter = $request->input('filter');
        $tagihan = Tagihan::where('status', '1')->paginate($entries);
        
        if ($filter) {
            // filter by tagihan's pemesanan's nama, email, no_hp, jenis_kelamin, tanggal_masuk, jenis_pembayaran
            $tagihan = Tagihan::where('status', '1')->whereHas('pemesanan', function($query) use ($filter) {
                $query->where('nama', 'like', "%$filter%")->orWhere('email', 'like', "%$filter%")->orWhere('no_hp', 'like', "%$filter%")->orWhere('jenis_kelamin', 'like', "%$filter%")->orWhere('tanggal_masuk', 'like', "%$filter%")->orWhere('jenis_pembayaran', 'like', "%$filter%");
            })->paginate($entries);
        }
        $tagihan->withPath($request->getUri());

        return view('admin.admin-pembayaran', ['tagihan' => $tagihan, 'entries' => $entries]);
    }

    public function getValidasiTagihan(Request $request)
    {
        $tagihan_id = $request->route('tagihan_id');
        $tagihan = Tagihan::findOrFail($tagihan_id);
        return view('admin.validasi-pembayaran', ['tagihan' => $tagihan]);
    }

    public function getTidakValidasiTagihan(Request $request)
    {
        $tagihan_id = $request->route('tagihan_id');
        $tagihan = Tagihan::findOrFail($tagihan_id);
        return view('admin.tidak-validasi-pembayaran', ['tagihan' => $tagihan]);
    }

    public function postValidasiTagihan(Request $request)
    {
        // get tagihan
        $tagihan_id = $request->route('tagihan_id');
        $tagihan = Tagihan::findOrFail($tagihan_id);

        // validate incoming request
        $request->validate([
            'keterangan' => 'string|max:255|nullable',
        ]);

        // dd($request->all());

        // update tagihan status to '3' (selesai) and keterangan
        $tagihan->keterangan = $request->input('keterangan');
        $tagihan->status = '3';
        $tagihan->save();

        // update pemesanan status to '3' (selesai)
        $pemesanan = $tagihan->pemesanan;
        $pemesanan->status = '3';
        $pemesanan->save();

        // dd($tagihan, $pemesanan);

        return redirect()->route('admin-pembayaran');
    }

    public function postTidakValidasiTagihan(Request $request)
    {
        // get tagihan
        $tagihan_id = $request->route('tagihan_id');
        $tagihan = Tagihan::findOrFail($tagihan_id);

        // validate incoming request
        $request->validate([
            'keterangan' => 'string|max:255|nullable',
        ]);

        // dd($request->all());

        // update tagihan status to '2' (ditolak) and keterangan
        $tagihan->keterangan = $request->input('keterangan');
        $tagihan->status = '2';
        $tagihan->save();

        // update pemesanan status to '2' (ditolak)
        $pemesanan = $tagihan->pemesanan;
        $pemesanan->status = '2';
        $pemesanan->save();

        // remove occuppant from kamar
        /** @var \App\Models\Kamar $kamar **/
        $kamar = $pemesanan->getKamar();
        $kamar->removeOcupant();

        // dd($tagihan, $pemesanan);

        return redirect()->route('admin-pembayaran');
    }
}
