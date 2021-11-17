@extends('layout.login.common')
@section('title', '投稿一覧')
@section('css')
<link rel="stylesheet" href="{{ asset('/css/content/portfolio/post.css') }}">
@endsection
@section('js')
<script src="{{ asset('/js/content/portfolio/post.js') }}"></script>
@endsection
@include('layout.login.header')

@section('content')

<div class="row mt-5">
  <div class="col-md-4 order-md-2 mb-4">
    <div class="pb-3">
      <button class="btn btn-secondary btn-block" onclick="location.href='{{ route('post.create') }}'">
        投稿する
      </button>
    </div>

    @can('admin')
    <div class="pb-3">
      <button class="btn btn-secondary btn-block" onclick="location.href='{{ route('post_category.index') }}'">
        カテゴリーを追加
      </button>
    </div>
    @endcan
    <form class="pb-3" action="{{ route('post.index') }}" method="get">
      <div class="input-group">
        <input type="text" name="keyword" class="form-control" placeholder="キーワードを入力">
        <div class="input-group-append">
          <button type="submit" class="btn btn-secondary">検索</button>
        </div>
      </div>
    </form>

    <form action="{{ route('post.index') }}" method="get">
      <div class="pb-3">
        <button class="btn btn-secondary btn-block" name="my_post" value="my_post">自分の投稿</button>
      </div>
      <div class="pb-3">
        <button class="btn btn-secondary btn-block" name="post_favorite" value="post_favorite">いいねした投稿</button>
      </div>
    </form>

    <div class="form-group">
      <select id="post_sub_category_change" class="form-control" name="post_sub_category_id">
        <option value="">カテゴリー</option>
        @foreach($post_main_categories as $post_main_category)
        <optgroup label="{{ $post_main_category->main_category }}">
          @foreach($post_main_category->postSubCategories as $post_sub_category)
          <option value="{{ $post_sub_category->id }}" data-category_id="{{ $post_sub_category->id }}"
            @if($post_sub_category->id == $category_id) selected @endif>
            {{$post_sub_category->sub_category }}
          </option>
          @endforeach
        </optgroup>
        @endforeach
      </select>
    </div>
  </div>

  <table class="col-md-8 order-md-1">
    <tbody>
      @forelse ($post_lists as $post_list)
      <tr class="d-flex flex-column border p-3 mb-3">
        <td class="d-flex text-secondary">
          <div class="flex-fill text-left">
            <small>{{ $post_list->user->username }}　</small>
            <small>{{ $post_list->event_at->format('Y/m/d H:i:s') }}</small>
          </div>
          <p class="flex-fill text-right">{{ $post_list->actionLogs->count() }} PV</p>
        </td>
        <td>
          <h3 class="text-left">
            <a href="{{ route('post.show' ,[$post_list->id]) }}" style="text-decoration:none;">
              {!! nl2br(e(Str::limit($post_list->title, 30))) !!}
            </a>
          </h3>
        </td>
        <td class="d-flex">
          <p class="flex-fill text-left">
            <small class="badge badge-secondary">
              {{ $post_list->postSubCategory->sub_category }}
            </small>
          </p>
          <div class="flex-fill text-right">
            コメント数：{{ $post_list->postComments->count() }}　
            @if ($post_list->postFavoriteIsExistence($post_list))
            <a class=" post_favorite_key" post_id="{{ $post_list->id }}" post_favorite_id="0"
              style="color:#FF0000; text-decoration: none;">
              <i class="far fa-heart"></i>
            </a>
            @else
            <a class="post_favorite_key" post_id="{{ $post_list->id }}" post_favorite_id="1"
              style="color:#FF0000; text-decoration: none;">
              <i class="fas fa-heart"></i>
            </a>
            @endif
            <span id="post_favorite_count{{ $post_list->id }}">
              {{ $post_list->userPostFavoriteRelations->count()}}
            </span>
          </div>
        </td>
      </tr>
    </tbody>
    @empty
    <div class="col-md-8">
      <p>該当する検索結果はありませんでした…</p>
    </div>
    @endforelse
  </table>

</div>

@endsection

@include('layout.login.footer')
