<?php get_header(); ?>

<main>
  <div class="main-wrapper">

  <!-- <div class="kv" style="background:#ccc;">
  <img src="<?php echo get_template_directory_uri(); ?>/images/head_sports.jpg" srcset="<?php echo get_template_directory_uri(); ?>/images/head_sports.jpg 1x,<?php echo get_template_directory_uri(); ?>/images/head_sports.jpg 2x">
  </div> -->

    <h1 class="header">Live Movies</h1>
    <?php
    $args = array(
      'post_type' => 'live_movie_list',
      'posts_per_page' => 3,
    ); ?>
    <div class="live_movie_list">
      <article>
        <?php $member_query = new WP_Query( $args ); ?>
        <?php while ( $member_query->have_posts() ) : $member_query->the_post(); ?>
        <section>
          <h2 class="member-name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

          <p class="post-meta">
                <span class="post-date"><?php the_time('Y年n月j日'); ?> <?php the_time('H:i'); ?></span>
                <?php the_content(); ?>
                <!-- <span class="post-categories"><?php the_category(','); ?></span> -->
          </p>
      
          <!-- YoutubeのURLから埋め込みURLを出力する -->
          <?php  
          $target_text = get_field('youtube_url');
          view_youtube($target_text,560,315);
          ?>
          
        </section>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
      </article>
    </div>
    <div class="text-center"><a href="/member/">もっと見る</a></div>

    <h1 class="header">News</h1>
    <?php
    $args = array(
      'post_type' => 'news_list',
      'posts_per_page' => 3,
    ); ?>
    <div class="live_movie_list">
      <article>
        <?php $member_query = new WP_Query( $args ); ?>
        <?php while ( $member_query->have_posts() ) : $member_query->the_post(); ?>
        <section>
          <h2 class="member-name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
          
          <p class="post-meta">
                <img class="member-avatar" src="<?php the_field('news_img'); ?>">
                <span class="post-date"><?php the_time('Y年n月j日'); ?> <?php the_time('H:i'); ?></span>
                <?php the_content(); ?>
          </p>
          
        </section>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
      </article>
    </div>
    <div class="text-center"><a href="/member/">もっと見る</a></div>
</main>

<?php get_footer(); ?>