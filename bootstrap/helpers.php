<?php

use App\Models\Category;
use App\Models\User;

function category()
{
    $category = Category::orderBy("id", "desc")->get();
    return $category;
}



function main_category()
{
    return Category::orderBy("id", "desc")->where("type", "main-category")->get();
}

function get_category($id)
{
    if ($id != 0) {
        $cate = Category::find($id);
        return $cate->name;
    }
}
function users()
{
    $users = User::orderBy("id", "desc")->get();
    return $users;
}
