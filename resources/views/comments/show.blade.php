
@extends('layouts.app')

@section('content')
    
    <div class="card" style="width: 18rem;">
    {{-- <img src="..." class="card-img-top" alt="..."> --}}
    <form action="{{ route('comments.store', $comment->id)}}" method="post">
        @csrf
        @method('put')
        <div class="card-body">
          <p class="card-text">{{$comment->content}}</p>
          <input type="text" placeholder="votre commentaire">
          <input type="submit" class="btn btn-warning" value="Comment">
    </form>
    </div>
@endsection
