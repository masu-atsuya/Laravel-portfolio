@extends('layouts.app')



@section('content')

<div class="col-md-12 bg-success">
    <h2 class="text-light text-center py-3 m-0">投稿詳細</h2>
</div><!-- /.col -->



<form class="card-body" action="{{route('entry')}}" method="POST" enctype="multipart/form-data">
    @csrf

    <input type="hidden" name="to_user_id" value="{{$post->user->id}}">
    <input type="hidden" name="post_id" value="{{$post->id}}">
    <div class="col-md-8 mx-auto my-5">
        <div class=" d-flex justify-content-center">
            @if(!empty($post->user->profile->image))
            <img src="{{ '/storage/' . $post->user->profile['image']}}" class="img-fluid profile-img rounded-circle" />
            @else
            <img src="/storage/game_icon.png" class="img-fluid  profile-img rounded-circle">
            @endif
        </div>
        <h4 class="text-center py-5">{{$post->user->name}}</h4>
        <div class="card mx-auto"  style="max-width: 600px;">
            <div class="card  px-3 py-2">
                <p class="card-ttl m-0 mb-2">タイトル</p>
                <p class="card-text">{{$post->title}}</p>
            </div>
            <div class="border-top card px-3 py-2">
                <p class="card-ttl m-0 mb-2">ゲーム名</p>
                <p class="card-text">{{$post->game->name}}</p>
            </div>
            <div class="border-top card  px-3 py-2">
                <p class="card-ttl m-0 mb-2">募集タイプ</p>
                <p class="card-text">{{$post->type->name}}</p>
            </div>
            <div class="border-top card  px-3 py-2">
                <p class="card-ttl m-0 mb-2">概要</p>
                <p class="card-text">{{$post->content}}</p>
            </div>
            <div class="border-top card  px-3 py-2">
                <p class="card-ttl m-0 mb-2">連絡手段</p>
                <p class="card-text">{{$post->contact}}</p>
            </div>
            <div class="border-top card  px-3 py-2">
                <p class="card-ttl m-0 mb-2">応募条件</p>
                <p class="card-text">{{$post->condition->name}}</p>
            </div>
            <div class="border-top card  px-3 py-2">
                <div class="col-md-8 text-center my-3 mx-auto">
                    <button type="submit" class="btn-lg btn col-8 py-3 btn-primary">
                        応募
                    </button>
                </div>
            </div>
        </div>
    </div><!-- /.col-md-8 -->
</form>
@endsection