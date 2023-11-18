<?php

namespace App\Http\Controllers\ProfileKost;

use App\Http\Controllers\Controller;
use App\Models\ProfileKost\Fasilitas;
use Illuminate\Http\Request;

class FasilitasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): never
    {
        abort(404);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('profile-kost.fasilitas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'deskripsi_fasilitas' => 'required',
            'foto_fasilitas' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        Fasilitas::create([
            'deskripsi_fasilitas' => $request->deskripsi_fasilitas,
            'foto_fasilitas' => $request->foto_fasilitas->store('fasilitas', 'public'),
        ]);
        return redirect()->route('admin-profile-kost')->with('success', 'Fasilitas berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Fasilitas $fasilitas): never
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fasilitas $fasilitas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fasilitas $fasilitas)
    {
        $fasilitas->delete();
        return redirect()->route('admin-profile-kost')->with('success', 'Fasilitas berhasil dihapus');
    }
}
