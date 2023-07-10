
@extends('layouts.app')

@section('content')
    
    <div class="card" style="width: 18rem;">
    {{-- <img src="..." class="card-img-top" alt="..."> --}}
    <h5 class="card-title">{{$post->title}}</h5>
    <p class="card-text">{{$post->content}}</p>
    <form action="{{ route('commentaire.store', $post->id)}}" method="post">

        @csrf
        <div class="card-body">
          <input type="text" name="content" placeholder="votre commentaire">
          <input type="submit" class="btn btn-warning" value="Comment">
    </form>
    @foreach ($comments as $comment)
    <div>
        <p>{{$comment->content}}</p>
        @foreach ($user as $u)
        <i>{{$u->username}}</i>
        @endforeach
    </div>
    @endforeach
    </div>
@endsection
