@extends('layouts.app')

@section('content')



<div class=" border-bottom d-flex justify-content-center align-items-center py-3">
    <h1 class=" mr-3">{{$from_user->name}}</h1>
    @if(!empty($from_user->profile->image))
    <img src="{{ '/storage/' . $from_user->profile['image']}}" class="  img-fluid img-thumbnail rounded-circle" />
    @else
    <img src="/storage/game_icon.png" class="  img-fluid img-thumbnail rounded-circle">
    @endif
</div>

<div class=" container chat " ref="displayEnd">
    <realtime-message :room="{{$room->id}}" :my-id="{{$user->id}}"></realtime-message>

</div>



@endsection