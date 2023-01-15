@extends('layouts.default')
@section('title')

@section('content')
<form class="px-5" action="{{ route('users.store') }}" method="POST">
  @csrf
  <div class="col-md-4 mt-3">
    <label for="formGroupExampleInput" class="form-label">名前</label>
    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="名前を入力してください" name="name" value="{{ old('name') }}">
  </div>

  <div class="col-md-4 mt-3">
    <label for="formGroupExampleInput" class="form-label">メールアドレス</label>
    <input type="email" class="form-control" id="formGroupExampleInput" placeholder="user@example.com" name="email" value="{{ old('email') }}">
  </div>

  <div class="col-md-4 mt-3">
    <label for="formGroupExampleInput2" class="form-label">パスワード</label>
    <input type="password" class="form-control" id="formGroupExampleInput2" placeholder="6文字以上のパスワード" name="password">
  </div>

  <div class="col-md-4 mt-3">
    <label for="formGroupExampleInput2" class="form-label">パスワード（確認用）</label>
    <input type="password" class="form-control" id="formGroupExampleInput2" placeholder="6文字以上のパスワード" name="password_confirmation">
  </div>

  <button type="submit" class="btn btn-primary mt-3">登録</button>

</form>

<div class="px-5 mt-2">
  <a href="/users/login">ログインはこちら</a>
</div>

@endsection