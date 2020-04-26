<?php

// 「コメントを残す」を削除
add_filter('comment_form_logged_in', '__return_empty_string');
add_filter('comment_form_defaults', 'my_title_reply');
function my_title_reply($defaults)
{
  $defaults['title_reply'] = '';
  return $defaults;
}

// 新着コメント通知の表示機能
function show_comments_number()
{
  $num_comments = get_comments_number(); //「post_id」は投稿・固定ページのIDを入れる
  if ($num_comments > 0) {
?>
    <p class="comments_number">コメントが<?php echo $num_comments; ?>件あります！</p>
  <?php
  } else {
  ?>
    <p class="comments_number_zero">コメントはまだありません</p>
<?php
  }
  // echo $num_comments; //「承認済み」のコメント数を取得、表示する
}
