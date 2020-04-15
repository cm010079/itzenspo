<?php

// $myteam = array(
//   'posts_per_page' => 4, // 表示する件数
//   'orderby'        => 'date', // 日付でソート
//   'order'          => 'DESC', // DESCで最新から表示、ASCで最古から表示
//   'tag'            => 'tokyo' // 表示したいタグのスラッグを指定
// );

function my_scripts() {
  wp_enqueue_script( 'jquery' );
  wp_enqueue_script( 'javascript',get_template_directory_uri().'/js/sample.js',array('jquery'));
}
add_action( 'wp_enqueue_scripts', 'my_scripts' );

add_theme_support( 'post-thumbnails' );

//Indexに投稿される記事をall_movisに変更する
function post_has_archive( $args, $post_type ) {
  if ( 'post' == $post_type ) {
      $args['rewrite'] = true;
      $args['has_archive'] = 'all_movies'; //任意のスラッグ名
  }
  return $args;

}
add_filter( 'register_post_type_args', 'post_has_archive', 10, 2 );

function show_youtube($post){

}


add_filter('registration_errors','dev_registration_errors');
function dev_registration_errors($errors){
    unset($errors->errors['empty_email']);
    }

    add_action('admin_footer','dev_admin_footer',1);
function dev_admin_footer(){
    ?>
    <script type="text/javascript">
        jQuery('label[for="email"] > span.description').hide();
        jQuery('#createuser input[name=email]').closest('tr').removeClass('form-required');
    </script>
    <?php
}


?>