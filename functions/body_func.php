<?php

//YoutubeのURLから埋め込みURLを出力する
function view_youtube($target_text)
{
  preg_match('/watch\?v=(\w+([-.]\w+)*).*/', $target_text, $match); //正規表現で個別IDを取得する

  $youtube_view_url = "<iframe width=\"100%\" height=\"315\" src=\"https://www.youtube.com/embed/" . $match[1] . "?modestbranding=1; \" theme=light; \" ?showinfo=0 frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope\; picture-in-picture\" allowfullscreen></iframe>";
  echo $youtube_view_url;
}
//YoutubeのURLから埋め込みURLを出力する(自動再生)
function autoplay_youtube($target_text)
{
  preg_match('/watch\?v=(\w+([-.]\w+)*).*/', $target_text, $match); //正規表現で個別IDを取得する

  $youtube_view_url = "<iframe width=\"100%\" height=\"315\" src=\"https://www.youtube.com/embed/" . $match[1] . "?modestbranding=1 \" ?showinfo=0 \" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope\; picture-in-picture\" allowfullscreen></iframe>";
  echo $youtube_view_url;
}

//記事の表示関数
function show_content($title_onoff, $date_onoff, $content_onoff, $youtube_onoff, $likeBtn_onff, $commentNtf_onoff, $comment_onoff)
{
?>
  <section>
    <h2><a class="post_title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <div class="post-meta"><?php the_time('Y年n月j日'); ?> <?php the_time('H:i'); ?><?php the_content(); ?></div>

    <?php
    $target_text = get_field('youtube_url');
    if ($youtube_onoff) view_youtube($target_text);
    if ($likeBtn_onff) { ?>
      <div class='movie_footer '>
        <?php
        if (function_exists('wp_ulike')) wp_ulike('get'); ?>
      </div>
    <?php
    }
    if ($commentNtf_onoff) { ?>
      <div class='movie_footer notify_comment'>
        <?php show_comments_number(); ?>
      </div>
    <?php
    }
    if ($comment_onoff) comments_template(); ?>
  </section>
<?php
}


//アーカイブのtab内コンテンツの表示
function show_tab_content($country, $key)
{
?>
  <div class="movie_list">
    <?php
    if ($key == 0) {
      $args   = array(
        'posts_per_page' => 4, // 表示する件数
        'orderby'        => 'date', // 日付でソート
        'order'          => 'DESC', // DESCで最新から表示、ASCで最古から表示 
        'tag'            => $country, // 表示したいタグのスラッグを指定 
      );
    }
    if ($key == 1) {
      $args   = array(
        'posts_per_page' => 4, // 表示する件数
        'orderby'        => 'date', // 日付でソート
        'order'          => 'DESC', // DESCで最新から表示、ASCで最古から表示 
      );
    }
    if ($key == 2) {
      $args   = array(
        'posts_per_page' => 4, // 表示する件数
        'orderby'        => 'date', // 日付でソート
        'order'          => 'DESC', // DESCで最新から表示、ASCで最古から表示 
        'category_name' => 'others'
      );
    }
    if ($key == 3) {
      $args = array(
        'post_type' => 'live_movie_list',
        'posts_per_page' => 3,
        'orderby'        => 'date', // 日付でソート
        'order'          => 'DESC', // DESCで最新から表示、ASCで最古から表示 
      );
    }
    if ($key == 4) {
      $args = array(
        'post_type' => 'news_list',
        'posts_per_page' => 3,
        'orderby'        => 'date', // 日付でソート
        'order'          => 'DESC', // DESCで最新から表示、ASCで最古から表示 
      );
    }
    if ($key == 5) {

      $cat_now = get_the_category();
      $cat_now = $cat_now[0];
      $slug = $cat_now->slug;

      $args = array(
        'posts_per_page' => 4,
        'orderby'        => 'date', // 日付でソート
        'order'          => 'DESC', // DESCで最新から表示、ASCで最古から表示 
        'category_name' => $slug
      );
    }

    // The Query
    $the_query = new WP_Query($args);

    // The Loop
    if ($the_query->have_posts()) {
      echo '<ul>';
      while ($the_query->have_posts()) {
        $the_query->the_post();
        if ($key == 4) { //newsはYoutubeを表示しない
          show_content(true, true, true, false, true, true, false);
        } else {
          show_content(true, true, true, true, true, true, false);
        }
      }
      echo '</ul>';
      /* Restore original Post Data */
      wp_reset_postdata();
    }

    ?>
  </div>
<?php
}
