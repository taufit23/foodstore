<?php

namespace App\Http\Controllers;
use App\Models\Lokasi;
use App\Models\Toko;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $data_lokasi = Toko::with('lokasi')->get();
            $avaragelatitude = Lokasi::avg('latitude');
            $avaragelongitude = Lokasi::avg('longitude');

        
        // dd($avaragelatitude, $avaragelongitude);
        return view('homepage.home', compact('data_lokasi', 'avaragelatitude', 'avaragelongitude'));
    }

    public function tampildata()
    {
        $data = Lokasi::all();
        return response()->json($data);
    }
}