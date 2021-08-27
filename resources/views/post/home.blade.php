@extends('layouts.app')

@section('content')



<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">全ての投稿</div>

                <div class="card-body">
                    @foreach($posts as $post)
                    <div class="card mb-3 mx-auto" style="max-width: 1000px;">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <svg class="bd-placeholder-img" width="100%" height="150" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Image">
                                    <title>Placeholder</title>
                                    <rect fill="#868e96" width="100%" height="100%" /><text fill="#dee2e6" dy=".3em" x="50%" y="50%">Image</text>
                                </svg>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <p class="card-title">タイトル{{$post['content']}}</p>
                                    <p class="card-title">name:{{$post['content']}}</p>
                                    <p class="card-title">game:{{$post['game_name']}}</p>
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