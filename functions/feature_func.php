<?php

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

//Jqueryを有効にする
function my_scripts()
{
  wp_enqueue_script('jquery');
  wp_enqueue_script('javascript', get_template_directory_uri() . '/js/sample.js', array('jquery'));
}
add_action('wp_enqueue_scripts', 'my_scripts');

//特定の機能をテーマで使えるようにする
add_theme_support('post-thumbnails');


//Emailを空文字で登録できるようにする（Emailの設定を無視する）
function dev_registration_errors($errors)
{
  unset($errors->errors['empty_email']);
}
add_filter('registration_errors', 'dev_registration_errors');

//記事内/固定ページ内にphpファイル（任意のファイル）を読み込ませるためのショートコードを有効にする
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
