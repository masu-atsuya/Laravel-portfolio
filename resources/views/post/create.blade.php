@extends('layouts.app')

@section('content')


<div class="col-md-8 mx-auto">
    <div class="card-body p-0">
        <svg class="bd-placeholder-img" width="100%" height="145" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Image">
            <title>Placeholder</title>
            <rect fill="#868e96" width="100%" height="100%" /><text fill="#dee2e6" dy=".3em" x="50%" y="50%">Image</text>
        </svg>
    </div><!-- /.card-body -->
    <div class="card">
        <div class="card-header">
            投稿作成
        </div>
        <form class="card-body" action="{{route('store')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="type">募集タイプ</label>
                <input type="text" class="form-control" name="type" id="type" placeholder="例：一緒にゲームしてくれる方募集！">
            </div>
            <div class="form-group">
                <label for="game_name">ゲームタイトル</label>
                <input type="text" class="form-control" id="game_name" name="game_name" placeholder="例：APEX">
            </div>
            <div class="form-group">
                <label for="conditions">応募条件</label>
                <input type="text" class="form-control" id="conditions" name="conditions" placeholder="例：誰でもどうぞ！">
            </div>
            <div for="content" class="form-group">
                <label for="content">概要</label>
                <textarea class="form-control" name="content" id="content" cols="10" rows="8" aria-describedby="emailHelp" placeholder="例：一緒に楽しく遊びましょう！"></textarea>
            </div>
            <div class="form-group">
                <label for="others">その他</label>
                <input type="text" class="form-control" id="others" name="others" placeholder="例：初心者ですがよろしくお願いします">
            </div>
            <button type="submit" class="btn btn-primary">投稿する</button>
        </form>
    </div>
</div><!-- /.col-md-8 -->

@endsection