
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
    <a class="btn btn-success"  href="{{route('posts.create')}}"> Add Post</a>
</div>
  
 
  <div class="container">
<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Title</th>
      <th scope="col">posted by</th>
      <th scope="col">created at</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($posts as $post)
    <tr>
        
        <td>{{$post->id}}</td>
        <td>{{$post->title}}</td>
        <td></td>
        <td>{{$post->created_at}}</td>
        <td>
            <a class="btn btn-primary"  href="#"> update</a>
            <a class="btn btn-info"  href="{{route('posts.show',['post'=>$post['id']])}}">show</a>
            <a class="btn btn-danger"  href="{{route('posts.destroy',$post->id)}}">delete</a>
        </td>
      </tr>
    @endforeach
  

  </tbody>
</table>
</div>
    

</body>
</html>