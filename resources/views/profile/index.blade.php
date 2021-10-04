@extends('layouts.app')



@section('content')

<div class="col-md-12 bg-success">
    <h2 class="text-light text-center py-3 m-0">マイページ</h2>
</div><!-- /.col -->



<div class="card-body">

    @if(!empty($profile['image']))
    <img src="{{ '/storage/' . $profile['image']}}" class="my-5  rounded-circle img-thumbnail mx-auto d-block d-flex justify-content-center align-items-center" />
    @else
    <img src="storage/game_icon.png" class="w-50">

    @endif

    @csrf
    <div class="col-md-8 mx-auto my-5">
        <h4 class="text-center py-3">{{$profile->user->name}}</h4>
        <div class="card">
            <div class="card  px-3 py-2">
                <p class="card-ttl m-0 mb-2">ゲームタイトル</p>
                <p class="card-text">{{$profile->game}}</p>
            </div>

            <div class="card  px-3 py-2">
                <p class="card-ttl m-0 mb-2">自己紹介</p>
                <p class="card-text">{{$profile->content}}</p>
            </div>


        </div>
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

</div>
@endsection