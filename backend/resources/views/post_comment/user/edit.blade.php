@extends('layout.login.common')
@section('title', '投稿コメント編集ページ')
@include('layout.login.header')

@section('content')

<a href="{{ route('post.show', [$post_comment_detail->post_id]) }}">戻る</a>

<form action="{{ route('post_comment.update', [$post_comment_detail->id]) }}" method="post">
  @method('PUT')
  @csrf
  <input type="text" name="comment" value="{{ old('comment', $post_comment_detail->comment) }}">
  @if($errors->has('comment'))
  <span class="text-danger">{{ $errors->first('comment') }}</span>
  @endif
  <button type="submit">編集</button>
</form>

<form action="{{ route('post_comment.destroy', [$post_comment_detail->id]) }}" method="post">
  @method('DELETE')
  @csrf
  <button type="submit">削除</button>
</form>

@endsection

@include('layout.login.footer')
