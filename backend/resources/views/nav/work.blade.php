@extends('layout.login.common')
@section('title', '作品一覧')
@section('css')
<link rel="stylesheet" href="{{ asset('/css/content/nav/work.css') }}">
@endsection
@section('js')
<script src="{{ asset('/js/content/nav/work.js') }}"></script>
@endsection
@include('layout.login.header')

@section('content')

<div class="album py-5">
  <div class="container">

    <div class="row">

      <div class="col-md-4">
        <div class="card mb-4 shadow-sm">
          <img class="card-img-top" src="{{ asset('/image/alligator.png') }}" width="100%" height="100%">
          <div class="card-body">
            <p class="card-text">掲示板</p>
            <div class="d-flex justify-content-between align-items-center">
              <small class="text-muted">作成日：2021年11月</small>
              <div class="btn-group">
                <button type=“button” class="btn btn-sm btn-outline-secondary"
                  onclick="location.href='{{ route('post.index') }}'">見る</button>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card mb-4 shadow-sm">
          <img class="card-img-top" src="{{ asset('/image/alligator.png') }}" width="100%" height="100%">
          <div class="card-body">
            <p class="card-text">チャット</p>
            <div class="d-flex justify-content-between align-items-center">
              <small class="text-muted">作成日：2021年11月</small>
              <div class="btn-group">
                <button type="button" class="btn btn-sm btn-outline-secondary">見る</button>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card mb-4 shadow-sm">
          <img class="card-img-top" src="{{ asset('/image/alligator.png') }}" width="100%" height="100%">
          <div class="card-body">
            <p class="card-text">ECサイト</p>
            <div class="d-flex justify-content-between align-items-center">
              <small class="text-muted">作成日：2021年11月</small>
              <div class="btn-group">
                <button type="button" class="btn btn-sm btn-outline-secondary">見る</button>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

@endsection

@include('layout.login.footer')
