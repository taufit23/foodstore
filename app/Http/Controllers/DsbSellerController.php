<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DsbSellerController extends Controller
{
    public function dsbseller()
    {
        return view('dashboard.seller');
    }
}
