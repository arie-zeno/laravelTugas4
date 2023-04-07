<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Post;
use \App\Models\Foto;
use \App\Models\Komen;

class PostController extends Controller
{
    public function index(){
        return view('berita', [
            "title" => "berita",
            "posts" => Post::latest()->get(),
            "fotos" => Foto::all(),
        ]);
    }
    public function home(){
        return view('home', [
            "title" => "home",
            "posts" => Post::latest()->get(),
            "fotos" => Foto::all(),
            "komens" => Komen::all()

        ]);
    }

    public function show(Post $post){
        return view('post', [
            "title" => $post->title,
            "post" => $post        
        ]);
    }
}
