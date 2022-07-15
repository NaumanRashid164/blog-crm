<?php

namespace App\Http\Controllers;

use App\Http\Requests\GalleryRequest;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::orderBy("id", "desc")->get();
        return view("admin.gallery.list", get_defined_vars());
    }

    public function list()
    {
        $galleries = Gallery::orderBy("id", "desc")->get();
        return view("ajax.gallery.list", get_defined_vars());
    }
    public function addfrom()
    {
        return view("ajax.gallery.add");
    }
    public function addFile(GalleryRequest $request)
    {
        $id = $request->id;
        if ($id == 0) {
            $gallery = new Gallery();
        } else {
            $gallery = Gallery::find($id);
        }
        if ($request->file("file")) {
            $file = $request->file('file');
            $file_extention = ["jpg", "png", "jpeg", "gif"];
            if (in_array($file->getClientOriginalExtension(), $file_extention)) {
                $filename = date('YmdHi') . $file->getClientOriginalName();
                $path = $file->move(public_path('images/gallery'), $filename);
                $gallery->img = $filename;
                $gallery->size = $path->getSize();
                $gallery->type = $file->getClientOriginalExtension();
                $gallery->save();
                return response()->json(["success" => $filename]);
            } else {
                return response()->json(["error" => "Extenstion not supported"]);
            }
        }
    }
}
