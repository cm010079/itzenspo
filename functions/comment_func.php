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
    <a href="<?php the_permalink(); ?>" class=" comments_number">コメントが<?php echo $num_comments; ?>件あります！</a>
  <?php
  } else {
  ?>
    <a href="<?php the_permalink(); ?>" class="comments_number_zero">コメントはまだありません</a>
<?php
  }
  // echo $num_comments; //「承認済み」のコメント数を取得、表示する
}
