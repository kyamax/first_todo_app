@extends('layouts.default')
@section('title', 'TODOリスト')

@section('content')
<form action="{{ route('users.store') }}" method="POST">
  @csrf
  <div class="form-field">
    <label>名前</label>
    <input type="text" name="name" value="{{ old('name') }}">
  </div>

  <div class="form-field">
    <label>メールアドレス</label>
    <input type="email" name="email" value="{{ old('email') }}">
  </div>

  <div class="form-field">
    <label>パスワード</label>
    <input type="password" name="password">
  </div>

  <div class="form-field">
    <label>パスワード（確認用）</label>
    <input type="password" name="password_confirmation">
  </div>

  <div class="form-btn">
    <button type="submit">登録</button>
  </div>

</form>

@endsection