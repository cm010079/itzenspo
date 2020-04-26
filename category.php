<?php get_header(); ?>

<body>
  <div class="colum_style">
    <main>
      <h1 class="colum_title"><?php single_cat_title(); ?></h1>
      <?php show_tab_content(null, 5); ?>
    </main>
    <aside>
      <?php get_sidebar($name); ?>
    </aside>
  </div>
</body>
<?php get_footer(); ?>