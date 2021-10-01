@extends('layouts.app')

@section('content')


@include('layouts.header')

@foreach($users as $user)
<a href="/message/show/{{$user->room->id}}/{{$user->user->id}}">
    <div class="card mx-auto" style="max-width: 600px;">
        <div class="d-flex py-3 px-3 justify-content-between">
            <div class=" d-flex">
                @if(!empty($user->user->profile->image))
                <img src="{{ '/storage/' . $user->user->profile['image']}}" class="  img-fluid img-thumbnail rounded-circle" />
                @else
                <img src="/storage/game_icon.png" class="  img-fluid img-thumbnail rounded-circle">
                @endif
                <div class="ml-3">
                    <p class="m-0 text-dark fs-1">{{$user->user->name}}</p>
                    <div class="mt-4">
                        @if(!empty($user->room->message))
                        <p class="text-message fs-1">{{$user->room->message->comment}}</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="">
                <div class=" text-right">
                    @if(!empty($user->room->message))
                    <p class="fs-1">{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $user->room->message->created_at)
            ->format('H:i');}}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</a>
@endforeach



@endsection