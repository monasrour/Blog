<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Requests\StorePostRequest;

class PostController extends Controller
{
    use SoftDeletes;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create', [
            'users' => User::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $input = $request->all();
        Post::create($input);
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($post)
    {
        $post = Post::find($post);
        return view('posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($post)
    {
        $post = Post::findOrFail($post);
        return view('posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $post)
    {
    $post = Post::findOrFail($post);
    $input = $request->all();
    $post->update($input);
    return redirect()->route('posts.index');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    $post = Post::findOrFail($id);
    
    if ($post->trashed()) {
        $post->forceDelete(); // قم بحذف السجل بشكل نهائي
    } else {
        $post->delete(); // قم بحذف السجل بشكل نعتيق (soft delete)
    }
    
    return redirect()->route('posts.index');
}
public function restore($id)
{
    $post = Post::withTrashed()->findOrFail($id);
    $post->restore();

    return redirect()->route('posts.index');
}



}
