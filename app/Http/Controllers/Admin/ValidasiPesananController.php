<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pemesanan;

class ValidasiPesananController extends Controller
{
    public function index(Request $request)
    {
        $entries = $request->input('entries', 10);
        $filter = $request->input('filter');
        $pesanan = Pemesanan::where('status', '0')->paginate($entries);
        if ($filter) {
            // filter by nama, email, no_hp, perguruan_tinggi, nik, jenis_kelamin, tanggal_masuk, jenis_kamar, jenis_pembayaran, status, nomor_kamar, keterangan, total_tagihan
            $pesanan = Pemesanan::where('status', '0')->where('nama', 'like', "%$filter%")->orWhere('email', 'like', "%$filter%")->orWhere('no_hp', 'like', "%$filter%")->orWhere('perguruan_tinggi', 'like', "%$filter%")->orWhere('nik', 'like', "%$filter%")->orWhere('jenis_kelamin', 'like', "%$filter%")->orWhere('tanggal_masuk', 'like', "%$filter%")->orWhere('jenis_kamar', 'like', "%$filter%")->orWhere('jenis_pembayaran', 'like', "%$filter%")->orWhere('status', 'like', "%$filter%")->orWhere('nomor_kamar', 'like', "%$filter%")->orWhere('keterangan', 'like', "%$filter%")->orWhere('total_tagihan', 'like', "%$filter%")->paginate($entries);
        }
        $pesanan->withPath($request->getUri());
        return view('admin.admin-pesanan', ['pesanan' => $pesanan, 'entries' => $entries]);
    }

    public function getValidasiPesanan(Request $request)
    {
        return view('admin.validasi-pesanan');
    }

    public function getTidakValidasiPesanan(Request $request)
    {
        return view('admin.tidak-validasi-pesanan');
    }
}
