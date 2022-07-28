<?php

namespace App\Http\Controllers\Private\Auth;

use App\Http\Controllers\Controller;
use App\Models\Lokasi;
use App\Models\Toko;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class RegisterController extends Controller
{
    public function index()
    {
        return view('private.register');
    }
    public function store(Request $registerRequest)
    {

        $rules = [
            'name'                  => 'min:4|max:35',
            'email'                 => 'email|unique:users,email',
            'no_hp'                 => 'unique:users,no_hp',
            'nama_usaha'            => 'min:4|max:35|unique:toko,nama_usaha',
            'alamat'                => 'min:4|max:35',
            'keterangan'            => 'min:4|max:35',
            'password'              => 'min:8|confirmed',
            'cover'                 => 'mimes:jpg,jpeg,png',
            'latitude'              => 'required',
            'longtitude'            => 'required',
        ];
        $validator = Validator::make($registerRequest->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($registerRequest->all);
        }
        $user = new User();
        $user->name = $registerRequest->name;
        $user->email = $registerRequest->email;
        $user->no_hp = $registerRequest->no_hp;
        $user->password = bcrypt($registerRequest->password);
        $user->save();

        $toko = new Toko();
        $toko->user_id = $user->id;
        $toko->nama_usaha = $registerRequest->nama_usaha;
        $toko->slug_usaha = Str::slug($registerRequest->nama_usaha);
        $toko->alamat = $registerRequest->alamat;
        $toko->keterangan = $registerRequest->keterangan;
        $toko->status = 'nonactive';
        if ($registerRequest->hasFile('cover')) {
            $cover         = $registerRequest->file('cover');
            $input['imagename'] = time() . '.' . $cover->extension();
            $cover->getClientOriginalExtension();
            $filepath       = public_path('images/cover_usaha');
            $img = Image::make($cover->path());
            $img->resize(150, 150, function ($constraint) {
                $constraint->aspectRatio();
            })->save($filepath . '/' . $input['imagename']);
            $toko->cover = 'images/cover_usaha/' . $input['imagename'];
        }
        $toko->save();
        $lokasi = new Lokasi();
        $lokasi->user_id = $user->id; 
        $lokasi->toko_id = $toko->id; 
        $lokasi->latitude = $registerRequest->latitude; 
        $lokasi->longitude = $registerRequest->longtitude; 
        $lokasi->save();
        return redirect()->route('login')->with('success', 'Anda berhasil mendaftar, Silahkan login');
    }
}
