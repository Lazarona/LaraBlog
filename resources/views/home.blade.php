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
<body class="bg-dark d-flex justify-content-center flex-wrap gap-8" > 

    <div class="d-flex justify-content-around  align-items-center gap-60 " >
       
        
            <img src="../img/logolarablog2.png" alt="" style="width:30%">
       
            <div>
            @if (Route::has('login'))
                
                    @auth
                    <button  type="button" class="profil btn imageFond2 " > 
                        <a href="{{ route('profile.edit') }}" class="text-dark text-decoration-none"  >Profile</a>
                    </button>
                    @else
                    <button  type="button" class="profil btn imageFond2 " >
                        <a href="{{ route('login') }}" class="text-primary text-decoration-none">Log in</a>
                    </button>

                    @if (Route::has('register'))
                    <button  type="button" class="profil btn imageFond2 " >
                        <a href="{{ route('register') }}" class="text-primary text-decoration-none">Register</a>
                    </button>
                    @endif
                    @endauth
                
            @endif

        </div>
       
    </div>
    @auth
        
        <div class="d-flex">
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

        @endauth

        
        <div class=" contenair d-flex flex-wrap gap-2">
            
            @foreach ($posts as $post)
            
                <div class="card imageFond2 d-flex gap-5" style="width: 18rem;">
                {{-- <img src="..." class="card-img-top" alt="..."> --}}
                    <div class="card-body">
                      <h5 class="card-title fs-2 text fw-bold text-center">{{$post->title}}</h5>
                      <p class="card-text">{{$post->content}}</p>
                      
                      @auth
                      <div class="d-flex justify-content-center gap-3">
                      <a href="{{route('posts.show', $post->id)}}" class="btn btn-secondary">Comment</a>
                         
                      @if ($post->user_id == Auth::id())
                      <form action="{{ route('posts.edit', $post->id) }}" method="get">
                        @csrf
                        <input type="submit" class="btn btn-warning" value="Edit"/>
                    </form>
                      <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <input type="submit" class="btn btn-danger" value="Delete"/>
                    </form>
                      @endif
                      @endauth
                    </div>
                </div>
              </div>
            @endforeach
        </div>
</body>
</html>