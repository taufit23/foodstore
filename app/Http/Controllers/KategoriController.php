<?php

namespace App\Http\Controllers;
use App\Models\kategori;
use Illuminate\Http\Request;


class KategoriController extends Controller
{
    public function kategori()
    {
        return view('kategori.pagekategori');
    }
}
