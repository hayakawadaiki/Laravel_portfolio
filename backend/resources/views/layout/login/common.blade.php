<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title')</title>
  {{-- Bootstrap css CDN --}}
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  {{-- css --}}
  <link rel="stylesheet" href="{{ asset('/css/login.css') }}">
  @yield('css')
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
</head>

<body class="text-center">
  <div class="container d-flex w-100 h-100 p-3 mx-auto flex-column">
    @yield('header')
    <main class="main">
      @yield('content')
    </main>
    @yield('footer')
    @yield('js')
  </div>
</body>

</html>
