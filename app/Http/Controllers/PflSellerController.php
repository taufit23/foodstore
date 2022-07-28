<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PflSellerController extends Controller
{
    public function index() {
        $data = array('title' => 'User Profil');
        return view('profile.seller', $data);
    }

    public function setting() {
        $data = array('title' => 'Setting Profil');
        return view('profile.settingseller', $data);
    }
}
