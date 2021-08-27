@extends('layouts.app')

@section('content')

@if(session('err_msg'))
<p class="text-danger text-center">{{session('err_msg')}}</p>
@endif


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">自分の投稿一覧</div>

                <div class="card-body">
                    @foreach($posts as $post)

                    <div class="card mb-3 mx-auto" style="max-width: 1000px;">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <svg class="bd-placeholder-img" width="100%" height="145" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Image">
                                    <title>Placeholder</title>
                                    <rect fill="#868e96" width="100%" height="100%" /><text fill="#dee2e6" dy=".3em" x="50%" y="50%">Image</text>
                                </svg>
                            </div>
                            <div class="col-md-4">

                                <div class="card-body">
                                    <p class="card-title">タイトル{{$post['content']}}</p>
                                    <p class="card-title">game:{{$post['game_name']}}</p>
                                    <p class="card-title">条件:{{$post['conditions']}}</p>
                                </div>
                            </div>
                            <div class="col-md-4 d-flex bg-secondary">
                                <div class="card-body d-flex align-items-center justify-content-center">

                                    <a href="edit/{{$post['id']}}"><button type="submit" class="btn btn-primary mr-3">編集</button></a>

                                    <form method="POST" action="{{route('destroy')}}">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$post['id']}}">
                                        <button type="submit" class="btn btn-primary  bg-danger">削除</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>


@endsection