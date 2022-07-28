<?php

namespace App\Http\Controllers;

use App\Models\Komentar;
use Illuminate\Http\Request;
use App\Models\Lokasi;
use App\Models\Produk;
use App\Models\Toko;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class TokoController extends Controller

{
    public function toko($slug_usaha)
    {
        $toko = Toko::where('slug_usaha', $slug_usaha)->with('lokasi', 'produk', 'komentar')->first();
        $user_toko = User::where('id', $toko->user_id)->first();
        return view('toko.hometoko', compact('toko', 'user_toko'));
    }
    public function postkoment($toko,Request $request)
    {
        $rules = [
            'nama_costumer'   => 'required|string',
            'komentar'        => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }
        $komentar = new Komentar();
        $komentar->toko_id = $toko;
        $komentar->nama_costumer = $request->nama_costumer;
        $komentar->komentar = $request->komentar;
        $komentar->save();
        return redirect()->back()->with('success', 'Koment posted');
    }
}
