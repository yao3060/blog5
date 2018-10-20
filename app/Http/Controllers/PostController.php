<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use Illuminate\Support\Facades\Session;
use Cocur\Slugify\Slugify;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('login');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Post::orderBy('created_at', 'desc')->paginate(2);

        return view('posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate the data
        $this->validate($request, [
            'title' => 'required|unique:posts|max:100|min:4',
            'post_content' => 'required'
        ]);

        // store data in database
        $post = new Post;
        $slugify = new Slugify();
        $post->title = $request->title;
        $post->name = $slugify->slugify($post->title);
        $post->post_content = $request->post_content;

        $post->save();

        Session::flash('success', 'The post was saved.');

        // redirect to another page
        return redirect()->route('posts.show', $post->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $post = Post::find($id);

        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $post = Post::find($id);

        return view('posts.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $slugify = new Slugify();
        $request_slug = $slugify->slugify($request->input('name'));

        // Validate the post data
        if ( $request_slug == $post->name ) {

            $this->validate($request, [
                'title' => 'required|unique:posts|max:100|min:4',
                'post_content' => 'required'
            ]);

        } else {

            $this->validate($request, [
                'title' => 'required|unique:posts|max:100|min:4',
                'name'  => 'required|unique:posts,name',
                'post_content' => 'required'
            ]);
        }


        // Save the data to database
        $post->title        = $request->input('title');
        $post->name         = $request_slug;
        $post->post_content = $request->input('post_content');

        $post->save();

        // set flash data with success message
        Session::flash('success', 'This post was updated.');

        // redirect with flash data to posts.show
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post = Post::find($id);
        $post->delete();

        Session::flash('success', 'The post "'. $post->title .'" was deleted.');
        return redirect()->route('posts.index');
    }
}
