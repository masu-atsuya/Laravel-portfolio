@extends('layouts.app')

@section('content')



<div class=" fixed-top bg-white">
    <h2>名前</h2>
    <img src="" alt="">
</div>
<div class=" container chat " ref="displayEnd">
    <realtime-message :room="{{$room->id}}" :my-id="{{$user->id}}"></realtime-message>
</div>



@endsection