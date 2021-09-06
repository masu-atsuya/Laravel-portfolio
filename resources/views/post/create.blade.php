@extends('layouts.app')

@section('content')

@include('layouts.header')

<div class="col-md-8 mx-auto">

    <div>

        <form class="card-body" action="{{route('store')}}" method="POST" enctype="multipart/form-data">
            @csrf
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
                <input type="text" class="form-control" id="contact" name="contact" placeholder="例：初心者ですがよろしくお願いします">
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



            <div class="form-group">
                <label for="image">画像登録</label>
                <input type="file" class="form-control-file" name='image' id="image">

               
            </div>
            <div class="col-md-6 text-center my-5">
                <button type="submit" class="btn-lg btn col-8 py-3 btn-primary">
                    投稿
                </button>
            </div>
        </form>
    </div>
</div><!-- /.col-md-8 -->

@endsection