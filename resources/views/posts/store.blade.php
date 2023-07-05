@extends('layouts.app')

@slot('content')
        <div>
            <h3>{{$title}}</h3>
            <p>{{$content}}</p>
        </div>
@endslot