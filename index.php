<?php get_header(); ?>

<main>
  <div class="main-wrapper">
    <h1 class="header">Live Movies</h1>
    <?php
    $args = array(
      'post_type' => 'live_movie_list',
      'posts_per_page' => 3,
    ); ?>
    <div class="movie_list">
      <article>
        <?php $member_query = new WP_Query($args); ?>
        <?php while ($member_query->have_posts()) : $member_query->the_post(); ?>
          <section>
            <h2 class="post_title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2><br>
            <div class="post-meta"><?php the_time('Y年n月j日'); ?> <?php the_time('H:i'); ?><?php the_content(); ?></div><br>

            <!-- Youtube・いいねボタン・コメントを表示する -->
            <?php
            $target_text = get_field('youtube_url');
            autoplay_youtube($target_text);
            if (function_exists('wp_ulike')) wp_ulike('get');
            comments_template();
            ?>
          </section><br>
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
    <div class="movie_list">
      <article>
        <?php $member_query = new WP_Query($args); ?>
        <?php while ($member_query->have_posts()) : $member_query->the_post(); ?>
          <section>
            <h2 class="member-name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

            <p class="post-meta">
              <img class="member-avatar" src="<?php the_field('news_img'); ?>">
              <span class="post-date"><?php the_time('Y年n月j日'); ?> <?php the_time('H:i'); ?></span>
              <?php the_content(); ?>
            </p>
          </section><br>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
      </article>
    </div>
    <div class="text-center"><a href="/member/">もっと見る</a></div>
</main>

<?php get_footer(); ?>