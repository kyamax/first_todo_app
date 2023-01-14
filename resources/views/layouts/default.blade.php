<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'TO DO')</title>
  <link>
</head>
<body>
  <header>
      <div class="container px-4 mx-auto">
        <a class="title" href="/tasks/index">TO DO</a>
      </div>
      @auth
        <div class="user-header">
          <a class="user-icon" href="/">{{ Illuminate\Support\Facades\Auth::user()->name }}</a>
        </div>
        <div class="user-header">
          <form action="{{ route('users.logout')}}" method="post">
            @csrf
            <button type="submit">ログアウト</button>
          </form>
        </div>
      @endauth
      @guest
        <div class="user-header">
          <a class="user-icon" href="/users/login">ログイン</a>
        </div>
        <div class="user-header">
          <a class="user-icon" href="/users/create">新規登録</a>
        </div>
      @endguest
  </header>
  <main>
    @yield('content')
  </main>
</body>
</html>