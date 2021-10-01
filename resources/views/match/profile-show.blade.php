@extends('layouts.app')



@section('content')

@include('layouts.header')


<form class="card-body" action="{{route('approval')}}" method="POST" enctype="multipart/form-data">
    @csrf

    <input type="hidden" name="from_user_id" value="{{$user-profile->id}}">
    <input type="hidden" name="post_id" value="{{$post}}">
    <div class="col-md-8 mx-auto my-5">
        <div class=" d-flex justify-content-center">
            @if(!empty($profile->image))
            <img src="{{ '/storage/' . $profile['image']}}" class="img-fluid profile-img rounded-circle" />
            @else
            <img src="/storage/game_icon.png" class="img-fluid  profile-img rounded-circle">
            @endif
        </div>
        <h4 class="text-center py-5">{{$profile->user->name}}</h4>
        <div class="card mx-auto"  style="max-width: 600px;">
            <div class="card  px-3 py-2">
                <p class="card-ttl m-0 mb-2">好きなゲーム</p>
                <p class="card-text">{{$profile->game}}</p>
            </div>
            <div class="border-top card px-3 py-2">
                <p class="card-ttl m-0 mb-2">自己紹介</p>
                <p class="card-text">{{$profile->content}}</p>
            </div>    
            <div class="border-top card  px-3 py-2">
                <div class="col-md-8 text-center my-3 mx-auto">
                    <button type="submit" class="btn-lg btn col-8 py-3 btn-primary">
                        承認
                    </button>
                </div>
            </div>
      
        </div>
    </div><!-- /.col-md-8 -->
</form>
@endsection