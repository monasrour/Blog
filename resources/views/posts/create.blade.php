
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
     <!-- As a heading -->
  <nav class="navbar bg-body-tertiary" >
    <div class="container-fluid" style="background-color:gainsboro">
      <span class="navbar-brand mb-0 h1">Blog</span>
    </div>
  </nav>
<div class="container">
    <a class="btn btn-dark"  href="{{route('posts.index')}}"> ALL posts</a>
</div>
  
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
  
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
    

</body>
</html>