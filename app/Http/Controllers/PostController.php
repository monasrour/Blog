<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Termwind\Components\Dd;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts=Post::all();
        // dd($posts);
        return view('posts.index',['posts'=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('posts.create',[
            'users' =>User::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //get the request data 
        //store it in database
        // retrn it to index
        // $input=$request->all();
        // -------way to store_------
        // Post::create([
        //     'title' =>$request->title,
        //     'description' =>$request->description
        // ]);
            //_--------another way to store-----
        // Post::create($request->all());
        $input=$request->all();
        Post::create($input);
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($post)
    {
        // dd($post);
        $post=Post::find($post);
      
        return view('posts.show',['post'=>$post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
            // Delete the post
        $post->delete();

        // Redirect to the index page or any other appropriate page
        return redirect()->route('posts.index');
    }
}
