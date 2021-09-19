@extends('layouts.app')

@section('content')



<div class=" container">
    <div class=" border-bottom">
        <h2>名前</h2>
        <img src="" alt="">
    </div>
    <realtime-message :messages="{{$messages}}"></realtime-message>

</div>


@endsection