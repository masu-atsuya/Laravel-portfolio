@extends('layouts.app')

@section('content')


@include('layouts.header')
<div class="container">
    <div class="row justify-content-center">
        <div class="w-100">
            <div class="">

                <div class="">
                    @foreach($users as $user)
                    <a href="/message/show/{{$user->room->id}}">
                        <div class="card mx-auto" style="max-width: 1000px;">
                            <div class="row no-gutters">
                                <div class="d-flex py-3 px-3">
                                
                                        <img src="storage/gamer.jpg" class="rounded-circle img-icon">

                                
                                    <div class="pl-3">
                                        <div class="d-flex">
                                            <p class="m-0 text-dark fs-1">{{$user->user->name}}</p>
                                            ここに時間を表示
                                            <!-- <p class="fs-1">{{$user->room->message->created_at}}</p> -->
                                        </div>
                                        <p class="text-message fs-1">{{$user->room->message->comment}}</p>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>


@endsection