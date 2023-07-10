@extends('layouts.app')

@section('content')
    
    <div class="card" style="width: 18rem;">
    {{-- <img src="..." class="card-img-top" alt="..."> --}}
        <div class="card-body">
            <form action="{{ route('comments.create', $comment->id)}}" method="post">
                @csrf
                @method('put')
                <label for="content">Contenu : </label>
                <input type="text" name="content" value="{{$comment->content}}">
                <input type="submit" class="btn btn-warning" value="Modifier">
            </form>          
        </div>
@endsection