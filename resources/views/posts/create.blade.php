@extends('layouts.app')

@section('content')
        <div>
            <form action="{{route('posts.store')}}" method="POST">
                @csrf
                <input name="title" type="text" placeholder="Titre">
                <textarea name="content" id="" cols="30" rows="10" placeholder="Contenu du post"></textarea>
                <button type="submit">Envoyer</button>
            </form>
            @if ($errors->any())
@foreach ($errors->all() as $error)
<div>{{ $error }}</div>
@endforeach
@endif
        </div>
@endsection