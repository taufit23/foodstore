<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Lokasi;
use App\Models\Produk;
use App\Models\Toko;
use App\Models\User;

class TokoController extends Controller

{
    public function toko($slug)
    {
        $toko = Toko::where('slug_usaha', $slug)->with('lokasi', 'produk')->first();
        $user_toko = User::where('id', $toko->user_id)->first();
        return view('toko.hometoko', compact('toko', 'user_toko'));
    }
}
