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
  </header>
  <main>
    @yield('content')
  </main>
</body>
</html>