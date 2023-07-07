
@extends('layouts.app')

@section('content')
    
    <div class="card" style="width: 18rem;">
    {{-- <img src="..." class="card-img-top" alt="..."> --}}
    <form action="{{ route('comments.create', $comment->id)}}" method="post">
        @csrf
        @method('put')
        <div class="card-body">
          <p class="card-text">{{$comment->content}}</p>
          <input type="show" placeholder="votre commentaire">
          <input type="submit" class="btn btn-warning" value="Comment">
    </form>
    </div>
@endsection
