<?php

namespace App\Http\Controllers\Private\Toko;

use App\Http\Controllers\Controller;
use App\Http\Requests\GantiPwRequest;
use App\Models\Lokasi;
use App\Models\Toko;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
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
            toastr()->error('password lama salah');
            return redirect()->back();
        }
        toastr()->success('password Berhasil diubah');
        return redirect()->back();
    }
    public function editprofile ($id)
    {
        $toko = Toko::where('slug_usaha', $id)->first();
        $lokasi = Lokasi::where('toko_id', $toko->id)->first();
        return view('private.toko.profile.edit', compact('toko', 'lokasi'));
    }
    public function update($id, Request $request)
    {
        $user = User::findOrFail(auth()->user()->id);
        $lokasi = Lokasi::where('toko_id', auth()->user()->toko->id)->first();
        $toko = Toko::findOrFail(auth()->user()->toko->id);
        $user->name = $request->name;
        $user->no_hp = $request->no_hp;
        $toko->nama_usaha = $request->nama_usaha;
        $toko->slug_usaha = Str::slug($request->nama_usaha);
        $toko->alamat = $request->alamat;
        $toko->Keterangan = $request->keterangan;
        $lokasi->latitude = $request->latitude;
        $lokasi->longitude = $request->longtitude;
        if ($request->hasFile('cover')) {
            $cover         = $request->file('cover');
            $input['imagename'] = time() . '.' . $cover->extension();
            $cover->getClientOriginalExtension();
            $filepath       = public_path('images/cover_usaha');
            $img = Image::make($cover->path());
            $img->resize(150, 150, function ($constraint) {
                $constraint->aspectRatio();
            })->save($filepath . '/' . $input['imagename']);
            $toko->cover = 'images/cover_usaha/' . $input['imagename'];
        }

        // saving
        $user->save();
        $toko->save();
        $lokasi->save();
        toastr()->success('profile Berhasil diubah');
        return redirect()->route('profile.index');
    }
}
