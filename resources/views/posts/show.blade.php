
@extends('layouts.app')

@section('content')
    
        <div class="card imageFond3 border border-light  gap-2" style="width: 18rem;">
        {{-- <img src="..." class="card-img-top" alt="..."> --}}
        <h5 class="card-title  fs-2 text fw-bold text-center">{{$post->title}}</h5>
        <p class="card-text">{{$post->content}}</p>
        <form action="{{ route('commentaire.store', $post->id)}}" method="post">

            @csrf
            <div class="card-body">
            <input type="text" name="content" placeholder="votre commentaire">
            <div class="d-flex justify-content-center mt-3">
                <input type="submit" class="btn btn-warning" value="Comment">
            </div>
        </form>
        @foreach ($comments as $comment)
        <div >
            <p>{{$comment->content}}</p>
            <i >{{$comment->user_id}}</i>
        </div>
        @endforeach
        </div>

 
@endsection
 