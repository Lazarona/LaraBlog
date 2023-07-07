@extends('layouts.app')

@section('content')
    
    <div class="card" style="width: 18rem;">
    {{-- <img src="..." class="card-img-top" alt="..."> --}}
        <div class="card-body">
          <h5 class="card-title">{{$post->title}}</h5>
          <p class="card-text">{{$post->content}}</p>
          <input type="show" placeholder="votre commentaire">
          <input type="submit" class="btn btn-warning" value="Comment">

    </div>


@endsection