
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
    {{-- @dd($post->user); --}}
    <tr>
        
        <td>{{$post->id}}</td>
        <td>{{$post->title}}</td>
        {{-- myuserrelationهنا هاخد الفانكشن الي بتحدد علاقة اليوزر بالبوست وااعمل ترينري اوبراتور --}}
        <td>{{$post->user? $post->user->name:'user not found'}}</td>
        <td>{{$post->created_at}}</td>
        <td>
          <div class="d-flex">
              <a class="btn btn-primary mr-2" href="#">Update</a>
              <a class="btn btn-info mr-2" href="{{ route('posts.show', ['post' => $post['id']]) }}">Show</a>
              <form action="{{ route('posts.destroy', $post['id']) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this post?');">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger">Delete</button>
              </form>
          </div>
      </td>
      
      
      </tr>
    @endforeach
  

  </tbody>
</table>
</div>
    

</body>
</html>