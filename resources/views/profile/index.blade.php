@extends('layouts.app')



@section('content')

<div class="col-md-12 bg-success">
    <h2 class="text-light text-center py-3 m-0">マイページ</h2>
</div><!-- /.col -->



<div class="card-body">

    @if(!empty($profile['image']))
    <img src="{{ '/storage/' . $profile['image']}}" class="my-5  rounded-circle img-thumbnail mx-auto d-block d-flex justify-content-center align-items-center" />
    @else
    <img src="storage/game_icon.png" class="my-5  rounded-circle img-thumbnail mx-auto d-block d-flex justify-content-center align-items-center">

    @endif

    <h4 class="text-center py-3">{{$user_name->name}}</h4>
    @if(!empty($profile))
    <div class="col-md-8 mx-auto my-5">
        <div class="card">
            <div class="  px-3 py-2">
                <p class="card-ttl m-0 mb-2">ゲームタイトル</p>
                <p class="card-text">{{$profile->game}}</p>
            </div>

            <div class="border-top  px-3 py-2">
                <p class="card-ttl m-0 mb-2">自己紹介</p>
                <p class="card-text">{{$profile->content}}</p>
            </div>
        </div>
    </div>
    @else
    @endif
    <div class="col-md-8 text-center my-3 mx-auto">
        <a href="/profile/post"><button type="submit" class="btn-lg btn col-8 py-3 btn-primary">
                自分の投稿一覧
            </button></a>
    </div>

    <div class="col-md-8 text-center my-3 mx-auto">
        <a href="/profile/edit"><button type="submit" class="btn-lg btn col-8 py-3 btn-primary">
                編集
            </button></a>
    </div>

</div>
@endsection