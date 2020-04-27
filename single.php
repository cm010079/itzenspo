<?php get_header(); ?>

<body>
  <div class="colum_style">
    <main>
      <?php show_tab_content(null, 6); ?>
    </main>
    <aside>
      <?php get_sidebar($name); ?>
    </aside>
  </div>
</body>
<?php get_footer(); ?>