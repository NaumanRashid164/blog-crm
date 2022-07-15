<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class SetupController extends Controller
{
    public function index()
    {
        $tags = Tag::orderBy("id", "desc")->get();
        return view("admin.setup", get_defined_vars());
    }
}
