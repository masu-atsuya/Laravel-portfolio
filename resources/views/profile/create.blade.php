@extends('layouts.app')



@section('content')

@include('layouts.header')


<form class="" action="{{route('profile-store')}}" method="POST" enctype="multipart/form-data">

    <div class="">
        <div class=" my-5 bg-white rounded-circle img-thumbnail mx-auto d-block d-flex justify-content-center align-items-center">
            <label class="" for="image"><i class="fa fa-camera fa-3x" aria-hidden="true"></i></label>
            <input type="file" class="form-control-file d-none" name='image' id="image">
        </div>
    </div>

    @csrf
    <div class="col-md-8 mx-auto my-5">
        <h4 class="text-center user-name">{{$user->name}}</h4>

        <div class="form-group">
            <label for="title">好きなゲーム</label>
            <input type="text" class="form-control" name="game" id="game" placeholder="ゲームタイトル">
        </div>

        <div for="content" class="form-group">
            <label for="content">自己紹介</label>
            <textarea class="form-control" name="content" id="content" cols="10" rows="8" aria-describedby="emailHelp" placeholder="例：一緒に楽しく遊びましょう！"></textarea>
        </div>
        <div class="col-md-8 text-center my-3 mx-auto">
            <button type="submit" class="btn-lg btn col-8 py-3 btn-primary">
                マイページ決定
            </button>
        </div>
    </div>
</form>
@endsection