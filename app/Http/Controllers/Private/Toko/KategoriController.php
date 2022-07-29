<?php

namespace App\Http\Controllers\Private\Toko;

use App\Http\Controllers\Controller;
use App\Http\Requests\KategoryRequest;
use App\Models\Kategori;
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
        return redirect()->back()->with('success', 'Kategori ditambahkan');
    }

}
