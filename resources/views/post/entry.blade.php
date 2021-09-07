@extends('layouts.app')



@section('content')

@include('layouts.header')



<div id="app">

  <div class="d-flex align-items-center flex-column my-5">
    <div class="col-md-6 text-center mb-5">
      <h2>他の投稿を見てみよう</h2>
      <a href="/home"><button type="submit" class="btn-lg btn col-8 py-3 my-3 btn-primary">
          投稿一覧
        </button></a>
    </div>

    <div class="col-md-6  text-center my-5">
      <h2>ゲーム仲間を募集しよう</h2>

      <a href="/create"><button type="submit" class="btn-lg btn col-8 py-3 my-3 btn-primary">
          投稿作成
        </button></a>
    </div>

  </div>
</div>
</div>
</div>
@endsection