<?php

namespace App\Http\Controllers;

use App\Models\Tagihan;

use Illuminate\Http\Request;

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


}
