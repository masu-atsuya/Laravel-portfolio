@extends('layouts.app')

@section('content')


@include('layouts.header')


<div class="container mt-3">
    @foreach($posts as $post)
    <a href="/show/{{$post->id}}">
        <div class="card mb-3 mx-auto" style="max-width: 600px;">
            <div class="no-gutters d-flex">
                <div class="col-3 justify-content-center align-items-center d-flex ">
                    @if(!empty($post->user->profile->image))
                    <img src="{{ '/storage/' . $post->user->profile['image']}}" class="  img-fluid img-thumbnail rounded-circle" />
                    @else
                    <img src="/storage/gamer.jpg" class="  img-fluid img-thumbnail rounded-circle">
                    
                    @endif
                </div>
                <div class="col-9">

                    <div class="card-body">
                        <h5 class="card-title">{{$post->title}}</h5>
                        <p class="card-text">name:{{$post->user->name}}</p>
                        <p class="card-text">game:{{$post->game->name}}</p>
                        <p class="card-text">game:{{$post->game->name}}</p>
                    </div>
                </div>
            </div>
        </div>
    </a>

    @endforeach
</div>



@endsection