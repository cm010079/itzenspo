<?php get_header(); ?>

<body>
  <div class="colum_style">
    <main>
      <div class="main-wrapper">
        <h1 class="colum_title">Live Movies</h1>
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
                <h2><a class="post_title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <div class="post-meta"><?php the_time('Y年n月j日'); ?> <?php the_time('H:i'); ?><?php the_content(); ?></div>

                <?php
                $target_text = get_field('youtube_url');
                autoplay_youtube($target_text);
                if (function_exists('wp_ulike')) wp_ulike('get');
                comments_template();
                ?>
              </section>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
          </article>
        </div>

        <h1 class="colum_title">News</h1>
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
                <h2><a class="post_title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

                <div class="post-meta">
                  <img class="member-avatar" src="<?php the_field('news_img'); ?>">
                  <span><?php the_time('Y年n月j日'); ?> <?php the_time('H:i'); ?>
                    <?php the_content(); ?>
                </div>
              </section>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
          </article>
        </div>
    </main>
    <aside>
      <?php get_sidebar($name); ?>
    </aside>
  </div>
</body>
<?php get_footer(); ?>