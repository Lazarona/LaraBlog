@extends('layouts.app')

@section('content')
<div class="d-flex flex-wrap gap-5">
            @foreach ($posts as $post)
                <div class="card" style="width: 18rem;">
                {{-- <img src="..." class="card-img-top" alt="..."> --}}
                    <div class="card-body">
                      <h5 class="card-title">{{$post->title}}</h5>
                      <p class="card-text">{{$post->content}}</p>
                      <a href="{{route('posts.show', $post->id)}}" class="btn btn-primary">Comment</a>

                      <a href="{{route('posts.destroy', $post->id)}}" class="btn btn-danger" method="POST">Cancel</a>


                      
                        </form>

                </div>
              </div>
            @endforeach
        </div>
@endsection