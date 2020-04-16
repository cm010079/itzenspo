<?php get_header(); ?>

<main>
  <div class="main-wrapper">
    <!-- <h1 class="text-center">講師紹介</h1> -->
    <div class="live_movie_list">
    <?php $args = array(
                  'post_type' => 'movie_list',
                  'posts_per_page' => 3,
            ); ?>
      <article>
        <?php
          if(have_posts()):
            while(have_posts()) : the_post();
            ?>
            <?php $member_query = new WP_Query( $args ); ?>

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
              view_youtube($target_text);
              ?>
              </p>
              <p class="good_button">
                <?php  if(function_exists('wp_ulike')) wp_ulike('get'); ?>
              </p>

              <?php comments_template(); ?>

            </section>

        <?php
            endwhile;
          endif;
        ?>
      </article>
    </div>
  </div>
</main>

<?php get_footer(); ?>