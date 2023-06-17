@extends('layouts.app')


@section('content')

<div class="container">
  <a class="btn btn-dark"  href="{{route('posts.index')}}"> ALL posts</a>
</div>



<div class="container">
  <form action="{{route('posts.store')}}" method="POST">
    @csrf
      <div class="mb-3">
          <label  class="form-label">Title</label>
          <input type="text" class="form-control" name="title">
        </div>
        <div class="mb-3">
          <label for="exampleFormControlTextarea1" class="form-label">Description</label>
          <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
        </div>
        <div class="mb-3">
          <label for="post creator" class="form-label">Post Creator</label>

          <select class="form-control" name="user_id">
            @foreach($users as $user)
            <option value="{{$user->id}}">{{$user->name}}</option>
            @endforeach
          </select>
        </div>
      
        <button class="btn btn-primary" >create</button>
  </form>
</div>
  
    
@endsection