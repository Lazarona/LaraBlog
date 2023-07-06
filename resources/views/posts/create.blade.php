@extends('layouts.app')

@slot('content')
        <div>
            <form action="{{route('posts.store')}}" method="POST">
                @csrf
                <input type="title" placeholder="Titre">
                <textarea name="content" id="" cols="30" rows="10" placeholder="Contenu du post"></textarea>
                <button type="submit">Envoyer</button>
            </form>
            @if ($errors->any())
@foreach ($errors->all() as $error)
<div>{{ $error }}</div>
@endforeach
@endif
        </div>
@endslot