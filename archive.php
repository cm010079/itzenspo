<?php get_header(); ?>

<body>
  <div class="colum_style">
    <main>
      <div class="tab-wrap">
        <!-- 自拠点の動画を表示 -->
        <input id="tab01" type="radio" name="tab" class="tab-switch" checked="checked"><label class="tab-label" for="tab01">自チーム</label>
        <?php

        $id = get_current_user_id();
        um_fetch_user($id);
        $country = um_user('country');

        if ($country == '東京')
          $country = 'tokyo';
        if ($country == '横浜')
          $country = 'yokohama';
        if ($country == '広島')
          $country = 'hiroshima';
        if ($country == '大阪')
          $country = 'Osaka';
        ?>
        <div class="tab-content">
          <?php show_tab_content($country, 0) ?>
        </div>
        <!-- 他拠点の動画を表示 -->
        <input id="tab02" type="radio" name="tab" class="tab-switch"><label class="tab-label" for="tab02">全チーム</label>
        <div class="tab-content">
          <?php show_tab_content(null, 1) ?>
        </div>
        <!-- 式典の動画を表示 -->
        <input id="tab03" type="radio" name="tab" class="tab-switch"><label class="tab-label" for="tab03">その他(式など)</label>
        <div class="tab-content">
          <?php show_tab_content(null, 2) ?>
        </div>
        <!-- 一覧を表示 -->
        <input id="tab04" type="radio" name="tab" class="tab-switch"><label class="tab-label" for="tab04">一覧</label>
        <div class="tab-content">
          <div class="movie_list">
            <?php
            $categories = get_categories();
            foreach ($categories as $category) :
            ?>
              <section>
                <h3 class="post_title"><?php echo $category->cat_name; ?></h3>
                <ul>
                  <?php
                  query_posts('showposts=5&cat=' . $category->cat_ID);
                  if (have_posts()) : while (have_posts()) : the_post();
                  ?>
                      <li><a href=" <?php the_permalink() ?>"><?php the_title(); ?></a></li>
                  <?php endwhile;
                  endif; ?>
                </ul>
              </section>
            <?php endforeach; ?>
            </section>
          </div>
    </main>
    <aside>
      <?php get_sidebar($name); ?>
    </aside>
  </div>
</body>

<?php get_footer(); ?>