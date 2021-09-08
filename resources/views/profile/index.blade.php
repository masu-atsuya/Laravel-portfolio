@extends('layouts.app')



@section('content')

@include('layouts.header')



<div class="card-body">

    <div class="">
        <div class=" my-5 bg-white rounded-circle img-thumbnail mx-auto d-block d-flex justify-content-center align-items-center">
            <label class="" for="image"><i class="fa fa-camera fa-3x" aria-hidden="true"></i></label>
            <input type="file" class="form-control-file d-none" name='image' id="image">
        </div>
    </div>

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
            <a href="/index/edit"><button type="submit" class="btn-lg btn col-8 py-3 btn-primary">
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