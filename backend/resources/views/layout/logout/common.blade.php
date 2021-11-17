<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <title>@yield('title')</title>
  {{-- Bootstrap css CDN --}}
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  {{-- css --}}
  <link rel="stylesheet" href="{{ asset('/css/logout.css') }}">
</head>

<body class="text-center">
  @yield('header')
  @yield('content')
  @yield('footer')
</body>

</html>
