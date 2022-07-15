<?php

namespace App\Http\Controllers;

use App\Http\Requests\TagRequest;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::orderBy("id", "desc")->get();
        return view("admin.tag.list", get_defined_vars());
    }

    public function list()
    {
        $tags = Tag::orderBy("id", "desc")->get();
        return view("ajax.tag.list", get_defined_vars());
    }

    public function addfrom()
    {
        return view("ajax.tag.add");
    }
    public function addTag(TagRequest $request)
    {
        $id = $request->id;
        if ($id == 0) {
            $tag = new Tag();
        } else {
            $tag = Tag::find($id);
        }
        $tag->name = $request->name;
        $tag->save();

        if ($request->ajax()) {

            return response()->json([
                'success' => 'Success',
            ]);
        }
    }
    public function edit($id)
    {
        $tag = Tag::find($id);

        return view("ajax.tag.edit", get_defined_vars());
    }

    public function delete($id)
    {
        Tag::destroy($id);
        return response()->json('Tag Deleted');
    }
}
