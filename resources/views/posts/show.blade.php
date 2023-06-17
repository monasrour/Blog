@extends('layouts.app')

@section('content')

       <!-- As a heading -->
       <nav class="navbar bg-body-tertiary" >
        <div class="container-fluid" style="background-color:gainsboro">
          <span class="navbar-brand mb-0 h1">Blog</span>
        </div>
      </nav>
    <div class="container">
        <a class="btn btn-dark"  href="{{route('posts.create')}}"> back</a>
    </div>
      
     
    <div class="container">
    
        <div class="card">
            <h3 class="card-header">Details about post</h3>
            <div class="card-body">
              <h4 class="card-title" name="title">{{ $post->title ?? '' }}</h4>
              <p class="card-text" name="description">{{ $post->description ?? '' }}</p>
              <p class="card-text" >{{ $post->created_at ?? '' }}</p>
            </div>
        </div>
    
    </div>
    
@endsection