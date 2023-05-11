<!DOCTYPE html>
<html>
  <head>
    <title>SessionLogin</title>
    @csrf
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
  </head>

  <body>
    @if (session('status'))
      <div class="{{ session('status') }}">
        {{ session('status') }}
      </div>
    @endif
    @auth
      <!-- <a href="{{ route('orders.index') }}">発注一覧</a> -->
      <!-- <a href="{{ route('orders.create') }}">発注する</a> -->
      <form action="{{ route('logout') }}" method="post">
        @csrf
        <!-- <button type="submit">ログアウト</button> -->
      </form>
    @else
      <a href="{{ route('users.new') }}">アカウント登録</a>
      <a href="{{ route('login') }}">ログイン</a>
    @endauth
    @yield('content')
  </body>
</html>
