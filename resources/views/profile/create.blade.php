@extends('layouts.app')



@section('content')

<div class="col-md-12 bg-success">
    <h2 class="text-light text-center py-3 m-0">マイページ作成</h2>
</div><!-- /.col -->


<form class="" action="{{route('profile-store')}}" method="POST" enctype="multipart/form-data">


    @csrf

    <div class="col-md-8 mx-auto my-5">
        <div class="form-group">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
        <h4 class="text-center user-name">{{$user->name}}</h4>

        <div class="form-group">
            <label class="" for="image">プロフィール画像</label>
            <input type="file" class="form-control-file " name='image' id="image">
        </div>
        <div class="form-group">
            <label for="title">好きなゲーム</label>
            <input type="text" class="form-control" name="game" id="game" placeholder="ゲームタイトル">
        </div>

        <div for="introduction" class="form-group">
            <label for="introduction">自己紹介</label>
            <textarea class="form-control" name="introduction" id="introduction" cols="10" rows="8" aria-describedby="emailHelp" placeholder="例：一緒に楽しく遊びましょう！"></textarea>
        </div>
        <div class="col-md-8 text-center my-3 mx-auto">
            <button type="submit" class="btn-lg btn col-8 py-3 btn-primary">
                マイページ決定
            </button>
        </div>
    </div>
</form>
@endsection