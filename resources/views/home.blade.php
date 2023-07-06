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
       
            <div class="">
            @if (Route::has('login'))
                
                    @auth
                    <a href="{{ url('/dashboard') }}" >Dashboard</a>
                    @else
                    <a href="{{ route('login') }}" class="text-white text-decoration-none">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="text-white text-decoration-none">Register</a>
                    @endif
                    @endauth
                
            @endif

        </div>
       
    </div>
    
        <div class="d-flex justify-content-center">
            <div class="card bg imageFond d-flex mb-3 align-items-center"  style="width: 18rem;">
                <img src="../img/logo3.png" class="card-img-top" style="width:20%" alt="...">
                <div class="card-body " >
                    <form class="d-flex flex-column gap-3" action="{{route('posts.store')}}" method="POST" >
                        @csrf
                        <input type="title" placeholder="Titre">
                        <textarea name="content" id="" cols="17" rows="7" placeholder="commenter.."></textarea>
                        <button type="submit" class="btn btn-secondary " style="">Envoyer</button>
                    </form>
                </div>
            </div>
        </div>

</body>
</html>