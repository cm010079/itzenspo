<?php


function my_scripts()
{
  wp_enqueue_script('jquery');
  wp_enqueue_script('javascript', get_template_directory_uri() . '/js/sample.js', array('jquery'));
}
add_action('wp_enqueue_scripts', 'my_scripts');

add_theme_support('post-thumbnails');

//Indexに投稿される記事をall_movisに変更する
function post_has_archive($args, $post_type)
{
  if ('post' == $post_type) {
    $args['rewrite'] = true;
    $args['has_archive'] = 'all_movies'; //任意のスラッグ名
  }
  return $args;
}
add_filter('register_post_type_args', 'post_has_archive', 10, 2);

function show_youtube($post)
{
}


add_filter('registration_errors', 'dev_registration_errors');
function dev_registration_errors($errors)
{
  unset($errors->errors['empty_email']);
}

add_action('admin_footer', 'dev_admin_footer', 1);
function dev_admin_footer()
{
?>
  <script type="text/javascript">
    jQuery('label[for="email"] > span.description').hide();
    jQuery('#createuser input[name=email]').closest('tr').removeClass('form-required');
  </script>
<?php
}

//YoutubeのURLから埋め込みURLを出力する
function view_youtube($target_text)
{
  preg_match('/watch\?v=(\w+([-.]\w+)*).*/', $target_text, $match); //正規表現で個別IDを取得する

  $youtube_view_url = "<iframe width=\"100%\" height=\"315\" src=\"https://www.youtube.com/embed/" . $match[1] . "?modestbranding=1; \" theme=light; \" ?showinfo=0 frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope\; picture-in-picture\" allowfullscreen></iframe>";
  echo $youtube_view_url;
}
//YoutubeのURLから埋め込みURLを出力する
function autoplay_youtube($target_text)
{
  preg_match('/watch\?v=(\w+([-.]\w+)*).*/', $target_text, $match); //正規表現で個別IDを取得する

  $youtube_view_url = "<iframe width=\"100%\" height=\"315\" src=\"https://www.youtube.com/embed/" . $match[1] . "?modestbranding=1 \" ?showinfo=0 \" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope\; picture-in-picture\" allowfullscreen></iframe>";
  echo $youtube_view_url;
}

function Include_my_php($params = array())
{
  extract(shortcode_atts(array(
    'file' => 'default'
  ), $params));
  ob_start();
  include(get_theme_root() . '/' . get_template() . "/$file.php");
  return ob_get_clean();
}
add_shortcode('myphp', 'Include_my_php');


// カスタムメニューの「場所」を設定
register_nav_menu('header-navi', 'ヘッダーナビ');

register_sidebar($args);


?>
<?php
//コメント一覧用の表示を提供するコールバック関数
function show_comment($comment)
{
?>
  <li <?php comment_class(); ?> class='comment_colum'>
    <a href="<?php echo get_permalink($comment->comment_post_ID); ?>#comment-<?php comment_ID(); ?>">
      <?php
      if ($comment->comment_parent != 0) {
        echo '<i class="fa fa-level-down fa-rotate-180" aria-hidden="true"></i>';
      }
      ?>
      <i class="fa fa-user"></i>
      <?php echo get_comment_author(); ?> さん<br>
      (<?php comment_date('Y年n月j日', get_comment_ID()); ?>)<br />
      <?php
      $post_data = get_post($comment->comment_post_ID);
      echo $post_data->post_title;
      ?>

      <br />

      <?php
      $my_comment_content = strip_tags(get_comment_text());
      if (mb_strlen($my_comment_content, "UTF-8") > 100) {
        $my_comment_content = mb_substr($my_comment_content, 0, 100);
        $my_comment_content .= '...';
      }

      ?>


      <i class="fa fa-commenting"></i>
      <?php echo $my_comment_content; ?>
      <p></p>


    </a>

  <?php
}
