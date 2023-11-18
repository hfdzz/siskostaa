<?php

namespace App\Http\Controllers\ProfileKost;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProfileKost\Fasilitas;
use App\Models\ProfileKost\Faq;
use App\Models\ProfileKost\Tentang;

class ProfileController extends Controller
{
    /**
     * Beranda
     */
    public function beranda(Request $request)
    {
        // root route
        return view('user.beranda', [
            'profile' => Tentang::first(),
            'fasilitas' => Fasilitas::all(),
            'faq' => Faq::all(),
        ]);
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // admin index
        return view('profile-kost.index', [
            'profile' => Tentang::first(),
            'fasilitas' => Fasilitas::all(),
            'faq' => Faq::all(),
        ]);
    }
}
