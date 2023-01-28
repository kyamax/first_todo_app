<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'TODO App')</title>
  <link href="css/app.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/20a8b0685b.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
  @vite(['resources/sass/app.scss', 'resources/js/app.js'])

</head>
<body>
  <header>
    <nav class="navbar navbar-light bg-light px-4">
      
      <h1>
        <a class="navbar-brand" href="{{ route('tasks.index') }}">TODO App</a>
      </h1>
      @auth
      <div class="d-grid gap-2 d-md-block">
        <div class="btn">
          <a class="btn btn-outline-secondary btn-sm" href="/tasks/index" role="button">ホーム</a>
        </div>
        <div class="btn">
          <form action="{{ route('users.logout')}}" method="post">
          @csrf
          <button type="submit" class="btn btn-outline-secondary btn-sm">ログアウト</button>
          </form>
        </div>
      </div>
      @endauth
    </nav>
  </header>

  <main>
    <div class="container-fluid">
        @yield('content')
    </div>
  </main>
</body>
</html>