<?php get_header(); ?>

<main>
<?php
          $id = get_current_user_id();
          um_fetch_user($id);
          $country = um_user('country');

          if($country =='東京')
            $country = 'tokyo';
          if($country =='横浜')
            $country = 'yokohama';           
          if($country =='広島')
            $country = 'hiroshima';
          if($country =='大阪')
            $country = 'Osaka';   
  ?>

  

  <div class="main-wrapper ">
    <div class="live_movie_list">
      <h1 class="text-center">My Teams</h1>
      <article>
      
        <?php
            $arg   = array(
              'posts_per_page' => 4, // 表示する件数
              'orderby'        => 'date', // 日付でソート
              'order'          => 'DESC', // DESCで最新から表示、ASCで最古から表示
              'tag'            => $country, // 表示したいタグのスラッグを指定
              // 'post_type'     => 'movie_list'
          );
          
          $posts = get_posts( $arg );
          if ( $posts ): ?>
          
              <ul>
                 
                  <?php
                  foreach ( $posts as $post ) :
                      setup_postdata( $post ); ?>
                      <section>
                      <h2 class="member-name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

                      <p class="post-meta">
                          <span class="post-date"><?php the_time('Y年n月j日'); ?> <?php the_time('H:i'); ?></span>
                          <?php the_content(); ?>
                    </p>
                      <?php  
                          $target_text = get_field('youtube_url');
                          preg_match('/watch\?v=(\w+([-.]\w+)*).*/', $target_text, $match);//正規表現で個別IDを取得する

                          $youtube_view_url = "<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/".$match[1]."\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope\; picture-in-picture\" allowfullscreen></iframe>";  
                          echo $youtube_view_url;
                          ?>
                          
                      <p class="good_button">
                        <?php  if(function_exists('wp_ulike')) wp_ulike('get'); ?>
                      </p>
                      </section>
                    
                  <?php endforeach; ?>
                  
              </ul>
          <?php
          endif;
          wp_reset_postdata();
          ?>
        
      </article>
    </div>
  <div class="live_movie_list allmovie">
    <h1 class="text-center">All Movie</h1>
      <article>
        <?php
          $arg   = array(
              'posts_per_page' => 4, // 表示する件数
              'orderby'        => 'date', // 日付でソート
              'order'          => 'DESC', // DESCで最新から表示、ASCで最古から表示
              
          );

          $posts = get_posts( $arg );
          if ( $posts ): ?>
            <ul>
                <?php
                  foreach ( $posts as $post ) :
                    setup_postdata( $post ); ?>
                    <li><?php the_time( 'Y.m.d' ); ?><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                    <?php  
                        $target_text = get_field('youtube_url');
                        preg_match('/watch\?v=(\w+([-.]\w+)*).*/', $target_text, $match);//正規表現で個別IDを取得する

                        $youtube_view_url = "<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/".$match[1]."\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope\; picture-in-picture\" allowfullscreen></iframe>";  
                        echo $youtube_view_url;
                        ?>
                    <p class="good_button">
                      <?php  if(function_exists('wp_ulike')) wp_ulike('get'); ?>
                    </p>
                <?php endforeach; ?>
            </ul>
        <?php
        endif;
        wp_reset_postdata();
        ?>
      </article>
    </div>
</main>

<?php get_footer(); ?>