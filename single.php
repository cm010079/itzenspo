<?php get_header(); ?>

<body>
  <div class="colum_style">
    <main>
      <div class="movie_list">
        <article>
          <?php
          if (have_posts()) :
            while (have_posts()) : the_post();
              show_content(true, true, true, true, true, false, true);
            endwhile;
          endif;
          ?>
        </article>
      </div>
    </main>
    <aside>
      <?php get_sidebar($name); ?>
    </aside>
  </div>
</body>
<?php get_footer(); ?>