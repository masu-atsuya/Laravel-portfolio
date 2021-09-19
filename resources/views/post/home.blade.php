@extends('layouts.app')

@section('content')


@include('layouts.header')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="">

                <div class="card-body">
                    @foreach($posts as $post)
                    <a href="/show/{{$post->id}}">
                        <div class="card mb-3 mx-auto" style="max-width: 1000px;">
                            <div class="row no-gutters">

                                @if(!empty($post['image']))
                                <img src="{{ '/storage/' . $post['image']}}" class="w-50 img-fluid" />
                                @else
                                <img src="storage/gamer.jpg" class="w-50">
                                @endif
                                
                                <div class="w-50">
                                    <div class="pl-3">
                                        <p class="card-title">{{$post->title}}</p>
                                        <p class="card-title">name:{{$post->user->name}}</p>
                                        <p class="card-title">game:{{$post->game->name}}</p>
                                        <p class="card-title">:{{$post->type->name}}</p>
                                        <p class="card-title">:{{$post->condition->name}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>


@endsection