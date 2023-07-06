@extends('layouts.app')

@section('content')
        <div>
            @foreach ($posts as $post)
                <h3>{{$post->title}}</h3>
                <p>{{$post->content}}</p>
            @endforeach
        </div>
@endsection