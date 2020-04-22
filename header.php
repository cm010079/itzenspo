<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
  <title>
    <?php wp_title(' | ', true, 'right'); ?>
    <?php bloginfo('name'); ?>
  </title>
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

  <header>
    <h1 class="logo">
      <a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/character.gif"></a>

      <!-- <a href="#">特定商取引法に基づく表示</a></li> -->
    </h1>
    <a class="top_title">IT ZEN-SPO !!</a>

    <!-- Navigation -->
    <nav id="navi" class="navi" role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
      <div id="navi-in" class="navi-in pc-only">
        <?php wp_nav_menu(
          array(
            //カスタムメニュー名
            'theme_location' => 'header-navi',
            //コンテナを表示しない
            'container' => false,
            //カスタムメニューを設定しない際に固定ページでメニューを作成しない
            'fallback_cb' => false,
            //出力されるulに対してidやclassを表示しない
            'items_wrap' => '<ul>%3$s</ul>',
          )
        ); ?>
      </div><!-- /#navi-in -->
    </nav>
    <!-- /Navigation -->

    <!-- PC判定を行い、表示を行う -->
    <!-- <nav class="pc-menu">
      <ul class="pc-only">
        <li><a href="/">HOME</a></li>
        <li><a href="/">NEWS</a></li>
        <li><a href="/all_movies/">MOVIES</a></li>
      </ul>
    </nav> -->
    <!-- <a class="quest_button pc-only" href="/contact/">お問い合わせ</a> -->
    <a href="#" class="menu sp-only">
      <img src="<?php echo get_template_directory_uri(); ?>/images/icon-menu.png" alt="メニュー" class="icon-menu">
      <img src="<?php echo get_template_directory_uri(); ?>/images/icon-close.png" alt="閉じる" class="icon-close">
    </a>
    <nav class="sp-menu">
      <ul>
        <div class="container">
          <li><a href="/">HOME</a></li>
          <li><a href="/">NEWS</a></li>
          <li><a href="/all_movies/">MOVIES</a></li>
      </ul>
      </div>

  </header>