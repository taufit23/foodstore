<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
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
    public function search (SearchRequest $request)
    {
        $query = $request->q;
        $produk = Produk::where('nama_produk', 'LIKE', '%' . $query . '%')->get();
        if ($produk->count() > 0 ) {
            toastr()->success('Pencarian ditemukan' + $produk->count());
            return view('homepage.search', compact('produk','query'));
        }else {
            toastr()->error('kata kunci pencarian tidak cocok dengan produk manampun');
            return redirect()->route('index');
        }
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
        $produk = Produk::where('slug_produk', $slug)->with('kategori')->first();
        $relate_produk = Produk::where('kategori_id', $produk->kategori->id)->get();
        return view('homepage.detail_produk', compact('produk', 'relate_produk'));
    }
    public function tentang ()
    {
        return view('homepage.tentang');
    }
}
