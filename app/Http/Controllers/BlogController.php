<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class BlogController extends Controller
{
    //

    public function getIndex(){
        $posts = Post::latest()->paginate(2);
        return view('blog.index')->withPosts($posts);
    }

    public function getSingle($slug){

        $post = Post::where('name', '=', $slug)->first();

        return view('blog.single')->with('post', $post);
    }

    public function getArchive(){
        return $this->getIndex();
    }
}
