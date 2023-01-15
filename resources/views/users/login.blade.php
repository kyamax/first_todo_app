@extends('layouts.default')
@section('title', 'TODOリスト')

@section('content')
<form class="px-5" action="{{ route('users.login') }}" method="POST">
  @csrf
  <div class="col-md-4">
    <label for="formGroupExampleInput" class="form-label">メールアドレス</label>
    <input type="email" class="form-control" id="formGroupExampleInput" placeholder="user@example.com" name="email" value="{{ old('email') }}">
  </div>

  <div class="col-md-4">
    <label for="formGroupExampleInput2" class="form-label">パスワード</label>
    <input type="password" class="form-control" id="formGroupExampleInput2" placeholder="6文字以上のパスワード" name="password">
  </div>

  <button type="submit" class="btn btn-primary">ログイン</button>

</form>

@endsection