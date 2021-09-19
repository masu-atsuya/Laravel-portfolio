@extends('layouts.app')

@section('content')

@include('layouts.header')
<match-tab></match-tab>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">


            <div class="card-body">
                これは承認待ちの部分
                @if(!empty($reactions))
                @foreach($reactions as $reaction)
                <a href="/match/show/{{$reaction->post->id}}">
                    <div class="card mb-3 mx-auto" style="max-width: 1000px;">
                        <div class="row no-gutters">


                            <div class="w-50">
                                <div class="pl-3">
                                    <p class="card-title">{{$reaction->post->title}}</p>
                                    <p class="card-title">name:{{$reaction->post->user->name}}</p>
                                    <p class="card-title">game:{{$reaction->post->game->name}}</p>
                                    <p class="card-title">:{{$reaction->post->type->name}}</p>
                                    <p class="card-title">:{{$reaction->post->condition->name}}</p>

                                </div>


                            </div>
                        </div>
                    </div>
                </a>
                @endforeach
                @else
                <div class="d-flex flex-column align-items-center">
                    <h3 class=" text-center py-2">応募してみよう！</h3>
                    <div class="col-md-6 text-center">
                        <a href="/register"><button type="submit" class="btn-lg btn col-8 py-3 btn-primary">
                                投稿一覧
                            </button></a>
                    </div>

                </div>
                @endif
            </div>


            <div class="card-body">

            </div>

        </div>
    </div>
</div>



@endsection