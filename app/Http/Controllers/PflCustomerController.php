<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PflCustomerController extends Controller
{
    public function index() {
        $data = array('title' => 'User Profil');
        return view('profile.customer', $data);
    }

    public function setting() {
        $data = array('title' => 'Setting Profil');
        return view('profile.settingcustomer', $data);
    }
}
