<?php

namespace App\Http\Controllers\ProfileKost;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProfileKost\Tentang;
use Illuminate\Support\Facades\Storage;

class TentangController extends Controller
{
    /**
     * Show the form for creating the resource.
     */
    public function create(): never
    {
        abort(404);
    }

    /**
     * Store the newly created resource in storage.
     */
    public function store(Request $request): never
    {
        abort(404);
    }

    /**
     * Display the resource.
     */
    public function show(): never
    {
        abort(404);
    }

    /**
     * Show the form for editing the resource.
     */
    public function edit()
    {
        // admin edit
        return view('profile-kost.tentang.edit', [
            'tentang' => Tentang::first(),
        ]);
    }

    /**
     * Update the resource in storage.
     */
    public function update(Request $request)
    {
        // admin update
        $request->validate([
            'deskripsi' => 'required|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:5120',
        ]);

        $tentang = Tentang::first();

        $tentang->update([
            'deskripsi_tentang' => $request->deskripsi,
        ]);

        if ($request->hasFile('foto')) {
            if($tentang->foto_tentang != null){
                try {
                    Storage::disk('public')->delete($tentang->foto_tentang);
                } catch (\Throwable $th) {
                    throw $th;
                }
            }

            $tentang->update([
                'foto_tentang' => $request->file('foto')->store('profile-kost', 'public'),
            ]);
        }

        return redirect()->route('admin-profile-kost')->with('success', 'Deskripsi berhasil diubah');
    }

    /**
     * Remove the resource from storage.
     */
    public function destroy(): never
    {
        abort(404);
    }
}
