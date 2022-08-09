<?php

namespace App\Http\Controllers\Private\Toko;

use App\Http\Controllers\Controller;
use App\Http\Requests\KategoryRequest;
use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use Intervention\Image\Facades\Image;

class KategoriController extends Controller
{
    public function index()
    {
        $kategory = Kategori::where('user_id', auth()->user()->id)->get();
        return view('private.toko.kategori.index', compact( 'kategory'));
    }
    public function store(KategoryRequest $kategoryRequest)
    {
        $kategori = new Kategori();
        $kategori->user_id = auth()->user()->id;
        $kategori->toko_id = auth()->user()->toko->id;
        $kategori->nama_kategori = $kategoryRequest->nama_kategori;
        $kategori->slug_kategori = Str::slug($kategoryRequest->nama_kategori, '_');
        if ($kategoryRequest->hasFile('cover_kategori')) {
            $cover         = $kategoryRequest->file('cover_kategori');
            $input['imagename'] = time() . '.' . $cover->extension();
            $cover->getClientOriginalExtension();
            $filepath       = public_path('images/cover_kategori');
            $img = Image::make($cover->path());
            $img->resize(150, 150, function ($constraint) {
                $constraint->aspectRatio();
            })->save($filepath . '/' . $input['imagename']);
            $kategori->cover_categori = 'images/cover_kategori/' . $input['imagename'];
        }
        $kategori->save();
        toastr()->success('Kategori ditambahkan');
        return redirect()->back();
    }
    public function edit($slug)
    {
        $kategori = Kategori::where('slug_kategori', $slug)->first();
        return view('private.toko.kategori.edit', compact('kategori'));
    }
    public function update($id, Request $request)
    {
        $kategori = Kategori::findOrFAil($id);
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->slug_kategori = Str::slug($request->nama_kategori, '_');
        if ($request->hasFile('cover_kategori')) {
            $cover         = $request->file('cover_kategori');
            $input['imagename'] = time() . '.' . $cover->extension();
            $cover->getClientOriginalExtension();
            $filepath       = public_path('images/cover_kategori');
            $img = Image::make($cover->path());
            $img->resize(150, 150, function ($constraint) {
                $constraint->aspectRatio();
            })->save($filepath . '/' . $input['imagename']);
            $kategori->cover_categori = 'images/cover_kategori/' . $input['imagename'];
        }
        $kategori->save();
        toastr()->success('Kategori berhasil di update');
        return redirect()->route('kategori.index');
    }
    public function delete($id)
    {

        $kategori = Kategori::findOrFail($id);
        $produk = Produk::where('kategori_id', $kategori->id)->get();
        foreach ($produk as  $prodd) {
            $prodd->delete();
        }
        $kategori->delete();
        toastr()->success('kategori dihapus');
        return redirect()->back();
    }

}
