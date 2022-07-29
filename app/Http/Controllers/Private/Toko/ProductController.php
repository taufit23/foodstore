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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Produk::where('user_id', auth()->user()->id)->get();
        $kategory = Kategori::where('user_id', auth()->user()->id)->get();
        return view('private.toko.produk.index', compact('products', 'kategory'));
    }
    // public function product_by_slug($slug)
    // {
    //     $kategory = Kategori::where('slug_kategori', $slug)->first('id');
    //     $products = Produk::where('kategori_id', $kategory->id)->get();
    // }

    public function addimageslide(ImagesUploadRequest $imagesUploadRequest)
    {
        if ($imagesUploadRequest->hasfile('url')) {
            $files = [];
            foreach ($imagesUploadRequest->file('url') as $imaga) {
                if ($imaga->isValid()) {
                    // nama file untuk database dan upload foto
                    $input['imagename'] = time() . '.' . $imaga->extension();
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
            return redirect()->back()->with('Success', 'Images uploaded');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
        return redirect()->back()->with('success', 'Product Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Produk::where('slug_produk', $id)->with('image', 'kategori')->first();
        return view('private.toko.produk.detail', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
