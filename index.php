<?php get_header(); ?>

<body>
  <div class="colum_style">
    <main>
      <h1 class="colum_title">Live Movies</h1>

      <?php show_tab_content(null, 3); ?>

      <h1 class="colum_title">News</h1>

      <?php show_tab_content(null, 4); ?>

    </main>
    <aside>
      <?php get_sidebar($name); ?>
    </aside>
  </div>
</body>
<?php get_footer(); ?>