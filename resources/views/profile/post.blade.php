@extends('layouts.app')

@section('content')


<div class="col-md-12 bg-success">
    <h2 class="text-light text-center py-3 m-0">自分の投稿一覧</h2>
</div><!-- /.col -->
<div class="container mt-3">
    @foreach($posts as $post)
    <a href="/show/{{$post->id}}">
        <div class="card mb-3 mx-auto" style="max-width: 600px;">
            <div class="no-gutters d-flex">
                <div class="col-3 justify-content-center align-items-center d-flex ">
                    @if(!empty($post->user->profile->image))
                    <img src="{{ '/storage/' . $post->user->profile['image']}}" class="  img-fluid img-thumbnail rounded-circle" />
                    @else
                    <img src="/storage/game_icon.png" class="  img-fluid img-thumbnail rounded-circle">
                    
                    @endif
                </div>
                <div class="col-9">

                    <div class="card-body">
                        <h5 class="card-title">{{$post->title}}</h5>
                        <p class="card-text">name:{{$post->user->name}}</p>
                        <p class="card-text">game:{{$post->game->name}}</p>
                        <p class="card-text">:{{$post->type->name}}</p>
                    </div>
                </div>
            </div>
        </div>
    </a>

    @endforeach
</div>


@endsection