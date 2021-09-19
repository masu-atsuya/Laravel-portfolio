@extends('layouts.app')



@section('content')

@include('layouts.header')

<div class="profile-head position-relative ">
    <img src="{{ '/storage/' . $post['image']}}" class="profile-img img-fluid" />
    <div class="thumbnail-wrap position-absolute translate-middle ">
        <img src="{{ '/storage/' . $post['image']}}" class="  rounded-circle img-thumbnail mx-auto d-block" />
    </div>
</div><!-- /.profile-head -->

<form class="card-body" action="{{route('approval')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="to_user_id" value="{{$post->user->id}}">
    <input type="hidden" name="status" value="1">
    <input type="hidden" name="post_id" value="{{$post->id}}">
    <div class="col-md-8 mx-auto my-5">
        <h4 class="text-center py-5">{{$post->user->name}}</h4>
        <div class="card">
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
                        承認
                    </button>
                </div>
            </div>
        </div>
    </div><!-- /.col-md-8 -->
</form>
@endsection