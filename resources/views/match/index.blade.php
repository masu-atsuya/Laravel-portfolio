@extends('layouts.app')

@section('content')

<div class="col-md-12 bg-success">
    <h2 class="text-light text-center py-3 m-0">応募状況</h2>
</div><!-- /.col -->
@if (session('err_msg'))
<h4 class="err_msg my-3 text-center mx-3">
    {{ session('err_msg') }}
</h4>
@endif
<div class="container">
    @if(!Empty($toUsers))
     <h3 class=" text-center py-2">応募した投稿</h3>
    @foreach($toUsers as $toUser)
    <a href="/match/post-show/{{$toUser->post->id}}">
        <div class="card  mx-auto" style="max-width: 600px;">
            <div class=" d-flex no-gutters">
                <div class="col-3 justify-content-center align-items-center d-flex ">
                    @if(!empty($toUser->to_user->profile->image))
                    <img src="{{ '/storage/' . $toUser->to_user->profile['image']}}" class="  img-fluid img-thumbnail rounded-circle" />
                    @else
                    <img src="/storage/game_icon.png" class="  img-fluid img-thumbnail rounded-circle">
                    @endif
                </div>
                <div class="col-9">
                    <div class="px-2 py-2">
                        <h5 class="card-title">{{$toUser->post->title}}</h5>
                        <p class="card-text">name:{{$toUser->post->user->name}}</p>
                        <p class="card-text">game:{{$toUser->post->game->name}}</p>
                        <p class="card-text">:{{$toUser->post->type->name}}</p>
                    </div>
                </div>
            </div>
        </div>
    </a>
    @endforeach
    @else
    <div class="d-flex flex-column align-items-center mb-3">
        <h3 class=" text-center py-2">応募してみよう！</h3>
        <div class="col-md-8 text-center">
            <a href="/home"><button type="submit" class="btn-lg btn col-8 py-3 btn-primary">
                    投稿一覧
                </button></a>
        </div>
    </div>
    @endif
</div>
<div class="container">
    @if(!Empty($fromUsers))
    <h3 class=" text-center py-2">応募がきてます！</h3>
    @foreach($fromUsers as $fromUser)
    <form class="" action="{{route('approval')}}" method="POST" enctype="multipart/form-data">
    @csrf
        <input type="hidden" value="{{$fromUser->from_user_id}}" name="from_user_id">
        <input type="hidden" name="post_id" value="{{$fromUser->post->id}}">
        <div class="card mb-3 mx-auto" style="max-width: 600px;">
            <div class=" d-flex no-gutters">
                <div class="col-3 justify-content-center align-items-center d-flex ">
                    @if(!empty($fromUser->from_user->profile->image))
                    <img src="{{ '/storage/' . $fromUser->from_user->profile['image']}}" class="  img-fluid img-thumbnail rounded-circle" />
                    @else
                    <img src="/storage/game_icon.png" class="  img-fluid img-thumbnail rounded-circle">
                    @endif
                </div>
                <div class="col-9">
                    <div class="px-2 py-2">
                        <p class="card-text">name:{{$fromUser->from_user->name}}</p>
                        <p class="card-text">game:
                            @if(!empty($fromUser->from_user->profile))
                            {{$fromUser->from_user->profile->game}}
                            @else
                            特になし
                            @endif
                        </p>
                        <p class="card-text">:
                            @if(!empty($fromUser->from_user->profile))
                            {{$fromUser->from_user->profile->content}}
                            @else
                            楽しくやりましょう
                            @endif
                        </p>
                    </div>
                </div>
            </div>
            <div class=" text-center">
                <button type="submit" class="btn-lg mb-2 btn btn-primary">
                    承認
                </button>
            </div>
        </div>
    </form>
    @endforeach
    @else
    <div class="d-flex flex-column align-items-center">
        <h3 class=" text-center py-2">投稿してみよう！</h3>
        <div class="col-md-8 text-center">
            <a href="/create"><button type="submit" class="btn-lg btn col-8 py-3 btn-primary">
                    投稿作成
                </button></a>
        </div>

    </div>
    @endif
</div>




@endsection