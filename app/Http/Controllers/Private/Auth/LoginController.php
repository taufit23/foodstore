<?php

namespace App\Http\Controllers\Private\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function index()
    {
        return view('private.login');
    }
    public function login(Request $request)
    {
        $rules = [
            'email'                 => 'required|email',
            'password'              => 'required|string'
        ];
        $messages = [
            'email.required'        => 'Alamat Email wajib diisi',
            'email.email'           => 'Alamat Email tidak valid',
            'password.required'     => 'Password wajib diisi',
            'password.string'       => 'Password harus berupa string'
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            toastr()->error('terjadi beberapa error');
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }
        $data = [
            'email'     => $request->input('email'),
            'password'  => $request->input('password'),
        ];

        Auth::attempt($data);
        if (Auth::check()) {
            if (Auth::user()->role == 'admin') {
                toastr()->success('Login Admin berhasil');
                return redirect()->route('admin.dashboard');
            }
            elseif (Auth::user()->role == 'toko') {
                if (Auth::user()->status == null) {
                    toastr()->error('Login gagal, Akun belum tervalidasi');
                    return redirect()->route('toko.dashboard');
                }
                elseif (Auth()->user()->status == 1) {
                    toastr()->success('Login Seller berhasil');
                    return redirect()->route('toko.dashboard');
                }else {
                    toastr()->error('Akun anda dibekukan');
                    return redirect()->route('logout');
                }
            }
        } else { // false
            //Login Fail
            toastr()->error('Login gagal');
            return redirect()->route('login');
        }
    }
    public function logout()
    {
        Auth::logout(); // menghapus session yang aktif
        toastr()->success('Logout berhasil');
        return redirect()->route('index');
    }
}
