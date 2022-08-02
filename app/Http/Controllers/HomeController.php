<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Lokasi;
use App\Models\Produk;
use App\Models\Toko;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $data_lokasi = Toko::where('status', 'active')->with('lokasi')->get();
        $avaragelatitude = Lokasi::avg('latitude');
        $avaragelongitude = Lokasi::avg('longitude');
        return view('homepage.home', compact('data_lokasi', 'avaragelatitude', 'avaragelongitude'));
    }

    public function tampildata()
    {
        $data = Lokasi::all();
        return response()->json($data);
    }
    public function databykategori($blugs)
    {
        $produk = Kategori::with('produk')->where('slug_kategori', $blugs)->first();
        return view('homepage.produkbycategory', compact('produk'));
    }
    public function datakategori ()
    {
        $kategori = Kategori::all();
        return view('homepage.kategori', compact('kategori'));
    }
    public function detailproduk($slug)
    {
        $produk = Produk::where('slug_produk', $slug)->first();
        return view('homepage.detail_produk', compact('produk'));
    }
    public function tentang ()
    {
        return view('homepage.tentang');
    }
}
