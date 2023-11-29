<?php

namespace App\Http\Controllers\ProfileKost;

use App\Http\Controllers\Controller;
use App\Models\ProfileKost\Faq; // Sesuaikan dengan model Faq yang Anda gunakan
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil data FAQ dari model Faq dan kirim ke view
        $faq = Faq::all();
        return view('profile-kost-faq', compact('faq'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Tampilkan form untuk membuat FAQ baru
        return view('profile-kost-faq.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data yang diterima dari form
        $request->validate([
            'pertanyaan' => 'required',
            'jawaban' => 'required',
        ]);

        // Simpan data FAQ baru ke dalam database menggunakan model Faq
        Faq::create($request->all());

        // Redirect ke halaman FAQ index dengan pesan sukses
        return redirect()->route('profile-kost-faq')->with('success', 'FAQ berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Tampilkan halaman detail FAQ
        $faqItem = Faq::findOrFail($id);
        return view('profile-kost-faq.show', compact('faqItem'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Tampilkan form untuk mengedit FAQ
        $faqItem = Faq::findOrFail($id);
        return view('profile-kost\faq\edit', compact('faqItem'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi data yang diterima dari form
        $request->validate([
            'pertanyaan' => 'required',
            'jawaban' => 'required',
        ]);

        // Ambil data FAQ yang akan diupdate
        $faqItem = Faq::findOrFail($id);

        // Update data FAQ
        $faqItem->update($request->all());

        // Redirect ke halaman FAQ index dengan pesan sukses
        return redirect()->route('profile-kost')->with('success', 'FAQ berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Hapus data FAQ
        Faq::destroy($id);

        // Redirect ke halaman FAQ index dengan pesan sukses
        return redirect()->route('profile-kost-faq')->with('success', 'FAQ berhasil dihapus');
    }
}
