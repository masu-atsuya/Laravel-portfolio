@extends('layouts.auth')

@section('content')
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <div class="d-flex align-items-center flex-column my-5">
    <h1>アイコン</h1>
    <h2>アプリ名</h2>

    <div class=" fixed-bottom">
      <div class="col-md-6 text-center mb-5">
        <a href="/register"><button type="submit" class="btn-lg btn col-8 py-3 btn-primary">
            新規会員登録
          </button></a>
      </div>

      <div class="col-md-6  text-center my-5">
      <a href="/login"><button type="submit" class="btn-lg btn col-8 py-3 btn-primary">
            ログイン
          </button></a>
      </div>
    </div>
  </div>
</body>

</html>
@endsection