<?php

namespace App\Http\Controllers;

use App\Http\Requests\CateogryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $cats = Category::orderBy("id", "desc")->get();
        return view("admin.category.list", get_defined_vars());
    }

    public function list()
    {
        $cats = Category::orderBy("id", "desc")->get();
        return view("ajax.category.list", get_defined_vars());
    }

    public function addfrom()
    {
        return view("ajax.category.add");
    }
    public function addCategory(CateogryRequest $request)
    {

        $id = $request->id;

        if ($id == 0) {
            $cat = new Category();
        } else {
            $cat = Category::find($id);
        }
        $cat->main_category = $request->main_category;
        $cat->type = $request->type;
        $cat->name = $request->name;
        $cat->save();

        if ($request->ajax()) {

            return response()->json([
                'success' => 'Success',
            ]);
        }
    }
    public function edit($id)
    {
        $cat = Category::find($id);
        return view("ajax.category.edit", get_defined_vars());
    }

    public function status(Request $request)
    {
        $cat = Category::findOrFail($request->id);
        $cat->status = $request->status;
        $cat->save();
        return response()->json("Status updated suceesfully");
    }
    public function delete($id)
    {
        Category::destroy($id);
        return response()->json('Category Deleted');
    }
}
