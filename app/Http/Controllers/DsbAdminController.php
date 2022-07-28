<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DsbAdminController extends Controller
{
    public function dsbadmin()
    {
        return view('dashboard.admin');
    }
}
