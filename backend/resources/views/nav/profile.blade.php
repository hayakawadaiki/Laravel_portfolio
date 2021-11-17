@extends('layout.login.common')
@section('title', 'プロフィール')
@section('css')
<link rel="stylesheet" href="{{ asset('/css/content/nav/profile.css') }}">
@endsection
@section('js')
<script src="{{ asset('/js/content/nav/profile.js') }}"></script>
@endsection
@include('layout.login.header')

@section('content')

<h1 class="cover-heading">Profile</h1>

@endsection

@include('layout.login.footer')
