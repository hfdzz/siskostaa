<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kamar;
use App\Models\Pemesanan;
use App\Models\Tagihan;
use App\Models\User;
use Illuminate\Http\Request;

class PenghuniController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $entries = $request->input('entries', 10);
        $filter = $request->input('filter');
        $kamar = Kamar::whereNotNull('pemesanan_id')->paginate($entries);
        
        if ($filter) {
            // filter by tagihan's pemesanan's nama, email, no_hp, jenis_kelamin, tanggal_masuk, jenis_pembayaran
            $kamar = Kamar::whereNotNull('pemesanan_id')->whereHas('pemesanan', function($query) use ($filter) {
                $query->where('nama', 'like', "%$filter%")->orWhere('email', 'like', "%$filter%")->orWhere('no_hp', 'like', "%$filter%")->orWhere('jenis_kelamin', 'like', "%$filter%")->orWhere('tanggal_masuk', 'like', "%$filter%")->orWhere('jenis_pembayaran', 'like', "%$filter%");
            })->paginate($entries);
        }
        $kamar->withPath($request->getUri());

        return view('admin.admin-kelolaPenghuni', ['kamar' => $kamar, 'entries' => $entries]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tambah-penghuni');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'email' => 'required|email',
            'no_hp' => 'required|string|regex:/^[0-9]+$/',
            'nik' => 'required|string|size:16',
            'jenis_kelamin' => 'required|string|in:L,P',
            'tanggal_masuk' => 'required|date',
            'nomor_kamar' => 'required|string|regex:/^[0-9]{1,3}[A-C]$/',
        ]);

        // check if user with email exists
        $user = User::where('email', $request->input('email'))->first();

        // if null then return error
        if (!$user) {
            return redirect()->back()->withErrors(['email' => 'Email tidak ditemukan']);
        }

        // if not null then check if user has pemesanan with status other than 'selesai' or 'ditolak' from database
        if ($user->pemesanan()->whereNotIn('status', [Pemesanan::$kode_status['selesai'], Pemesanan::$kode_status['ditolak']])->exists()) {
            return redirect()->back()->withErrors(['email' => 'User sudah memiliki pemesanan yang belum selesai']);
        }

        // check if kamar exists
        $nomor_kamar = substr($request->input('nomor_kamar'), 0, -1);
        $kode_gedung = substr($request->input('nomor_kamar'), -1);
        $kamar = Kamar::where('nomor_kamar', $nomor_kamar)->where('kode_gedung', $kode_gedung)->first();
        
        // if null then return error
        if (!$kamar) {
            return redirect()->back()->withErrors(['nomor_kamar' => 'Kamar tidak ditemukan']);
        }

        // if not null then check if kamar is already booked
        if ($kamar->status_available == 0) {
            return redirect()->back()->withErrors(['nomor_kamar' => 'Kamar tidak tersedia (sudah diisi)']);
        }

        // create pemesanan that has tagihan
        $pemesanan = Pemesanan::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'perguruan_tinggi' => $user->perguruan_tinggi,
            'nik' => $request->nik,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tanggal_masuk' => $request->tanggal_masuk,
            'jenis_kamar' => $kamar->jenis_kamar,
            'jenis_pembayaran' => 'penuh',
            'status' => Pemesanan::$kode_status['selesai'],
            'nomor_kamar' => $request->nomor_kamar,
        ]);

        // dd($pemesanan);
        return redirect()->back()->with('success','');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kamar $kamar)
    {
        return view('admin.lihat-detail-kelolaPenghuni', ['kamar' => $kamar]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kamar $kamar)
    {
        return view('admin.edit-kelolaPenghuni', ['kamar' => $kamar]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kamar $kamar)
    {
        $request->validate([
            'nama' => 'required|string',
            'email' => 'required|email',
            'no_hp' => 'required|string|regex:/^[0-9]+$/',
            'nik' => 'required|string|size:16',
            'jenis_kelamin' => 'required|string|in:L,P',
            'tanggal_masuk' => 'required|date',
            'nomor_kamar' => 'required|string|regex:/^[0-9]{1,3}[A-C]$/',
        ]);

        // return with error if email is taken
        if (User::where('email', $request->email)->exists()) {
            return redirect()->back()->withErrors(['email' => 'Email sudah digunakan']);
        }

        // check if new_kamar exists
        $nomor_kamar = substr($request->input('nomor_kamar'), 0, -1);
        $kode_gedung = substr($request->input('nomor_kamar'), -1);
        $new_kamar = Kamar::where('nomor_kamar', $nomor_kamar)->where('kode_gedung', $kode_gedung)->first();
        
        // if null then return error
        if (!$new_kamar) {
            return redirect()->back()->withErrors(['nomor_kamar' => 'Kamar tidak ditemukan']);
        }

        // if not null then check if new_kamar is different from current kamar
        if (!($new_kamar->id == $kamar->id)) {
            // if yes then check if new_kamar is already booked
            if ($new_kamar->status_available == 0) {
                return redirect()->back()->withErrors(['nomor_kamar' => 'Kamar tidak tersedia (sudah diisi)']);
            }
            // if no then update new_kamar's and current kamar's 
            // update new kamar's pemesanan_id
            $new_kamar->pemesanan_id = $kamar->pemesanan_id;
            $new_kamar->status_available = 0;

            // remove currrent kamars's pemesanan_id
            $kamar->pemesanan_id = null;
            $kamar->status_available = 1;
        }
        // if same then only update current kamar's pemesanan_id
        
        // update pemesanan
        $pemesanan = $new_kamar->pemesanan;
        $pemesanan->nama = $request->nama;
        $pemesanan->email = $request->email;
        $pemesanan->no_hp = $request->no_hp;
        $pemesanan->nik = $request->nik;
        $pemesanan->jenis_kelamin = $request->jenis_kelamin;
        $pemesanan->tanggal_masuk = $request->tanggal_masuk;
        $pemesanan->nomor_kamar = $request->nomor_kamar;
        
        // dd($new_kamar, $pemesanan, $kamar);

        $new_kamar->save();
        $pemesanan->save();
        $kamar->save();

        return redirect()->route('admin-kelolaPenghuni');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kamar $kamar)
    {
        // update kamar's pemesanan_id to null
        $kamar->pemesanan_id = null;
        $kamar->status_available = 1;
        $kamar->save();
    
        return redirect()->route('admin-kelolaPenghuni');
    }
}
