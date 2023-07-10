@extends('layouts.app')

@section('content')
    
    <div class="card imageFond3 border border-light  gap-2" style="width: 18rem;">
    {{-- <img src="..." class="card-img-top" alt="..."> --}}
        <div class="card-body">
            <form action="{{ route('posts.update', $post->id)}}" method="post">
                @csrf
                @method('put')
                <label for="title">Titre : </label>
                <input type="text" name="title" value="{{$post->title}}">
                <label for="content">Contenu : </label>
                <input type="text" name="content" value="{{$post->content}}">
                <div class="d-flex justify-content-center mt-3">
                <input type="submit" class="btn btn-warning" value="Modifier">
                </div>
            </form>          
        </div>
@endsection