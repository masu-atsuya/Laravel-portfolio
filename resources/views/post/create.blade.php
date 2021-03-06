@extends('layouts.app')

@section('content')

<div class="col-md-12 bg-success">
    <h2 class="text-light text-center py-3 m-0">投稿作成</h2>
</div><!-- /.col -->
<div class="col-md-8 mx-auto">


    <div>

        <form class="card-body" action="{{route('store')}}" method="POST" enctype="multipart/form-data">
            @csrf
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
            <div class="form-group">
                <label for="title">投稿タイトル</label>
                <input type="text" class="form-control" name="title" id="title" placeholder="例：一緒にゲームしてくれる方募集！">
            </div>
            <div class="form-group">
                <label for="game_id">ゲーム名</label>
                <select required class="form-control" id="game_id" name="game_id">
                    <option value="" selected>
                        選択してください
                    </option>
                    @foreach($games as $game)
                    <option value="{{$game['id']}}">{{$game['name']}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="type_id">募集タイプ</label>
                <select required class="form-control" id="type_id" name="type_id">
                    <option value="" selected>
                        選択してください
                    </option>
                    @foreach($types as $type)
                    <option value="{{$type['id']}}">{{$type['name']}}</option>
                    @endforeach
                </select>
            </div>
            <div for="content" class="form-group">
                <label for="content">投稿概要</label>
                <textarea class="form-control" name="content" id="content" cols="10" rows="8" aria-describedby="emailHelp" placeholder="例：一緒に楽しく遊びましょう！"></textarea>
            </div>
            <div class="form-group">
                <label for="text">連絡手段</label>
                <input type="text" class="form-control" id="contact" name="contact" placeholder="例：アプリ内チャット">
            </div>

            <div class="form-group">
                <label for="condition_id">応募条件</label>
                <select required class="form-control" id="condition_id" name="condition_id">
                    <option value="" selected>
                        選択してください
                    </option>
                    @foreach($conditions as $condition)
                    <option value="{{$condition['id']}}">{{$condition['name']}}</option>
                    @endforeach
                </select>
            </div>




            <div class="col-6 text-center my-5 mx-auto">
                <button type="submit" class="btn-lg btn col-8 py-3 btn-primary">
                    投稿
                </button>
            </div>
        </form>
    </div>
</div>

@endsection