@section('header')

<header class="masthead mb-auto">
  <div class="inner">
    <h1 class="masthead-brand">
      <a href="{{ route('work') }}" style="text-decoration: none;">暇つぶし</a>
    </h1>
    <nav class="nav nav-masthead justify-content-center">
      <a class="nav-link @if (request()->path() !== 'profile') active @endif" href="{{ route('work')}}">作品一覧</a>
      <a class="nav-link @if (request()->path() === 'profile') active @endif" href=" {{ route('profile')}}">自己紹介</a>
      <a class="nav-link" href="{{ route('logout') }}" onclick="return confirm('本当にログアウトしますか')">ログアウト</a>
    </nav>
  </div>
</header>

@endsection
