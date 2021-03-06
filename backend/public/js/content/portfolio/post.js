$(function () {
  // クリックすると一定時間いいねを押せないようにする処理（ダブルクリック対策）
  function stop_process(click_execution) {
    click_execution.css('pointer-events', 'none');
    setTimeout(function () {
      click_execution.css('pointer-events', '');
    }, 500);
  }

  // カテゴリー選択
  $('#post_sub_category_change').on('change', function () {
    var category_id = $('option:selected').data('category_id');
    var url = '/post/index/' + category_id;
    window.location = url;
  });

  // 詳細、一覧画面掲示板投稿のいいね処理
  $('.post_favorite_key').on('click', function () {
    var post_id = $(this).attr("post_id");
    var post_favorite_id = $(this).attr("post_favorite_id");
    var click_post_favorite = $(this);

    stop_process(click_post_favorite);


    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: '/post_favorite',
      type: 'POST',
      data: { 'post_id': post_id, 'post_favorite_id': post_favorite_id, },
    })
      .done(function (data) {
        // 受け取った投稿の数をカウントしなおす
        $('#post_favorite_count' + post_id).text(data[1]).change();

        if (data[0] == 0) {
          click_post_favorite.attr('post_favorite_id', '1');
          click_post_favorite.children().attr('class', 'fas fa-heart');
        }
        if (data[0] == 1) {
          click_post_favorite.attr('post_favorite_id', '0');
          click_post_favorite.children().attr('class', 'far fa-heart');
        }
      })
      .fail(function (data) {
        alert('いいね処理失敗');
      });
  });

  // 掲示板投稿コメントのいいね処理
  $('.post_comment_favorite_key').on('click', function () {
    var post_comment_id = $(this).attr("post_comment_id");
    var post_comment_favorite_id = $(this).attr("post_comment_favorite_id");
    var click_post_comment_favorite = $(this);

    stop_process(click_post_comment_favorite);

    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: '/post_comment_favorite',
      type: 'POST',
      data: { 'post_comment_id': post_comment_id, 'post_comment_favorite_id': post_comment_favorite_id, },
    })
      .done(function (data) {
        // 受け取った投稿の数をカウントしなおす
        $('#post_comment_favorite_count' + post_comment_id).text(data[1]).change();

        if (data[0] == 0) {
          click_post_comment_favorite.attr('post_comment_favorite_id', '1');
          click_post_comment_favorite.children().attr('class', 'fas fa-heart');
        }
        if (data[0] == 1) {
          click_post_comment_favorite.attr('post_comment_favorite_id', '0');
          click_post_comment_favorite.children().attr('class', 'far fa-heart');
        }
      })
      .fail(function (data) {
        alert('いいね処理失敗');
      });
  });
});
