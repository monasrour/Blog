@extends('layouts.app')

@section('content')
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid" style="background-color: gainsboro">
            <span class="navbar-brand mb-0 h1">Blog</span>
        </div>
    </nav>

    <div class="container">
        <h2>Edit Post</h2>
        <form action="{{ route('posts.update', ['post' => $post->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="4">{{ $post->description }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
