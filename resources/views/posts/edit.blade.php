@extends('layouts.app')

@section('content')
    
    <div class="card imageFond2" style="width: 18rem;">
    {{-- <img src="..." class="card-img-top" alt="..."> --}}
        <div class="card-body">
            <form action="{{ route('posts.update', $post->id)}}" method="post">
                @csrf
                @method('put')
                <label for="title">Titre : </label>
                <input type="text" name="title" value="{{$post->title}}">
                <label for="content">Contenu : </label>
                <input type="text" name="content" value="{{$post->content}}">
                <input type="submit" class="btn btn-warning" value="Modifier">
            </form>          
        </div>
@endsection