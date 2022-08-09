<?php

namespace App\Http\Controllers\Private\Toko;

use App\Http\Controllers\Controller;
use App\Http\Requests\ImagesUploadRequest;
use App\Http\Requests\ProductRequest;
use App\Models\Image as ModelsImage;
use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
class ProductController extends Controller
{
    public function index()
    {
        $products = Produk::where('user_id', auth()->user()->id)->get();
        $kategory = Kategori::all();
        return view('private.toko.produk.index', compact('products', 'kategory'));
    }

    public function addimageslide(ImagesUploadRequest $imagesUploadRequest)
    {
        if ($imagesUploadRequest->hasfile('url')) {
            $files = [];
            foreach ($imagesUploadRequest->file('url') as $imaga) {
                if ($imaga->isValid()) {
                    // nama file untuk database dan upload foto
                    $input['imagename'] = microtime() . '.' . $imaga->getClientOriginalExtension();
                    // path untuk upload foto
                    $filepath = public_path('images/product_images');
                    // konfigurasi data untuk database
                }
                $imaga->move($filepath, $input['imagename']);
                $files[] = [
                    'produk_id' => $imagesUploadRequest->produk_id,
                    'url' => 'images/product_images/' . $input['imagename']
                ];
            }
            // masukan database
            ModelsImage::insert($files);
            toastr()->success('Image list di upload');
            return redirect()->back();
        }
    }
    public function create()
    {
        //
    }
    public function store(ProductRequest $productRequest)
    {
        $produk = new Produk();
        $produk->kategori_id = $productRequest->kategori_id;
        $produk->toko_id = auth()->user()->toko->id;
        $produk->user_id = auth()->user()->id;
        $produk->nama_produk = $productRequest->nama_produk;
        $produk->slug_produk = Str::slug($productRequest->nama_produk);
        $produk->deskripsi_produk = $productRequest->deskripsi_produk;
        $produk->qty = $productRequest->qty;
        $produk->harga = $productRequest->harga;
        if ($productRequest->hasFile('cover_produk')) {
            $cover         = $productRequest->file('cover_produk');
            $input['imagename'] = time() . '.' . $cover->extension();
            $cover->getClientOriginalExtension();
            $filepath       = public_path('images/cover_produk');
            $img = Image::make($cover->path());
            $img->resize(150, 150, function ($constraint) {
                $constraint->aspectRatio();
            })->save($filepath . '/' . $input['imagename']);
            $produk->cover_produk = 'images/cover_produk/' . $input['imagename'];
        }
        $produk->save();
        toastr()->success('Produk ditambahkan');
        return redirect()->back();
    }
    public function show($id)
    {
        $product = Produk::where('slug_produk', $id)->with('image', 'kategori')->first();
        return view('private.toko.produk.detail', compact('product'));
    }
    public function edit($id)
    {
        $product = Produk::where('slug_produk', $id)->first();
        $kategory = Kategori::all();
        return view('private.toko.produk.edit', compact('product', 'kategory'));
    }

    public function update(Request $request, $id)
    {
        $produk = Produk::findOrFail($id);
        $produk->kategori_id = $request->kategori_id;
        $produk->toko_id = auth()->user()->toko->id;
        $produk->user_id = auth()->user()->id;
        $produk->nama_produk = $request->nama_produk;
        $produk->slug_produk = Str::slug($request->nama_produk);
        $produk->deskripsi_produk = $request->deskripsi_produk;
        $produk->qty = $request->qty;
        $produk->harga = $request->harga;
        if ($request->hasFile('cover_produk')) {
            $cover         = $request->file('cover_produk');
            $input['imagename'] = time() . '.' . $cover->extension();
            $cover->getClientOriginalExtension();
            $filepath       = public_path('images/cover_produk');
            $img = Image::make($cover->path());
            $img->resize(150, 150, function ($constraint) {
                $constraint->aspectRatio();
            })->save($filepath . '/' . $input['imagename']);
            $produk->cover_produk = 'images/cover_produk/' . $input['imagename'];
        }
        $produk->save();
        toastr()->success('Produk di update');
        return redirect()->route('product.index');
    }
    public function destroy($id)
    {
        $product = Produk::where('slug_produk', $id)->first();
        $imagas = ModelsImage::where('produk_id', $product->id)->get();
        foreach ($imagas as  $image) {
            $image->delete();
        }
        $product->delete();
        toastr()->success('Berhasil menghapus');
        return redirect()->route('product.index');
    }
}
