@extends('layout.logout.common')
@section('title', '登録完了ページ')
@include('layout.logout.header')

@section('content')


<div class="logout-form">
  <h4 class="mb-3">登録が完了しました</h4>
  <a href="{{ route('login.form') }}">ログイン画面へ</a>
</div>

@endsection

@include('layout.logout.footer')
