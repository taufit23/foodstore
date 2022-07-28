<?php

namespace App\Http\Controllers;
use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{

    public function index(Request $request) {
        $itemuser = $request->user();
        $itemgambar = Image::where('user_id', $itemuser->id)->paginate(20);
        $data = array('title' => 'Data Image',
                    'itemgambar' => $itemgambar);
        return view('image.index', $data)->with('no', ($request->input('page', 1) - 1) * 20);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $itemuser = $request->user();
        $fileupload = $request->file('image');
        $folder = 'assets/images';
        $itemgambar = $this->upload($fileupload, $itemuser, $folder);
        // $inputan = $request->all();
        // $inputan['user_id'] = $itemuser->id;
        // Image::create($inputan);
        return back()->with('success', 'Image berhasil diupload');
    }

    public function destroy(Image $images) {
        $images->delete();
        return redirect()->route('Image')->with('success', 'Data berhasil dihapus');
    }

    public function upload($fileupload, $itemuser, $folder) {
        $path = $fileupload->store('files');
        $inputangambar['url'] = $path;
        $inputangambar['user_id'] = $itemuser->id;
        return Image::create($inputangambar);
    }
}
