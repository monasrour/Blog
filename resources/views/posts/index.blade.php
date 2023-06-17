@extends('layouts.app')

@section('content')
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid" style="background-color:gainsboro">
            <span class="navbar-brand mb-0 h1">Blog</span>
        </div>
    </nav>

    <div class="container">
        <a class="btn btn-success" href="{{ route('posts.create') }}">Add Post</a>
    </div>

    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Title</th>
                    <th scope="col">Posted By</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->user ? $post->user->name : 'User Not Found' }}</td>
                        <td>{{ $post->created_at }}</td>
                        <td>
                            <div class="d-flex">
                              <a class="btn btn-primary mr-2" href="{{ route('posts.edit', ['post' => $post->id]) }}">Update</a>

                                <a class="btn btn-info mr-2" href="{{ route('posts.show', ['post' => $post->id]) }}">Show</a>
                                <form action="{{ route('posts.destroy', $post->id) }}" method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this post?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                                @if ($post->trashed())
                                    <form action="{{ route('posts.restore', ['post' => $post->id]) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-success">Restore</button>
                                    </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
