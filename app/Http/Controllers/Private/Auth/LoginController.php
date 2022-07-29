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
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }
        $data = [
            'email'     => $request->input('email'),
            'password'  => $request->input('password'),
        ];

        Auth::attempt($data);
        if (Auth::check()) {
            if (Auth::user()->role == 'admin') {
                return redirect()->route('admin.dashboard')->with('success', 'Login berhasil');
            }
            elseif (Auth::user()->role == 'toko') {
                if (Auth::user()->status == null) {
                    return redirect()->route('toko.dashboard')->with('errors', 'Pendaftaran toko belum divalidasi');
                }
                elseif (Auth()->user()->status == 1) {
                    return redirect()->route('toko.dashboard')->with('success', 'login sukses');
                }else {
                    return redirect()->route('logout')->with('errors', 'Akun toko anda dibekukan!');
                }
            }
        } else { // false
            //Login Fail
            return redirect()->route('login')->with('gagal', 'Email atau password salah');
        }
    }
    public function logout()
    {
        Auth::logout(); // menghapus session yang aktif
        return redirect()->route('index');
    }
}
