@extends('layouts.default')
@section('title', 'TODOリスト')

@section('content')
<form action="{{ route('users.login') }}" method="POST">
  @csrf
  <div class="login-form">
    <label>メールアドレス</label>
    <input type="email" placeholder="メールアドレス" name="email" value="{{ old('email') }}">
  </div>

  <div class="login-form">
    <label>パスワード</label>
    <input type="password" placeholder="パスワード" name="password">
  </div>

  <button type="submit">ログイン</button>

</form>

@endsection