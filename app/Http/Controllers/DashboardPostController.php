<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("dashboard.posts.index", [
            "posts" => Post::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("dashboard.posts.create",[
            "categories" => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->file("image")->store("post-images");

        $validatedData = $request->validate([
            "title" => "required|max:255",
            "slug" => "required|unique:posts,slug",
            "image" => "image", 
            "category_id" => "required",
            "body" => "required"
        ]);

        if($request->file("image")){
            $validatedData["image"] = $request->file("image")->store("post-images");
        }

        $validatedData["excerpt"] = Str::limit(strip_tags($request->body), 50);

        Post::create($validatedData);
        return redirect("/dashboard/posts")->with("success", "Berita baru telah di tambahkan");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view("dashboard.posts.show", [
            "post" => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view("dashboard.posts.edit",[
            "post" => $post,
            "categories" => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $validatedData = $request->validate([
            "title" => "required|max:255",
            "slug" => "required",
            "category_id" => "required",
            "image" => "image", 
            "body" => "required"
        ]);
        
        if($request->file("image")){
            $validatedData["image"] = $request->file("image")->store("post-images");
        }
        $validatedData["excerpt"] = Str::limit(strip_tags($request->body), 50);

        Post::where("id", $post->id)->update($validatedData);
        return redirect("/dashboard/posts")->with("success", "Berita telah di update");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if($post->image){
            Storage::delete($post->image);
        }
        Post::destroy($post->id);
        return redirect("/dashboard/posts")->with("success", "Berita telah di hapus");
    }

    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(["slug" => $slug]);
    }
}
