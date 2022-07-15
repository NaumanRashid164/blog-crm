<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy("id", "desc")->get();
        return view("admin.post.list", get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addfrom()
    {
        return view("admin.post.form");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addPost(PostRequest $request)
    {
        $id = $request->id;
        if ($id == 0) {
            $post = new Post();
        } else {
            $post = Post::find($id);
        }

        // Featured Image
        if ($request->file("featured_img")) {
            $file = $request->file('featured_img');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $path = $file->move(public_path('images/Feature'), $filename);
            $post->featured_img = $filename;
        } else {
            if ($post->featured_img != "") {
                unset($post->featured_img);
            }
        }

        $post->title = $request->title;
        $post->seo_title = $request->seo_title;
        $post->slug = $request->slug;
        $post->author_id = $request->author_id;
        $post->category_id = $request->category_id;
        $post->comments_status = $request->comments_status;
        $post->featured_img_alt = $request->featured_img_alt;
        $post->published_at = $request->published_at;
        $post->meta_desc = $request->meta_desc;
        $post->meta_tags = $request->meta_tags;
        $post->additional_tags = $request->additional_tags;
        $post->detail = $request->detail;
        $post->save();

        if ($request->ajax()) {

            return response()->json([
                'success' => 'Success',
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function list(Post $post)
    {
        $posts = Post::orderBy("id", "desc")->get();
        return view("ajax.post.list", get_defined_vars());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $post = Post::find($id);
        return view("ajax.post.edit", get_defined_vars());
    }

    // Update feature post status

    public function feature(Request $request)
    {
        $id = $request->id;
        $post = Post::find($id);
        $post->featured = $request->status;
        $post->save();
        return response()->json("Status Updated");
    }

    public function status(Request $request)
    {
        $id = $request->id;
        $post = Post::find($id);
        $post->status = $request->status;
        $post->save();
        return response()->json("Status Updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        Post::destroy($id);
        return response()->json('Post Deleted');
    }


    public function blogImage(Request $request)
    {
        if ($request->file("file")) {
            $file = $request->file('file');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $path = $file->move(public_path('images/Blog'), $filename);
            return URL::asset('images/Blog/' . $filename);
        }
    }
}
