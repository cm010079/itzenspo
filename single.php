<?php get_header(); ?>

<body>
  <div class="colum_style">
    <main>
      <div class="main-wrapper">
        <div class="movie_list">
          <?php $args = array(
            'post_type' => 'movie_list',
            'posts_per_page' => 3,
          ); ?>
          <article>
            <?php
            if (have_posts()) :
              while (have_posts()) : the_post();
            ?>
                <?php $member_query = new WP_Query($args); ?>
                <section>
                  <h2><a class="post_title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                  <div class="post-meta"><?php the_time('Y年n月j日'); ?> <?php the_time('H:i'); ?><?php the_content(); ?></div><br>

                  <!-- Youtube・いいねボタン・コメントを表示する -->
                  <?php
                  $target_text = get_field('youtube_url');
                  view_youtube($target_text);
                  if (function_exists('wp_ulike')) wp_ulike('get');
                  comments_template();
                  ?>
                </section>
            <?php
              endwhile;
            endif;
            ?>
          </article>
        </div>
      </div>
    </main>
    <aside>
      <?php get_sidebar($name); ?>
    </aside>
  </div>
</body>
<?php get_footer(); ?>