@extends('layout.logout.common')
@section('title', 'ユーザー登録ページ')
@include('layout.logout.header')

@section('content')

<div class="logout-form">
  <form action="{{ route('register') }}" method="post">
    @csrf
    <h1 class="h3 mb-3 font-weight-normal">ユーザー登録</h1>
    <div class="mb-3">
      <div class="mb-1">
        <label class="sr-only">ユーザー名</label>
        <input class="form-control" name="username" type="text" value="{{ old('username') }}" placeholder="ユーザー名"
          required autofocus>
        @if($errors->has('username'))
        <p class="text-danger mt-2">{{ $errors->first('username') }}</p>
        @endif
      </div>
      <div class="mb-1">
        <label class="sr-only">メールアドレス</label>
        <input class="form-control" name="email" type="email" valut="{{ old('email') }}" placeholder="メールアドレス" required>
        @if($errors->has('email'))
        <p class="text-danger mt-2">{{ $errors->first('email') }}</p>
        @endif
      </div>
      <div class="mb-1">
        <label class="sr-only">パスワード</label>
        <input class="form-control m-0" name="password" type="password" placeholder="パスワード" required>
        @if($errors->has('password'))
        <p class="text-danger mt-2">{{ $errors->first('password') }}</p>
        @endif
      </div>
      <div class="mb-1">
        <label class="sr-only">パスワード確認</label>
        <input class="form-control" name="password_confirmation" type="password" placeholder="パスワード確認" required>
      </div>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">登録</button>
  </form>
  <div class="mt-3">
    <a href="{{ route('login.form') }}">戻る</a>
  </div>
</div>

@endsection

@include('layout.logout.footer')
