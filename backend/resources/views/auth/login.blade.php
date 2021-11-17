@extends('layout.logout.common')
@section('title', 'ログインページ')
@include('layout.logout.header')

@section('content')


<form class="logout-form" action="{{ route('login') }}" method="post">
  @csrf
  <img class="mb-4" src="{{ asset('/image/alligator.png') }}" width="50%" height="50%">
  <h1 class="h3 mb-3 font-weight-normal">ログイン</h1>
  <div class="mb-3">
    <label class="sr-only">メールアドレス</label>
    <input name="email" type="email" class="form-control" placeholder="メールアドレス" required autofocus>
    <label class="sr-only">パスワード</label>
    <input name="password" type="password" class="form-control" placeholder="パスワード" required>
  </div>
  <button class="btn btn-lg btn-primary btn-block" type="submit">ログイン</button>
  @if(session('login_error'))
  <p class="text-danger mt-3">{{ session('login_error') }}</p>
  @endif
  <div class="mt-3">
    <p>ユーザー登録画面は
      <a href="{{ route('register.form') }}">こちら</a>
    </p>
  </div>
</form>

@endsection

@include('layout.logout.footer')
