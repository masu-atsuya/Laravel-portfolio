<div class="card">
  <div class="card-body">

  </div>
</div>
@if(!empty($messages)) {

@foreach($messages as $message)
<div class="container">
  <div class="card rounded-3 bg-info">
    <div class="card-body text-white">
      {{$message->comment}}
    </div>
  </div>
  <p class="">{{$message->created_at}}</p>
</div><!-- /.container -->
@endforeach
}

@endif