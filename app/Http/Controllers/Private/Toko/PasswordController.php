<?php

namespace App\Http\Controllers\Private\Toko;

use App\Http\Controllers\Controller;
use App\Http\Requests\GantiPwRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    public function index()
    {
        return view('private.toko.profile.index');
    }
    public function gantipw(GantiPwRequest $gantiPwRequest)
    {
        $user = User::findOrFail(auth()->user()->id);
        if (Hash::check($gantiPwRequest->password, $user->password)) {
            $user->password = bcrypt($gantiPwRequest->new_password);
            $user->save();
        }else {
            return redirect()->back()->with('gagal', 'password lama salah');
        }
        return redirect()->back()->with('success', 'password Berhasil diubah');
    }
}
