<?php get_header(); ?>

<body>
  <div class="colum_style">
    <main>
      <div class="main-wrapper">
        <h1 class="header" 　><?php single_cat_title(); ?></h1>
        <div class="post-list">
          <?php
          if (have_posts()) :
            while (have_posts()) : the_post();
          ?>
              <div class="post-item">
                <?php
                if (has_post_thumbnail()) {
                  the_post_thumbnail('thumbnail');
                } else {
                ?>
                  <img src="https://via.placeholder.com/72?text=N" class="attachment-thumbnail">
                <?
                }
                ?>
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <p class="post-meta">
                  <span class="post-date"><?php the_time('Y年n月j日'); ?> <?php the_time('H:i'); ?></span>
                  <span class="post-categories"><?php the_category(','); ?></span>
                </p>
              </div>
            <?php
            endwhile;
          else :
            ?>
            <div class="post">
              <h2>記事はありません</h2>
              <p>お探しの記事はありませんでした</p>
            </div>
          <?php
          endif;
          ?>
        </div>
        <?php the_posts_pagination(); ?>
      </div>
    </main>
    <aside>
      <?php get_sidebar($name); ?>
    </aside>
  </div>
</body>

<?php get_footer(); ?>