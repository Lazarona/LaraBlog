<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css'])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Lara Blog</title>
</head>
<body  class="bg-dark" > 

    <div class="d-flex justify-content-around  align-items-center gap-60 " >
       
        
            <img src="../img/logolarablog2.png" alt="" style="width:30%">
       
            <div>
            @if (Route::has('login'))
                
                    @auth
                    <div class="card imageFond2 with-5S " >
                        <a href="{{ route('profile.edit') }}" class="text-white text-decoration-none" >Profile</a>
                    </div>
                    @else
                    <a href="{{ route('login') }}" class="text-white text-decoration-none">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="text-white text-decoration-none">Register</a>
                    @endif
                    @endauth
                
            @endif

        </div>
       
    </div>
    @auth
        
        <div class="d-flex justify-content-center">
            <div class="card bg imageFond d-flex mb-3 align-items-center"  style="width: 18rem;">
                <img src="../img/logo3.png" class="card-img-top" style="width:20%" alt="...">
                <div class="card-body " >
                    
                    <form class="d-flex flex-column gap-3" action="{{route('posts.store')}}" method="POST" >
                        @csrf
                        <input name="title" type="text" placeholder="Title">
                        <textarea name="content" id="" cols="17" rows="7" placeholder="Content"></textarea>
                        <button type="submit" class="btn btn-secondary ">Send</button>
                    </div>
                    </form>
                    @if ($errors->any())
                    @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                    @endforeach
                    @endif
                </div>
            </div>        
        </div>

        @endauth

        <div class="d-flex flex-wrap gap-5">
            @foreach ($posts as $post)
                <div class="card imageFond2 " style="width: 18rem;">
                {{-- <img src="..." class="card-img-top" alt="..."> --}}
                    <div class="card-body">
                      <h5 class="card-title fs-2 text fw-bold text-center">{{$post->title}}</h5>
                      <p class="card-text">{{$post->content}}</p>
                      
                      @auth
                      <div class="d-flex justify-content-center">
                      <a href="{{route('posts.show', $post->id)}}" class="btn btn-secondary">Comment</a>
                        </div> 
                      @if ($post->user_id == Auth::id())
                      <div class="d-flex justify-content-center">
                      <a href="{{route('posts.destroy', $post->id)}}" class="btn btn-secondary">Delete</a>
                    </div> 
                      @endif
                      @endauth
                </div>
              </div>
            @endforeach
        </div>
</body>
</html>