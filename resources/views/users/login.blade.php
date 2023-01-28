@extends('layouts.default')
@section('title')

@section('content')

<section class="vh-100">
  @if($errors->any())
    <ul>
      @foreach($errors->all() as $error)
      <li class="text-danger">{{ $error }}</li>
      @endforeach
    </ul>
  @endif

  <form class="px-5" action="{{ route('users.login') }}" method="POST">
    @csrf
    <div class="col-md-4 mt-3">
      <label for="formGroupExampleInput" class="form-label">メールアドレス</label>
      <input type="email" class="form-control" id="formGroupExampleInput" placeholder="user@example.com" name="email" value="{{ old('email') }}">
    </div>

    <div class="col-md-4 mt-3">
      <label for="formGroupExampleInput2" class="form-label">パスワード</label>
      <input type="password" class="form-control" id="formGroupExampleInput2" placeholder="6文字以上のパスワード" name="password">
    </div>

    <button type="submit" class="btn btn-primary mt-3">ログイン</button>

  </form>

  <div class="px-5 mt-2">
    <a href="/users/create">新規登録はこちら</a>
  </div>
</section>
@endsection